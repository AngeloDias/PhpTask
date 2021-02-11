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
        $form = $this->createForm(ImcType::class, new ImcEntity());

        if($request->isMethod('POST')) {
            $form->submit($request->request->get($form->getName()));

            if($form->isSubmitted() && $form->isValid()) {
                $peso = $_POST['peso'];
                $altura = $_POST['altura'];
                $imc = $peso / ($altura * $altura);
                $msg = '';

                if($imc < 18.5) {
                    $msg = 'Tá bom de ganhar uns pesos. Vai puxar ferro, fazer natação e comer muito!';
                } elseif ($imc > 18.4 && $imc < 25) {
                    $msg = 'Olha, não tá mau, mas pode ficar. Continua se alimentando direito e treinando.';
                } elseif ($imc > 24.9 && $imc <= 30) {
                    $msg = 'Eita! Vai dar ruim! Começando a reeducar a alimentação e treinar leve.';
                } else {
                    $msg = 'Você vai explodir, miséra! Corre para uma nutricionista e treinador físico!';
                }

                return $this->redirectToRoute('imc_result', array('imc' => $imc, 'incentivo' => $msg));

                /* $this->renderView('form_submit/imc_result.html.twig',
                    [
                        'imc' => $imc,
                        'incentivo' => $msg
                    ]); */
            }
        }

        return $this->render('form_submit/index.html.twig',
            [
                'form' => $form->createView()
            ]
        );
    }
}
