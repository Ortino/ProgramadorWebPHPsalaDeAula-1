<?php

require_once 'src/protect.php';
require_once "src/conexao.php";

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

	<?php
	require "html/head.php";
	?>

<!-- <script src="procuraCEP.js"></script> -->

</head>

<body>
	<?php
	
  include "html/header.php";
  
  ?>

	<main>
  
  <?php 
  
    $idcliente = $_SESSION['id'];
    $nomeCliente = $_SESSION['nome'];
    $aba = isset($_GET['aba']) ? $_GET['aba'] : '';
    $posicao = isset($_GET['posicao']) ? $_GET['posicao'] : null;
    $end;
    
    // echo "ID: $idcliente - Cliente: $nomeCliente";
    // echo "<br>";
    // echo "Aba: " . $aba;
    // echo "<br>";
    // echo "isset(aba): " . isset($_GET['aba']);
    // echo "<br>";
    $lista = [];
    $sql_code = "SELECT * FROM endereco where id_cliente = $idcliente";
    $sql_query = $conexao->query($sql_code);

    if ($sql_query->num_rows > 0) {
        $lista = $sql_query->fetch_all(MYSQLI_ASSOC);
    }

    if($posicao != null){
      $end = $lista[$posicao];
      // echo "End: " . var_dump($end);
    } else {
      $end["id"] = '';
      $end["tipo"] = '';
      $end["logradouro"] = '';
      $end["numero"] = '';
      $end["complemento"] = '';
      $end["bairro"] = '';
      $end["cidade"] = '';
      $end["estado"] = '';
      $end["cep"] = '';
    }
    
  ?>
    
