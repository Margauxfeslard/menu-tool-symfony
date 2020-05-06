<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderItem;
use App\Form\ChooseProductTypeForm;
use App\Form\OrderItemFormType;
use App\Repository\OrderItemRepository;
use App\Repository\ProductRepository;
use Doctrine\ORM\EntityManagerInterface;
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
     * @param OrderItemRepository $orderItemRepository
     * @param EntityManagerInterface $entityManager
     * @return Response
     */
    public function showAll(Request $request, ProductRepository $productRepository, OrderItemRepository $orderItemRepository, EntityManagerInterface $entityManager)
    {

        if($request->get('id')){
            $product = $productRepository->find($request->get('id'));
            $orderItem = new OrderItem();
            $orderItem->setProduct($product);
            $orderItem->setQuantity(2);
            $orderItem->setAmount(32);
            $orderItem->setSize('Medium');
            $entityManager->persist($orderItem);
            $entityManager->flush();
        }

        $orderItem = $orderItemRepository->findAll();
        $products = $productRepository->findAll();

        return $this->render('product/show_all.html.twig', [
            'products' => $products,
            'orderItems' => $orderItem
        ]);
    }
}
