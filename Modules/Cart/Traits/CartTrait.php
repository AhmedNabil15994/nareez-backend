<?php

namespace Modules\Cart\Traits;

use Cart;
use Illuminate\Support\MessageBag;
use Darryldecode\Cart\CartCondition;

trait CartTrait
{
    public function getCart()
    {
        return Cart::getContent();
    }

    public function addToCart($item, $type, $quantity = 1)
    {
        $inCart = $this->findItemById($item, $type);

        if (!is_null($inCart)) {
            $this->updateItemInCart($item, $type, $quantity);
        }

        $this->addItemToCart($item, $type, $quantity);

        return true;
    }

    public function findItemById($item, $type)
    {
        return Cart::getContent()->get($item->id . '-' . $type);
    }

    public function addItemToCart($item, $type, $quantity = 1)
    {
        Cart::add([
            'id' => $item['id'] . '-' . $type,
            'name' => $item->title,
            'price' => $item['price'],
            'quantity' => $quantity ?? 1,
            'attributes' => [
                'item_id' => $item['id'],
                'type' => $type,
                'image' => asset($item['image']),
                'product' => $item,
            ]
        ]);

        return true;
    }

    public function updateItemInCart($item, $type)
    {
        Cart::update($item->id . '-' . $type, [
            'quantity' => [
                'relative' => false,
                'value' => 0,
            ]
        ]);

        return true;
    }

    public function removeItem($id, $type)
    {
        return Cart::remove($id . '-' . $type);
    }

    public function clearCart()
    {
        Cart::clear();
        Cart::clearCartConditions();

        return true;
    }

    public function cartTotal()
    {
        return Cart::getTotal();
    }
}