<div class="accordion" id="accordionExample">

    <!-- Endereço -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingOne">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
        <h5>Endereço</h5>
      </button>
    </h2>
    <div id="collapseOne" class="accordion-collapse collapse <?=(!isset($_GET['aba']) || $aba == 'endereco') ? 'show' : '' ?>" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
      <div class="accordion-body">

    <!-- --------------- Formulário de Endereço ------------------------------------------------------------------------------------------------------------------------------ -->
    <div class="container-fluid">
        <form class="row g-3 container-fluid" name="f" action="src/controler/cliente_bd/inserirEditarEndereco.php" method="post">
            <input type="text" class="form-control" id="id_cliente" name="idcliente" value="<?= $idcliente ?>" hidden>
            
            <input type="text" class="form-control" id="idendereco" name="idendereco" value="<?= $end["id"]; ?>" hidden>
            
            <div class="col-md-3 col-sm-12">
                <label for="tipo_id" class="form-label">Tipo</label>
                <select class="form-select" id="tipo_id" name="tipo" required>
                    <option selected disabled value="">Selecione</option>
                    <option value="Residencial">Residencial</option>
                    <option value="Comercial">Comercial</option>
                </select>
            </div>
            <div class="col-md-8 col-sm-12">
                <label for="rua" class="form-label">Logradouro</label>
                <input type="text" class="form-control" id="rua" name="logradouro" value="<?= $end["logradouro"]; ?>" required>
            </div>
            <div class="col-md-1 col-sm-12">
                <label for="numero_id" class="form-label">Número</label>
                <input type="text" class="form-control" id="numero_id" name="numero" value="<?= $end["numero"]; ?>" aria-describedby="inputGroupPrepend2" required>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="comp_id" class="form-label">Complemento</label>
                <input type="text" class="form-control" id="comp_id" name="complemento" value="<?= $end["complemento"]; ?>" required>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="bairro" class="form-label">Bairro</label>
                <input type="text" class="form-control" id="bairro" name="bairro" value="<?= $end["bairro"]; ?>" required>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="cidade" class="form-label">Cidade</label>
                <input type="text" class="form-control" id="cidade" name="cidade" value="<?= $end["cidade"]; ?>" required>
            </div>
            <div class="col-md-6 col-sm-12">
                <label for="estado" class="form-label">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado" value="<?= $end["estado"]; ?>" required>
            </div>
            <div class="col-md-3 col-sm-12">
                <label for="cep" class="form-label">CEP</label>
                <input type="text" class="form-control" id="cep" name="cep"  value="<?= $end["cep"]; ?>"
                onblur="pesquisacep(this.value);" maxlength="9" required>
            </div>
                        
            <div class="col-12">

              <?php if($posicao == null) : ?>
                  <button class="btn btn-primary" type="submit" id="btn-off" disabled style="display: none">Cadastrar</button>
                  <button class="btn btn-primary" type="submit" id="btn-on" >Cadastrar</button>
              <?php else : ?>
                  <button class="btn btn-warning " type="submit" id="btn-on" >Editar</button>
                  <a href="?aba=endereco" class="btn btn-secondary" >Cancelar</a>
              <?php endif ?>

            </div>
        </form>
    </div>
    <br>
    <?php 
    // var_dump($lista); 
    // echo "Quantidade " . count($lista);
    if(count($lista) != 0) :
    ?>
    <!-- --------------------------------------------------------------------------------------------------------------------------------------------- -->
    <h3>Lista endereços</h3>
        <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>P</th>
                <th>ID</th>
                <th width="100">TIPO</th>
                <th>LOGRADOURO</th>
                <th>NÚMERO</th>
                <th>COMPLEMENTO</th>
                <th>BAIRRO</th>
                <th>CIDADE</th>
                <th>ESTADO</th>
                <th>CEP</th>
                <th width="85" class="text-center">AÇÃO</th>
            </tr>
            <?php for($i= 0 ; $i < count($lista); $i++) : ?>
            <?php $endereco = $lista[$i]; ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $endereco["id"]; ?></td>
                    <td><?= $endereco["tipo"]; ?></td>
                    <td><?= $endereco["logradouro"]; ?></td>
                    <td><?= $endereco["numero"]; ?></td>
                    <td><?= $endereco["complemento"]; ?></td>
                    <td><?= $endereco["bairro"]; ?></td>
                    <td><?= $endereco["cidade"]; ?></td>
                    <td><?= $endereco["estado"]; ?></td>
                    <td><?= $endereco["cep"]; ?></td>
                    <td class="text-center">
                        <a href="?posicao=<?= $i ?>" style="text-decoration: none;" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Editar">
                        <!-- [EDITAR] -->
                        <i class="bi bi-pencil-square" style="font-size: 1.9rem;"></i>
                        </a>
                        <a href="#" onclick="confirmarApagar(<?= $endereco['id']; ?>, 'endereço')" data-confirm="teste" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Excluir" >
                        <!-- [EXCLUIR] -->
                            <i class="bi bi-trash" style="font-size: 1.9rem; color: red;"></i>
                        </a>
                         
                    </td>
                </tr>
 <!-- data-bs-toggle="modal" data-bs-target="#delete_modal" -->
            <?php endfor; ?>
        </table>
        </div>
    <?php endif; ?>
  <!-- --------------------------------------------------------------------------------------------------------------------------------------------- -->
    
    </div>
    </div>
  </div>
  
  <!-- --------------------------------------------------------------------------------------------------------------------------------------------- -->

  <!-- Contatos -->
  <div class="accordion-item">
    <h2 class="accordion-header" id="headingTwo">
      <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
        <h5>Contatos</h5>
      </button>
    </h2>
    <div id="collapseTwo" class="accordion-collapse collapse <?= ($aba == 'contato') ? 'show' : '' ?>" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
      <div class="accordion-body">
        
    <!-- ------------ Formulário de Contatos --------------------------------------------------------------------------------------------------------------------------------- -->
    <div class="container-fluid">
        <form class="row g-3 container-fluid" name="c" action="" method="post">
            <input type="text" class="form-control" id="id_cliente" name="idcliente" value="" hidden>
            
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
                <button class="btn btn-primary" type="submit" id="btn-off" disabled style="display: none">Cadastrar</button>
                <button class="btn btn-primary" type="submit" id="btn-on" >Cadastrar</button>
            </div>
        </form>
    </div>
    <!-- --------------------------------------------------------------------------------------------------------------------------------------------- -->


      </div>
    </div>
  </div>
  
</div>

	</main>

	<?php
	include "html/rodaPe.php";
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
  <script src="src/js/abrirModal.js"></script>
  <script>
    const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
    const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
	</script>

</body>

</html>