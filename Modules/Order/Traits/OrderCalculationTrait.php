<?php

namespace Modules\Order\Traits;

use Modules\Cart\Traits\CartTrait;
use Modules\Course\Entities\Course;

trait OrderCalculationTrait
{
    use CartTrait;

    public function calculateTheOrder($request)
    {
        $cart = $this->getCart();

        $subtotal = 0.000;
        $total = 0.000;

        $courses = [];

        foreach ($cart as $key => $item) {
            if ($item['attributes']['type'] == 'course') {
                $orderCourses['course'] = Course::find($item['attributes']['item_id']);
                $orderCourses['qty'] = $item['quantity'];
                $orderCourses['price'] = $orderCourses['course']['price'];
                $orderCourses['off'] = $orderCourses['course']['price'] - $item['price'];
                $orderCourses['total'] = $item['price'] * $item['quantity'];

                $subtotal += $orderCourses['total'];
                $total += $orderCourses['total'];
                $courses[] = $orderCourses;
            }
        }

        return $data = [
            'subtotal' => $subtotal,
            'total' => $total,
            'order_courses' => $courses,
        ];

        return $subtotal;
    }
}
