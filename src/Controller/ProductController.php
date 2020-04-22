<?php

namespace App\Controller;

use App\Entity\OrderItem;
use App\Form\ChooseProductTypeForm;
use App\Form\ProductFormType;
use App\Repository\OrderItemRepository;
use App\Repository\ProductRepository;
use App\Services\ChooseProduct;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends AbstractController
{
    /**
     * @Route("/", name="app_homepage")
     * @return Response
     */
    public function homepage()
    {
        return $this->render('base.html.twig', []);
    }

    /**
     * @Route("products/", name="products_show")
     * @param ProductRepository $productRepository
     * @param Request $request
     * @param ChooseProduct $chooseProduct
     * @return Response
     */
    public function showAll(ProductRepository $productRepository, Request $request, ChooseProduct $chooseProduct, OrderItemRepository $orderItemRepository)
    {
        $form = $this->createForm(ChooseProductTypeForm::class);
        $form->handleRequest($request);
        if ($form->get('choose')->isClicked()) {
           $chooseProduct->addProductToOrderItem();
        }
        $orderItem = $orderItemRepository->findAll();
        $products = $productRepository->displayAllProducts();
        return $this->render('product/show_all.html.twig', [
            'products' => $products,
            'chooseProduct' => $form->createView(),
            'orderItem' => $orderItem
        ]);
    }
}
