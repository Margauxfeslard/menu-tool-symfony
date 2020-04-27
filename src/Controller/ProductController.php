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
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function homepage(ProductRepository $productRepository)
    {
        return $this->render('base.html.twig', []);
    }

    /**
     * @Route("/products", name="products_show")
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function showAll( ProductRepository $productRepository)
    {
       $products = $productRepository->findAll();

        return $this->render('product/show_all.html.twig', [
            'products'=> $products,
        ]);
    }

    /**
     * @Route("product/{id}/choose", name="product_choose")
     * @param ProductRepository $productRepository
     * @return Response
     */
    public function productChoose( ProductRepository $productRepository)
    {
        
        $products = $productRepository->findAll();

        return $this->render('product/product_choose.html.twig', [
            'products'=> $products,
        ]);
    }
}
