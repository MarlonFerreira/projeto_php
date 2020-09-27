<?php

require __DIR__ . '/../db/Conexao.php';
require __DIR__ . '/ServiceEmail.php';

$db = new Conexao();

$diaAtual = date("d/m/Y");
$service = new ServiceEmail($db);
$resultado = $service->lista($diaAtual);

foreach ($resultado as $i => $dado) {

    $message =
        '<html>
            <head>
                <title>Relatório diário - ' . $diaAtual . '</title>
            </head>
            <body>
                <p>Relatório diário - ' . $diaAtual . '</p>
                <table>
                    <tr>
                        <th>Email</th><th>Total vendas</th><th>Total comissão</th>
                    </tr>
                    <tr>
                        <td>' . $dado['vendedor_email'] . '</td><td> R$' . number_format($dado['total_vendas'], 2, ',', '.') . '</td><td> R$' . number_format($dado['total_comissao'], 2, ',', '.') . '</td>
                    </tr>
                </table>
            </body>
        </html>';

    mail($dado['vendedor_email'], 'Relatório diário - ' . $diaAtual, $message);

}