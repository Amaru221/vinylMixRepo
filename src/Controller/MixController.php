<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MixController extends AbstractController
{
    #[Route('/mix/new', name: 'app_mix')]
    public function new(): Response
    {
        dd('new mix');

        /* return $this->render('mix/index.html.twig', [
            'controller_name' => 'MixController',
        ]); */
    }
}
