<?php

require_once __DIR__ . '/src/database.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $ra = $_POST['Ra'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];

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