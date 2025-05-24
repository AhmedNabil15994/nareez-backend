<?php

namespace Modules\Cart\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Cart\Traits\CartTrait;
use Modules\Cart\Http\Requests\Frontend\CartRequest;
use Modules\Course\Transformers\Frontend\CourseResource;
use Modules\Course\Repositories\Frontend\CourseRepository as Course;

class CartController extends Controller
{
    use CartTrait;

    protected $course;

    public function __construct(Course $course)
    {
        $this->course = $course;
    }

    public function index(Request $request)
    {
        $coursesSubscribed = $this->course->subscribedCourses();

        foreach ($coursesSubscribed as $course) {
            $this->removeItem($course['id'], 'course');
        }

        $items = $this->getCart();

        return view('cart::frontend.show', compact('items'));
    }

    public function add(CartRequest $request, $type, $slug)
    {
        $item =new CourseResource($this->course->findCourseBySlug($slug));

        $this->addToCart($item, $type, $request->qty);

        $item = $this->getCart();

        return redirect()->route('frontend.cart.index')->with([
            'msg' => __('cart::frontend.message.add_to_cart'),
            'alert' => 'success',
            'courses' => $item,
        ]);
    }

    public function remove($type, $id)
    {
        $this->removeItem($id, $type);

        $item = $this->getCart();

        return redirect()->route('frontend.cart.index')->with([
            'msg' => __('cart::frontend.message.remove_from_cart'),
            'alert' => 'success',
            'courses' => $item,
        ]);
    }

    public function clear()
    {
        $this->clearCart();

        $items = $this->getCart();

        return redirect()->route('frontend.cart.index')->with([
            'message' => __('cart::frontend.message.clear_cart'),
            'alert' => 'success',
            'courses' => $items,
        ]);
    }
}
