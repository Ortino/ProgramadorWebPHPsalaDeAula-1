<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php
	require "html/head.php";
	
	 if(!isset($_SESSION)){
		session_start();
	 }
	 ?>

    <script>
        		function confirma() {
			if (f.senha.value == "") {

				document.getElementById("divConfirma").style.display = 'none';
			} else {
				document.getElementById("divConfirma").style.display = 'block';
			}
		}

		function verifica() {

			if (f.senha.value == f.senha2.value) {
				document.getElementById("erro").style.display = 'none';
				document.getElementById("btn-off").style.display = 'none';
				document.getElementById("btn-on").style.display = 'block';
				<?php $res = false ?>
			} else {
				document.getElementById("erro").style.display = 'block';
				document.getElementById("btn-off").style.display = 'block';
				document.getElementById("btn-on").style.display = 'none';
                <?php $res = true ?>
			}
		}
        
        </script>
        
</head>

	<!--  -->
	<body>
		<?php 
		include "html/header.php"; 

        $endereco = isset($_POST["endereco"]) ? $_POST["endereco"] : 0;
        $ativo = isset($_POST["ativo"]) ? $_POST["ativo"] : true;

        if(isset($_POST["nome"]) && isset($_POST["senha2"])){

            $cliente = new Cliente(
				$endereco,
				$numero,
				$bairro,
				$cidade

			);

            $sql_code = "INSERT INTO cliente  VALUES (NULL, '$endereco', '$numero', '$bairro', '$cidade', true)";
			
            $sql_query = @$conexao->query($sql_code);
			// var_dump($sql_query);

			// if($conexao->query($sql_code)){
			if($sql_query){
				$sql_code = "SELECT idcliente, nome FROM cliente WHERE cpf = '$cpf'";
				$sql_query = $conexao->query($sql_code);

				$cliente = $sql_query->fetch_assoc();

				$_SESSION["id"] = $cliente['idcliente'];
				$_SESSION["nome"] = $cliente['nome'];

				echo '<!DOCTYPE html>';
				echo '<html lang="pt-br">';
				echo '<head>';
				echo '</head>';
				echo '<body>';
				echo '<div style="width: 1024px; margin: auto;" class="alert alert-success" role="alert">
					Cadastro realizado com sucesso! <a style="text-decoration: none; float: right;" href="cadastroCliente.php" class="alert-link">x</a>
					<br><a style="text-decoration: none; float: left;" href="cadastroClienteComplemento.php" class="alert-link">Cadastro Coplementar</a><br>
				</div>';
				echo '</body>';
				echo '</html>';
			} else {
				echo '<!DOCTYPE html>';
				echo '<html lang="pt-br">';
				echo '<head>';
				echo '   <meta http-equiv="refresh" content="10; url=cadastroCliente.php">';
				echo '</head>';
				echo '<body>';
				echo '<div style="width: 1024px; margin: auto;" class="alert alert-danger" role="alert">
					Erro ao adicionado! <a style="text-decoration: none; float: right;" href="cadastroCliente.php" class="alert-link">x</a>
				</div>';
				echo '</body>';
				echo '</html>';
			}
        }

        ?>

		<main>
        <div class="container-fluid">
			<h3></h3>
			<form class="row g-3 container-fluid" name="f" action="" method="post">

				<div class="col-md-12 col-sm-12">
					<label for="nome_id" class="form-label">Endereço</label>
					<input type="text" class="form-control" id="nome_id" name="nome" value="" required>
				</div>
				<div class="col-md-2 col-sm-12">
					<label for="email_id" class="form-label">Numero</label>
					<div class="input-group">
						<input type="email" class="form-control" id="email_id" name="email" value="" aria-describedby="inputGroupPrepend2" required>
					</div>
				</div>
				<div class="col-md-4 col-sm-12">
					<label for="cpf_id" class="form-label">Bairro</label>
					<input type="cpf" class="form-control" id="cpf_id" name="cpf" value="" required>
				</div>
				<div class="col-md-3 col-sm-12">
					<label for="or_id" class="form-label">Cidade</label>
					<input type="text" class="form-control" id="or_id" name="orgao" value="" required>
				</div>
				<div class="col-md-3 col-sm-12">
					<label for="sen1" class="form-label">Senha</label>
					<input type="password" class="form-control" id="sen1" onblur="confirma()" name="senha" value="" required>
				</div>
				<div class="col-md-6 col-sm-12" id="divConfirma" style="display: none">
					<label for="sen2" class="form-label">Confirmação senha</label>
					<input type="password" class="form-control" id="sen2" onblur="verifica()" name="senha2" value="" required>
					<div id="erro" class="invalid-feedback" style="display: none">
						Senhas divergentes.
					</div>
				</div>
				<div class="col-12">
					<button class="btn btn-primary" type="submit" id="btn-off" disabled style="display: none">Cadastrar</button>
					<button class="btn btn-primary" type="submit" id="btn-on" >Cadastrar</button>
				</div>
			</form>
		</div>
		</main>
<?php
	include "html/rodaPe.php";
?>


		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>

</body>

</html>