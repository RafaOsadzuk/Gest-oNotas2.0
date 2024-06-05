<?php

class Aluno
{
    private string $Ra;
    private string $nome;
    private string $email;
    

    public function __construct(string $Ra, string $nome, string $email)
    {
        $this->nome = $nome;
        $this->Ra = $Ra;
        $this->email = $email;
    }

    public function getRa(): string
    {
        return $this->Ra;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function getEmail(): string
    {
        return $this->email;
    }
}

