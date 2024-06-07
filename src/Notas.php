<?php

class Notas
{
    private float $prova1;
    private float $integrada1;
    private float $aep1;
    private float $prova2;
    private float $integrada2;
    private float $aep2;
    

    public function __construct(float $prova1, float $integrada1, float $aep1, float $prova2, float $integrada2, float $aep2)
    {
        $this->prova1 = $prova1;
        $this->integrada1 = $integrada1;
        $this->aep1 = $aep1;
        $this->prova2 = $prova2;
        $this->integrada2 = $integrada2;
        $this->aep2 = $aep2;
    }

    public function getProva1(): float
    {
        return $this->prova1;
    }

    public function getAep1(): float
    {
        return $this->aep1;
    }

    public function getIntegrada1(): float
    {
        return $this->integrada1;
    }

    public function getProva2(): float
    {
        return $this->prova2;
    }

    public function getAep2(): float
    {
        return $this->aep2;
    }

    public function getIntegrada2(): float
    {
        return $this->integrada2;
    }
}
