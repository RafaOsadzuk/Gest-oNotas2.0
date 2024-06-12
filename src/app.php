<?php

require_once __DIR__ . '/aplicacao/database.php';
require_once __DIR__ . '/aplicacao/Aluno.php';
require_once __DIR__ . '/aplicacao/AlunoModel.php';

$pdo = Database::getConn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
 
    $aluno = new Aluno($_POST['nome'], $_POST['Ra'], $_POST['email']);
    $alunoModel = new AlunoModel($aluno);
    if ($alunoModel->save()) {
        
        header('Location: sucesso.html');
        exit();
    } else {
        
        echo "Não foi possível salvar o aluno no banco de dados.";
    }
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $stmt = $pdo->query('SELECT Ra, nome, email FROM Alunos');
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    header('Content-Type: application/json');
    echo json_encode($alunos);
    exit();
} else {
    echo "Impossível conectar no banco";
}