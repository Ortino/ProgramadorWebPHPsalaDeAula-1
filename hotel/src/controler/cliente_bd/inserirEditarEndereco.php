<?php

require_once "../../protect.php";
require_once "../../conexao.php";
include_once '../../model/Endereco.php';

$idEndereco = isset($_POST['idendereco']) ? $_POST['idendereco'] : 0;
$idCliente = isset($_POST['idcliente']) ? $_POST['idcliente'] : 0;
$tipo = isset($_POST['tipo']) ? $_POST['tipo'] : '';
$logradouro = isset($_POST['logradouro']) ? $_POST['logradouro'] : '';
$numero = isset($_POST['numero']) ? $_POST['numero'] : '';
$complemento = isset($_POST['complemento']) ? $_POST['complemento'] : '';
$bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
$cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
$estado = isset($_POST['estado']) ? $_POST['estado'] : '';
$cep = isset($_POST['cep']) ? $_POST['cep'] : '';

$sql_code = "INSERT INTO endereco  VALUES (NULL, '$idCliente', '$tipo', '$logradouro', '$numero', '$complemento', '$bairro', '$cidade', '$estado', '$cep' )";

echo "Código SQL: " . $sql_code . "<br>";
echo "Id Cliente: " . $idCliente . "<br>";
		
$sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error . "<br>" . $conexao->errno . "<br>" . var_dump($conexao->error));

		// $sql_query = $conexao->query($sql_code);

		// try {
		// 	$sql_query = $conexao->query($sql_code);
		// } catch (Exception $e) {
		// 	echo "Exception: " . $e->getMessage();
		// } catch (Error $e) {
		// 	echo "error: " . $e->getMessage();
		// }
        
		if ($sql_query) {
            header("Location: ../../../cadastroClienteComplemento.php?aba=endereco");
            
			// $sql_code = "SELECT * FROM endereco WHERE id_cliente = $idCliente ORDER BY id DESC LIMIT 1";
			// $sql_query = $conexao->query($sql_code);

            // if($sql_query->num_rows >0){
                
            //     $endereco    = $sql_query->fetch_assoc();
            //     $objEndereco = new Endereco(
            //         $endereco['id'],
            //         $endereco['id_cliente'],
            //         $endereco['tipo'],
            //         $endereco['logradouro'],
            //         $endereco['numero'],
            //         $endereco['complemento'],
            //         $endereco['bairro'],
            //         $endereco['cidade'],
            //         $endereco['estado'],
            //         $endereco['cep']
            //     );

            //     $obj = serialize($objEndereco);
                
            //     header("Location: ../../../index.php?obj=$obj");
            // }

        } else {
            header("Location: ../../../cadastroClienteComplemento.php?aba=endereco");
        }