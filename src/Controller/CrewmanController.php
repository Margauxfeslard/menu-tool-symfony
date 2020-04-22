<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class CrewmanController extends AbstractController
{
    /**
     * @Route("product/new", name="product_new")
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @return Response
     */
    public function new(EntityManagerInterface $entityManager, Request $request)
    {
        $form = $this->createForm(ProductFormType::class);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            /**
             * @var Product $product
             */
            $product = $form->getData();
            $entityManager->persist($product);
            $entityManager->flush();

            $this->addFlash('success', 'Product Created !');

            return $this->redirectToRoute('products_show');
        }
        return $this->render('product/create_product.html.twig', [
            'productForm' => $form->createView()
        ]);
    }
}

