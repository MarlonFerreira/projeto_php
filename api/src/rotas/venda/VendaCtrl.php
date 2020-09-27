<?php

require __DIR__ . '/../../db/Conexao.php';
require __DIR__ . '/IVenda.php';
require __DIR__ . '/Venda.php';
require __DIR__ . '/ServiceVenda.php';

$db = new Conexao();

$PORCENTAGEM_COMISSAO = 0.085;

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $INDICE_ID = 1;

    $venda = new venda;
    $service = new ServiceVenda($db, $venda);

    $URL_dividida  = explode("=", $_SERVER["REQUEST_URI"]);

    $id_vendedor = $URL_dividida[$INDICE_ID];

    $resultado = $service->lista($id_vendedor);
    $resultadoJson = json_encode($resultado);
    echo $resultadoJson;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $json = file_get_contents('php://input');
    $data = json_decode($json);
    $venda = new venda;

    $venda->setVendedorId($data->idVendedor)->setValor($data->valor)->setComissao(($data->valor) * $PORCENTAGEM_COMISSAO);
    $service = new ServiceVenda($db, $venda);

    $id_venda = $service->cadastro();
    $resultado = $service->listaUltimoPedido($id_venda);
    $resultadoJson = json_encode($resultado);
    echo $resultadoJson;
}