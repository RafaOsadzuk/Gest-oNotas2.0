<?php

require_once __DIR__ . '/aplicacao/database.php';
require_once __DIR__ . '/aplicacao/Notas.php';
require_once __DIR__ . '/aplicacao/NotasModel.php';

$pdo = Database::getConn();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (!isset($_POST['prova1'], $_POST['aep1'], $_POST['prova_int1'], $_POST['prova2'], $_POST['aep2'], $_POST['prova_int2'])) {
        echo "Favor fornecer todas as notas do primeiro e segundo bimestre.";
        exit();
    }

   
    $mediaPrimeiroBi = ($_POST['prova1'] + $_POST['aep1'] + $_POST['prova_int1']) / 3;
    $mediaSegundoBi = ($_POST['prova2'] + $_POST['aep2'] + $_POST['prova_int2']) / 3;
    $mediaGeral = ($mediaPrimeiroBimestre + $mediaSegundoBimestre) / 2;

    
    $notas = new Notas($mediaPrimeiroBi, $mediaSegundoBi, $mediaGeral);

    $notasModel = new NotasModel($notas);
    if ($notasModel->save()) {
        echo "Médias salvas com sucesso no banco de dados.";
    } else {
        echo "Não foi possível salvar as médias no banco de dados.";
    }
} else {
    echo "Método de requisição inválido. Este script aceita apenas requisições POST.";
}

