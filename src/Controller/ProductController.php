<?php

namespace App\Controller;

use App\Repository\ProductRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
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
            'products' => $products
        ]);
    }

    /**
     * @Route("product/{slug}", name="product_show")
     */
    public function show($slug)
    {
        return $this->render('product/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug))
        ]);
    }
}
