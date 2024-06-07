<?php

class Aluno
{
    private string $ra;
    private string $nome;
    private string $email;
    

    public function __construct(string $ra, string $nome, string $email)
    {
        $this->nome = $nome;
        $this->ra = $ra;
        $this->email = $email;
    }

    public function getra(): string
    {
        return $this->ra;
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

