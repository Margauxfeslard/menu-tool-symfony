<?php


namespace App\Services;


use App\Entity\OrderItem;
use Symfony\Component\HttpFoundation\Request;

class ChooseProduct
{

    public function addProductToOrderItem(Request $request)
    {
        if($request->get('choose')){
            $product = $request->get('product_id');
            $orderItem = new OrderItem();
            $orderItem->setProduct($product);
        };
    }

}
