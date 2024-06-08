<?php

class AlunoModel
{
    private Aluno $aluno;

    public function __construct(Aluno $aluno){
        $this->aluno = $aluno;
    }
    
        
    public function save()
    {
        $stmt = Database::getConn()->prepare('INSERT INTO Alunos (Ra, nome, email) VALUES (:Ra, :nome, :email);');
        
        $stmt ->bindParam('Ra', $this->aluno->getRa());
        $stmt ->bindParam('nome', $this->aluno->getNome());
        $stmt ->bindParam('email', $this->aluno->getEmail());

        return $stmt->execute();
    }

    public static function getUsuarioByRa(int $Ra)
    {        
        $stmt = Database::getConn()->prepare('SELECT * FROM Alunos WHERE Ra = :Ra');
        $stmt->bindParam('Ra', $Ra);
        $stmt->execute();
        return $stmt->fetch();
    }

    public static function getUltimoAluno()
    {        
        $stmt = Database::getConn()->prepare('SELECT * FROM Alunos ORDER BY Ra DESC;');
        $stmt->execute();
        return $stmt->fetch();
    }
}