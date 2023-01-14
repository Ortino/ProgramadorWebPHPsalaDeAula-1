<?php

$ip ="localhost";
$login = "root";
$senha ="";
$banco ="produto";

$conn-mysqli_connect($ip, $login, $senha, $banco);

if ($conn) {
    echo "Conectado";
}else{
    echo "deu errado";
}

?>