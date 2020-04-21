<?php


namespace App\Services;


use Symfony\Component\HttpFoundation\Request;

class ChooseProduct
{
    public function addProductToOrderItem()
    {
        $request = new Request();
        $request->request->get('choose');
        dump($request);
    }

}
