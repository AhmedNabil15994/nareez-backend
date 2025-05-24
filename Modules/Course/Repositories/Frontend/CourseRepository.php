<?php

namespace Modules\Course\Repositories\Frontend;

use Carbon\Carbon;
use Modules\Course\Entities\Course;

class CourseRepository
{
    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function getByCategoriesIds($ids, $order = 'id', $sort = 'desc')
    {
        $courses = $this->course->whereHas('categories', function ($query) use ($ids) {
            $query->whereIn('categories.id', $ids);
        })->orderBy($order, $sort)->paginate(24);

        return $courses;
    }

    public function getEventsByCategoriesIds($ids, $order = 'id', $sort = 'desc')
    {
        $courses = $this->course->where('is_online', false)->whereHas('categories', function ($query) use ($ids) {
            $query->whereIn('categories.id', $ids);
        })->orderBy($order, $sort)->paginate(24);

        return $courses;
    }

    public function getCoursesByCategoriesIds($ids, $order = 'id', $sort = 'desc')
    {
        $courses = $this->course->where('is_online', true)->whereHas('categories', function ($query) use ($ids) {
            $query->whereIn('categories.id', $ids);
        })->orderBy($order, $sort)->get();

        return $courses;
    }

    public function getLimitedEvents($order = 'id', $sort = 'desc')
    {
        $events = $this->course->where('is_online', false)->orderBy($order, $sort)->paginate(24);
        return $events;
    }

    public function getLimitedCourses($order = 'id', $sort = 'desc')
    {
        $courses = $this->course->orderBy($order, $sort)->take(24)->get();
        return $courses;
    }

    public function getAllEvents($order = 'id', $sort = 'desc')
    {
        $events = $this->course->where('is_online', false)->orderBy($order, $sort)->paginate(24);
        return $events;
    }

    public function getAllCourses($request, $order = 'id', $sort = 'desc')
    {


        $courses = $this->course
            ->when(auth()->check(), fn ($q) => $q->subscribed(auth()->id()))
            ->where(function ($query) use ($request) {
                if ($request->category_id) {
                    $query->whereHas('categories', function ($query) use ($request) {
                        $query->where('category_id', $request->category_id);
                    });
                }
            });
        return $courses->orderBy($order, $sort)->get();
    }


    public function getCoursesByCategory()
    {


        $range = [];
        return  $this->course->latest()->where('is_published',1)
            ->when(auth()->check(), fn ($q) => $q->subscribed(auth()->id()))
            ->when(request('categories'), fn ($q) => $q->categories(request('categories')))
            ->when(request('category_id'), fn ($q) => $q->categories((array)request('category_id')))
            ->when(request('s'), fn ($q, $val) => $q->search($val))
            ->when(
                request('price_from') && request('price_to'),
                fn ($q) => $q->whereBetween('price',  [request('price_from'), request('price_to')]),
            )->when(
                request('genders'),
                function ($q) {
                    $q->whereJsonContains('extra_attributes->gender', request('genders'));
                }
            );
    }


    public function subscribedCourses($order = 'id', $sort = 'desc')
    {
        return $this->course
            ->when(auth()->check(), fn ($q) => $q->subscribed(auth()->id()))
            ->withCount('orderCourse')
            ->whereHas(
                'orderCourse',
                fn ($q) => $q
                    ->whereUserId(auth()->id())
                    ->notExpired()
                    ->successPay()
            )
            ->orderBy($order, $sort)->get();
    }
    public function subscribedLiveCourses($order = 'id', $sort = 'desc')
    {
        return $this->course->where('is_live', 1)->withCount('orderCourse')->whereHas('orderCourse.order', function ($query) {
            $query->whereHas('orderStatus', function ($query) {
                $query->successPayment();
            })->where('user_id', auth()->id());
        })->orderBy($order, $sort)->get();
    }

    public function findEventBySlug($slug)
    {
        return $this->course->where('slug->' . locale(), $slug)->first();
    }

    public function findCourseBySlug($slug)
    {
        return $this->course
            ->when(auth()->check(), fn ($q) => $q->subscribed(auth()->id()))
            ->withCount('orderCourse', 'lessons')
            ->anyTranslation('slug', $slug)
            ->with('lessons.lessonContents.media', 'lessons.lessonContents.video', 'video', 'targets','activeCourseReviews', 'trainer')
            ->firstOrFail();
    }


    public function getCalenderCourses($order = 'id', $sort = 'desc')
    {
        return $this->course->where('is_live', 1)
            ->withCount('orderCourse')
            ->whereHas('orderCourse.order', function ($query) {
                $query->whereHas('orderStatus', function ($query) {
                    $query->successPayment();
                })->where('user_id', auth()->id());
            })
            ->orWhere('trainer_id', auth()->id())
            ->where('is_live', 1)
            ->orderBy($order, $sort)->get();
    }




    public function autoCompleteSearch($request)
    {
        return $this->course->active()->where(function ($query) use ($request) {
            $query->where(function ($query) use ($request) {
                foreach (config('translatable.locales') as $code) {
                    $query->orWhere('title->' . $code, 'like', '%' . $request->input('query') . '%');
                    $query->orWhere('slug->' . $code, 'like', '%' . $request->input('query') . '%');
                }
            });
        });
    }
}
