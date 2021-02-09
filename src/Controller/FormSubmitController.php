<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FormSubmitController extends AbstractController
{
    /**
     * @Route("/form/submit", name="form_submit")
     */
    public function index(): Response
    {
        return $this->render('form_submit/index.html.twig', [
            'controller_name' => 'FormSubmitController',
        ]);
    }
}