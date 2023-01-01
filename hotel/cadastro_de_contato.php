<?php
 require_once "src/protect.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php require "html/head.php" ?>

</head>

	<!--  -->
	<body>
		<?php include "html/header.php" ?>
		<main>

        <?php 
        $idcliente = $_SESSION['id'];
        $nomeCliente = $_SESSION['nome'];
        echo "ID: $idcliente - Cliente: $nomeCliente";
        ?>
		
    <div class="accordion" id="accordionExample">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                <h5>Contatos</h5>
            </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
            <div class="accordion-body">
                <!-- --------------------------------------------------- -->
                <div class="container-fluid">
                <form class="row g-3 container-fluid" name="f" action="" method="post">
                    <input type="text" class="form-control" id="id_cliente_e" name="idcliente" value="" hidden>

                    <div class="col-md-3 col-sm-12">
                        <label for="tipo_id_con" class="form-label">Tipo</label>
                        <select class="form-select" id="tipo_id_con" name="tipo" required>
                            <option selected disabled value="">Selecione</option>
                            <option value="Celular">Celular</option>
                            <option value="Comercial">Comercial</option>
                            <option value="Fixo">Fixo</option>
                            <option value="Recado">Recado</option>
                        </select>
                    </div>
                    <div class="col-md-3 col-sm-12">
                        <label for="desc_id" class="form-label">Número</label>
                        <input type="text" class="form-control" id="desc_id" name="descricao" value="" required>
                    </div>
                    <div class="col-md-6 col-sm-12">
                        <label for="obs_id" class="form-label">Observação</label>
                        <input type="text" class="form-control" id="obs_id" name="numero" value="" aria-describedby="inputGroupPrepend2" required>
                    </div>
                                
                    <div class="col-12">
                        <button class="btn btn-primary" type="submit" id="btn-off2" disabled style="display: none">Cadastrar</button>
                        <button class="btn btn-primary" type="submit" id="btn-on2" >Cadastrar</button>
                    </div>
                </form>
            </div>
                    <!-- --------------------------------------------------- -->
            </div>
            </div>
        </div>
  
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