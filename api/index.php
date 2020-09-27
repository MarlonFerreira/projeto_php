<?php

header('Access-Control-Allow-Origin: *'); 
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Max-Age: 1000');
header('Access-Control-Allow-Headers: Origin, Content-Type');

require __DIR__ . '/src/util/ResolveRotas.php';

if(resolve('/vendedor/?(.*)')){
    require __DIR__ . '/src/rotas/vendedor/VendedorCtrl.php';
}elseif (resolve('/venda/?(.*)')){
    require __DIR__ . '/src/rotas/venda/VendaCtrl.php';
}
elseif (resolve('/?(.*)')){
    require __DIR__ . '/src/rotas/outros/OutrosCtrl.php';
}