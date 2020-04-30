<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Entity\Product;
use App\Form\ChooseProductTypeForm;
use App\Form\OrderItemFormType;
use App\Form\ProductFormType;
use App\Form\SaveFormType;
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
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function homepage(ProductRepository $productRepository)
    {
        return $this->render('base.html.twig', []);
    }

    /**
     * @Route("/products", name="products_show")
     * @param Request $request
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function showAll(Request $request, ProductRepository $productRepository)
    {
        if($request->get('id')){
            $product = $productRepository->find($request->get('id'));
            $orderItem = new OrderItem();
            $orderItem->setProduct($product);
            $form = $this->createForm(ChooseProductTypeForm::class);
            $form->handleRequest($request);
            if($form->isSubmitted() && $form->isValid()){   
                dd($form->getData());
            }
        }
        $products = $productRepository->findAll();

        return $this->render('product/show_all.html.twig', [
            'products' => $products,
            'form' => $form->createView(),
        ]);
    }
}
