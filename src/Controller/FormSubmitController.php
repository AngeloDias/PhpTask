<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use App\Type\ImcType;
use App\Entity\ImcEntity;

class FormSubmitController extends AbstractController
{
    public function index(Request $request): Response
    {
        return $this->render('form_submit/index.html.twig',
            [
                'form' => $this->createForm(ImcType::class, new ImcEntity())->createView()
            ]
        );
    }
}
