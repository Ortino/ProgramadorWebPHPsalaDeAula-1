<?php
require_once "../../../html/head.php";
require_once "../../protect.php";
require_once "../../conexao.php";

if(isset($_SESSION['id'])){

  $idDeletado = isset($_GET["id"]) ? $_GET["id"] : 0;
  // $idCliente = isset($_POST["idcliente"]) ? $_POST["idcliente"] : 0;
  $id = 0;
  if( $idDeletado > 0){
      
    $sql_code = "DELETE FROM endereco WHERE id = '$idDeletado'";

      var_dump($sql_query);
      $sql_query = $conexao->query($sql_code);
      
      if($sql_query->num_rows > 0){
        $cliente = $sql_query->fetch_assoc();
        header("Location: ../../../cadastroClienteComplemento.php?aba=endereco");
      } else {
        header("Location: ../../../cadastroClienteComplemento.php?aba=endereco");
      }

      // header("Location: ../../../clientes.php");
  } else {
      echo 'Raiz 1: ' . $_SERVER['DOCUMENT_ROOT'];
      echo "<br>";
      echo 'Raiz 2: ' . getcwd();
      // header("Location: ../../../index.php");
      header("Location: #");
  }
  
} else {
  
  header("Location: ../../../nao_permitido.php");
  
}
?>

<!-- <script src="../../js/abrirModal.js"></script> -->