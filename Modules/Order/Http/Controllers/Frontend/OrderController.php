<?php

namespace Modules\Order\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Modules\Cart\Traits\CartTrait;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Modules\Order\Mail\BoughtCourse;
use Modules\Transaction\Traits\PaymentTrait;
use Modules\Transaction\Services\PaymentService;
use Modules\Authentication\Foundation\Authentication;
use Modules\Transaction\Services\MyFatoorahPaymentService;
use Modules\Order\Http\Requests\Frontend\CreateOrderRequest;
use Modules\Order\Repositories\Frontend\OrderRepository as Order;
use Modules\Course\Repositories\Frontend\CourseRepository as Course;
use Modules\Authentication\Repositories\Frontend\AuthenticationRepository;

class OrderController extends Controller
{
    use Authentication;
    use CartTrait;
    use PaymentTrait;


    public function __construct(public Order $order, public PaymentService $payment, public Course $course, public AuthenticationRepository $auth)
    {
    }

    public function index(Request $request)
    {

        $courses = $this->getCart();

        if (count($courses) > 0) {
            return view('order::frontend.checkout', compact('courses'));
        }

        return redirect()->route('frontend.cart.index');
    }

    public function createView()
    {

        $cart = $this->getCart();
        return view('order::frontend.show', compact('cart'));
    }

    public function create(CreateOrderRequest $request)
    {
        $cart = $this->getCart();
        if (!auth()->check()) {
            $this->auth->register($request->validated());
            $this->loginAfterRegister($request);
        }
        if (count($cart) > 0) {
            return $this->addOrder($request);
        }

        return redirect()->route('frontend.cart.index');
    }

    public function event(CreateOrderRequest $request)
    {
        $event = $this->course->findEventBySlug($request['slug']);

        $order =  $this->order->createOrderEvent($event);

        if ($request['payment'] != 'cash') {
            $url = $this->payment->send($order, 'orders', $request['payment']);
            return redirect($url);
        }

        return view('order::frontend.show_event', compact('order'));
    }

    public function addOrder($data)
    {
        DB::beginTransaction();

        if (!auth()->check()) {
            return redirect()->route('frontend.register');
        } else {
            $user = auth()->user();
        }

        $data['user_id'] = $user->id;

        $order =  $this->order->create($data);
        $payment = $this->getPaymentGateway('my_fatoorah');
        DB::commit();

        $this->loginAfterRegister($data);

        if ($data['payment'] != 'cash') {
            $data = $payment->send($order, 'orders', $data['payment']);
            return Response()->json([true, 'Redirect to get way', 'url' => $data['url']]);
        }

        $this->clearCart();

        return Response()->json([true, 'Order Receved successfully', 'url' => route('frontend.home')]);
        return view('order::frontend.show', compact('order'));
    }

    public function success(Request $request)
    {
        $data = (new MyFatoorahPaymentService())->GetPaymentStatus($request->paymentId, 'paymentId');
        $request = PaymentTrait::buildMyFatoorahRequestData($data, $request);
        $order = $this->order->update($request['OrderID'], true);
        $this->clearCart();
        return redirect()->route('frontend.profile.courses')->with(
            [
                'status'    => 'success',
                'msg'      => __('Payment completed successfully'),
            ]
        );
    }

    public function failed(Request $request)
    {
        return redirect()->route('frontend.cart.index')->with([
            'status'    => 'danger',
            'msg'      => __('Failed Payment , please try again'),
        ]);
    }
    public function webhook(Request $request)
    {
        $data = (new MyFatoorahPaymentService())->GetPaymentStatus($request->paymentId, 'paymentId');
        $request = PaymentTrait::buildMyFatoorahRequestData($data, $request);
        if ($request['Result'] == 'CAPTURED') {
            $this->order->update($request['OrderID'], true);
            $this->clearCart();
        } else {
            Log::info("payment failed", $request->all());
        }
    }
}
