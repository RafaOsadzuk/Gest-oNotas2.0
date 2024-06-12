<?php

require_once __DIR__ . '/aplicacao/database.php';
require_once __DIR__ . '/aplicacao/Aluno.php';
require_once __DIR__ . '/aplicacao/AlunoModel.php';
require_once __DIR__ . '/aplicacao/Notas.php';
require_once __DIR__ . '/aplicacao/NotasModel.php';

$pdo = Database::getConn();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $stmt = $pdo->query('SELECT Ra, nome, email FROM Alunos');
    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
    $notas = new Notas($_POST['prova1'], $_POST['aep1'], $_POST['prova_int1']);
    
   
    $notasModel = new NotasModel($notas);
    if ($notasModel->save()) {
        
        header('Location: sucesso.html');
        exit();
    } else {
        
        echo "Não foi possível salvar o aluno no banco de dados.";
    }
}
 
else {
    echo "Impossível conectar no banco";
}
