<?php

namespace App\Controller;

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
     * @Route("product/{slug}")
     */
    public function show($slug)
    {
        return $this->render('product/show.html.twig', [
            'title' => ucwords(str_replace('-', ' ', $slug))
        ]);
    }
}
