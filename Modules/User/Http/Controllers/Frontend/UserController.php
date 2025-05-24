<?php

namespace Modules\User\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Area\Entities\Country;
use Illuminate\Support\Facades\Mail;
use PragmaRX\Countries\Package\Countries;
use Modules\User\Mail\ApprovedMedicalProfile;
use Modules\User\Http\Requests\Frontend\UpdateProfileRequest;
use Modules\User\Http\Requests\Frontend\MedicalProfileRequest;
use Modules\User\Http\Requests\Frontend\UpdatePasswordRequest;
use Modules\User\Repositories\Frontend\UserRepository as User;
use Modules\Course\Repositories\Frontend\CourseRepository as Course;

class UserController extends Controller
{
    private $course;
    private $user;

    public function __construct(User $user, Course $course)
    {
        $this->course = $course;
        $this->user = $user;
    }

    public function index()
    {
        $countries = $this->countries();
        return view('user::frontend.profile', compact('countries'));
    }

    public function courses()
    {
        $courses = $this->course->subscribedCourses();
     

        return view('user::frontend.courses', compact('courses'));
    }

    // public function myOrders()
    // {
    //     $orders = auth()->user()->orders()->latest()->get();

    //     return view('user::frontend.orders',compact('orders'));
    // }

    // public function events()
    // {
    //     $events = $this->course->subscribedEvents();

    //     return view('user::frontend.events',compact('events'));
    // }

    public function update(UpdateProfileRequest $request)
    {
        $this->user->updateProfile($request);

        return redirect()->route('frontend.profile.index')->with([
            'msg'   => __('Profile Update Successfully'),
            'alert' => 'success'
        ]);
    }

    public function password(UpdatePasswordRequest $request)
    {
        $this->user->updatePassword($request);
        return redirect()->route('frontend.profile.index')->with([
            'msg'   => __('Password Updated Successfully'),
            'alert' => 'success'
        ]);
    }




    public function countries()
    {
        $countries = Country::with('cities')->get()->pluck('title', 'id');
        return $countries;
    }




    public function calender()
    {
        $result = [];
        $courses = $this->course->getCalenderCourses();

        foreach ($courses as $key => $course) {
            $result = array_merge($result, weekDaysBetween($course));
        }

        return view('user::frontend.calender', compact('result'));
    }
}
