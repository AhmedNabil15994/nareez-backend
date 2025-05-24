<?php

namespace Modules\Order\Repositories\Frontend;

use Auth;
use CartTrait;
use Carbon\Carbon;
use Modules\Order\Entities\Order;
use Illuminate\Support\Facades\DB;
use Modules\Course\Entities\Course;
use Modules\Course\Notifications\NewCourseEnrollmentNotification;
use Modules\Order\Entities\OrderCourse;
use Modules\Order\Entities\OrderStatus;
use Modules\Order\Traits\OrderCalculationTrait;

class OrderRepository
{
    use OrderCalculationTrait;

    public function __construct(Order $order, OrderStatus $status, Course $course)
    {
        $this->course = $course;
        $this->order = $order;
        $this->status = $status;
    }

    public function getAllByUser()
    {
        return $this->order->where('user_id', auth()->id())->get();
    }

    public function findById($id)
    {
        return $this->order->where('id', $id)->first();
    }


    public function createOrderEvent($event, $status = true)
    {
        DB::beginTransaction();

        try {
            $status = $this->statusOfOrder(false);

            $order = $this->order->create([
                'is_holding' => true,
                'discount' => 0.000,
                'subtotal' => $event['price'],
                'total' => $event['price'],
                'user_id' => auth()->id(),
                'order_status_id' => $status->id,
            ]);


            $this->orderEvent($order, $event);

            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function create($request, $status = true)
    {
        DB::beginTransaction();

        try {
            $data = $this->calculateTheOrder($request);
            $status = $this->statusOfOrder(false);

            if (!$data) {
                return false;
            }

            $order = $this->order->create([
                'is_holding' => true,
                'discount' => 0.000,
                'subtotal' => $data['subtotal'],
                'total' => $data['total'],
                'user_id' => $request->user_id,
                // 'address_id' => $request->address_id,
                'order_status_id' => $status->id,
            ]);


            $this->orderCourses($order, $data);

            DB::commit();
            return $order;
        } catch (\Exception $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function orderCourses($order, $data)
    {
        foreach ($data['order_courses'] as $key => $orderCourse) {
            $course = Course::find($orderCourse['course']['id']);
            $orderCourse = $order->orderCourses()->create([
                'course_id'    => $course->id,
                'total'        => $orderCourse['total'],
                'trainer_id'   => $course->trainer_id,
                'user_id'      => auth()->user()->id,
                'expired_date' => $course->extra_attributes->get('end_date', null),
            ]);
        }
    }


    public function orderEvent($order, $event)
    {
        $orderCourse = $order->orderCourses()->create([
            'course_id' => $event['id'],
            'total' => $event['price'],
        ]);
    }

    public function update($id, $boolean)
    {
        $order = $this->findById($id);

        $status = $this->statusOfOrder($boolean);

        $order->update([
            'is_hold' => false,
            'order_status_id' => $status['id']
        ]);



        foreach ($order->orderCourses()->get() as $orderCourse) {
            $this->updateCoursePeriod($orderCourse);
            $this->notify($orderCourse);
        }



        return $order;
    }

    private function updateCoursePeriod($order_courses): void
    {
        $course = $order_courses->course;

        if ($course->period) :
            $order_courses->update([
                'period' => $course->period,
                'expired_date' => Carbon::now()->addDays($course->period)->toDateTimeString(),
            ]);
        endif;
    }

    public function statusOfOrder($type)
    {
        if ($type) {
            $status = $this->status->successPayment()->first();
        }
        if (!$type) {
            $status = $this->status->failedOrderStatus()->first();
        }
        return $status;
    }




    private function notify(OrderCourse $orderCourse): void
    {
        $orderCourse->user->notify(new NewCourseEnrollmentNotification($orderCourse->course));
    }
}
