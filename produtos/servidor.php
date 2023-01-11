<?php

$hostname = "localhost"; //Endereço
$bancodedados = "produto_da_empresa"; //Nome do Banco
$usuario = "root"; //Nome do usuário do banco
$senha = ""; //Senha do banco

$conexao = new mysqli($hostname, $bancodedados , $usuario, $senha );
if($conexao->connect_errno){ // errno = error + number
    echo "Falha ao conectar: (". $conexao->connect_errno . ")" . $conexao->connect_error;
} else {
    // echo "Conectado ao Banco.<br>";
}
?>