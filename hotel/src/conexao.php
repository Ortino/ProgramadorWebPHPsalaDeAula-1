<?php

$hostname = "localhost";
// $hostname = "sql101.epizy.com";
$banco_de_dados = "projeto";
// $banco_de_dados = "epiz_33158091_projetoBD";
$usuario = "root";
// $usuario = "epiz_33158091";
$senha = "";
// $senha = "4Q2k12y29HB4";

$conexao = new mysqli($hostname, $usuario, $senha, $banco_de_dados);
if($conexao->connect_errno){ // error + number = errno
    echo "Falha ao conectar: (" . $conexao->connect_errno .")" . $conexao->connect_error;
} else {
    // echo "Conectado ao Banco.<br>";
}