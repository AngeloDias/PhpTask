<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ShowImcResultController extends AbstractController
{
    public function showResult(Request $request): Response
    {
        $peso = $request->request->get('peso');
        $altura = $request->request->get('altura');
        $altura = $altura / 100;
        $imc = $peso / ($altura * $altura);
        $msg = '';

        if($imc < 18.5) {
            $msg = 'Tá bom de ganhar uns pesos. Vai puxar ferro, fazer natação e comer muito!';
        } elseif ($imc > 18.4 && $imc < 25) {
            $msg = 'Olha, não tá mau, mas pode ficar. Continua se alimentando direito e treinando.';
        } elseif ($imc > 24.9 && $imc <= 30) {
            $msg = 'Eita! Vai dar ruim! Começa a reeducar a alimentação e treinar leve.';
        } else {
            $msg = 'Você vai explodir, miséra! Corre para uma nutricionista e treinador físico!';
        }

        return $this->render('form_submit/imc_result.html.twig',
        [
            'imc' => $imc,
            'incentivo' => $msg
        ]);
    }
}