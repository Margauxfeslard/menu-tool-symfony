<?php

namespace App\Controller;

use App\Entity\OrderItem;
use App\Form\ChooseProductFormType;
use App\Form\ProductFormType;
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
     * @return Response
     */
    public function showAll(ProductRepository $productRepository)
    {
        $products = $productRepository->displayAllProducts();
        return $this->render('product/show_all.html.twig', [
            'products' => $products,
        ]);
    }
}
