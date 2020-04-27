<?php

namespace App\Controller;

use App\Entity\Product;
use App\Form\ProductFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @IsGranted("ROLE_ADMIN_PRODUCT")
 */
class ManagerController extends AbstractController
{
    /**
     * @Route("admin/product/new", name="product_new")
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

    /**
     * @Route("admin/product/{id}/edit", name="product_edit")
     * @param Product $product
     * @param EntityManagerInterface $entityManager
     * @param Request $request
     * @return Response
     */
    public function edit(Product $product, EntityManagerInterface $entityManager, Request $request)
    {
        $form = $this->createForm(ProductFormType::class, $product);
        $form->handleRequest($request);
        if($form->isSubmitted() && $form->isValid()){
            $entityManager->persist($product);
            $entityManager->flush();

            $this->addFlash('success', 'Product Updated !');

            return $this->redirectToRoute('product_edit', [
                 'id' => $product->getId()
            ]);
        }
        return $this->render('product/edit_product.html.twig', [
            'productForm' => $form->createView()
        ]);
    }



}

