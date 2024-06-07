<?php

require_once __DIR__. 'aplicacao\database.php';
require_once __DIR__. 'aplicacao\Aluno.php';

$pdo = database::getConn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Aluno = new Aluno($_POST['nome'], $_POST['ra'], $_POST['email']);

    $stmt = $pdo->prepare('INSERT INTO Alunos (ra, nome, email) VALUES (:ra, :nome, :email)');
    $stmt->bindParam(':ra', $ra);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    header('Location: sucesso.html');
    exit();
}

else{
    echo "impossivel conectar no banco";
}

$pdo = null;