<?php

require __DIR__ . '/../../db/Conexao.php';
require __DIR__ . '/IVendedor.php';
require __DIR__ . '/Vendedor.php';
require __DIR__ . '/ServiceVendedor.php';

$db = new Conexao();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $vendedor = new Vendedor;
    $service = new ServiceVendedor($db, $vendedor);

    $resultado = $service->lista();
    $resultadoJson = json_encode($resultado);
    echo $resultadoJson;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $vendedor = new Vendedor;

    $vendedor->setNome($data->nome)->setEmail($data->email);
    $service = new ServiceVendedor($db, $vendedor);

    $resultado = $service->cadastro();
    $resultadoJson = json_encode($resultado);
    print_r($resultadoJson);
}
