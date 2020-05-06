<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class OrderController extends AbstractController
{
    /**
     * @Route("/order_validation", name="app_order")
     * @return Response
     */
    public function orderValidation(Request $request)
    {
        dd($request->request);
        return $this->render('order/order_validation.html.twig', []);
    }

}
