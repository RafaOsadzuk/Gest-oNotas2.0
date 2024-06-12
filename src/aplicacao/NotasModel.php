<?php

class NotasModel
{
    private Notas $notas;

    public function __construct(Notas $notas)
    {
        $this->notas = $notas;
    }


    public function save()
    {
        $stmt = Database::getConn()->prepare('INSERT INTO Notas (prova1, aep1, 
                                                integrada1, prova2, aep2, integrada2) 
                                            VALUES (:prova1, :aep1, :integrada1, :prova2, :aep2, :integrada2);');

        $stmt->bindParam('prova1', $this->notas->getProva1());
        $stmt->bindParam('aep1', $this->notas->getAep1());
        $stmt->bindParam('integrada1', $this->notas->getIntegrada1());
        $stmt->bindParam('prova2', $this->notas->getProva2());
        $stmt->bindParam('aep2', $this->notas->getAep2());
        $stmt->bindParam('integrada2', $this->notas->getIntegrada2());


        return $stmt->execute();
    }

    public static function getNotasByRa(string $ra)
    {
        $stmt = Database::getConn()->prepare('SELECT * FROM Notas WHERE ra = :ra');
        $stmt->bindParam('ra', $ra);
        $stmt->execute();
        return $stmt->fetch();
    }
}
