<?php

namespace App\Entity;

class ImcEntity
{
    protected $peso;
    protected $altura;

    public function getPeso(): float
    {
        return $this->peso;
    }

    public function setPeso(float $peso): void
    {
        $this->peso = $peso;
    }

    public function getAltura(): float
    {
        return $this->altura;
    }

    public function setAltura(float $altura): void
    {
        $this->altura = $altura;
    }
}