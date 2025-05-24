<?php

namespace Modules\Category\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Course\Repositories\Frontend\CourseRepository as Course;
use Modules\Category\Repositories\Frontend\CategoryRepository as Category;

class CategoryController extends Controller
{
    public function __construct(Category $category, Course $course)
    {
        $this->category  = $category;
        $this->course    = $course;
    }

    public function show($slug)
    {
        $category = $this->category->findBySlug($slug);

        $children = $category->children->pluck('id')->toArray();

        array_push($children, $category['id']);

        $ids = $children;

        $events = $this->course->getEventsByCategoriesIds($ids);

        $courses = $this->course->getCoursesByCategoriesIds($ids);

        if (!$category) {
            abort(404);
        }

        return view('category::frontend.show', compact('category', 'events', 'courses'));
    }
}
