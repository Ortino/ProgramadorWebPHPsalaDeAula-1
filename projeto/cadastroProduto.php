<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php 
	require "html/head.php";
	
	if(isset($_FILES['foto'])){
		$foto = $_FILES['foto'];
		// var_dump($_FILES['foto']);
		//array(6) { ["name"]=> string(21) "Professortocat_v2.png" ["full_path"]=> string(21) "Professortocat_v2.png" ["type"]=> string(9) "image/png" ["tmp_name"]=> string(24) "C:\xampp\tmp\phpE019.tmp" ["error"]=> int(0) ["size"]=> int(30765) }	
		//2MB = 2097153by
		if($foto['size'] > 2097152){
			die("Arquivo muito grande! Max: 2MB");
		}

		$pasta = "img/produtos/";
		$nomeOriginal = $foto['name'];
		$nomeDaFoto = uniqid();
		$extensao = strtolower(pathinfo($nomeOriginal, PATHINFO_EXTENSION));

		if($extensao != "jpg" && $extensao != "png"){
			die("Tipo de arquivo não aceito");
		}
		// img/produtos/sdfksajfksa.png
		$deu_certo = move_uploaded_file($foto["tmp_name"], $pasta . $nomeDaFoto . "." .$extensao);

		if($deu_certo){
			echo "<p>Arquivo enviado com sucesso! Para acessá-lo clique aqui:
			<a target='_blank' href='$pasta$nomeDaFoto.$extensao'>Foto</a> 
			</p>";
			
		} else {
			echo "<p>Falha ao enviar arquivo!</p>";
		}

	}
	
	
	?>
	
</head>

	<!--  -->
	<body>
		<?php include "html/header.php" ?>
		<main>
		<div class="container-fluid">
			<h3>Cadastro de Produto</h3>
			<form enctype="multipart/form-data" class="row g-3 container-fluid" action="" method="post">

				<div class="col-md-6 col-sm-12">
					<label for="nome_id" class="form-label">Nome produto</label>
					<input type="text" class="form-control" id="nome_id" name="nome" value="" required>
				</div>
				<div class="col-md-6 col-sm-12">
                    <label for="tipoid" class="form-label">Tipo</label>
                    <select class="form-select" id="tipoid" name="tipo" required>
                        <option selected disabled value="">Selecione</option>
                        <option value="HARDWARE">HARDWARE</option>
                        <option value="PERIFÉRICOS">PERIFÉRICOS</option>
                    </select>
                </div>
				<div class="col-md-4 col-sm-12">
					<label for="desc_id" class="form-label">Descrição</label>
					<textarea class="form-control" id="desc_id" name="descicao" rows="4" cols="50" value="" required></textarea>
				</div>
				<div class="col-md-4 col-sm-12">
					<label for="or_id" class="form-label">Foto</label>
					<input type="file" class="form-control" id="or_id" name="foto" value="" required>
				</div>
				<div class="col-12">
					<button class="btn btn-primary" type="submit" id="btn-off" disabled style="display: none">Cadastrar</button>
					<button class="btn btn-primary" type="submit" id="btn-on">Cadastrar</button>
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