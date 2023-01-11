<!DOCTYPE html>
<html lang="pt-br">

<head>

    <?php
    require "html/head.php";
    ?>

</head>

<body>
    <?php
    include "html/header.php";
    require_once "src/conexao.php";
    require_once "src/util.php";

    $idDeletado = isset($_GET["id"]) ? $_GET["id"] : 0;

    $lista = [];
    $sql_code = "SELECT * FROM cliente";
    $sql_query = $conexao->query($sql_code);

    if ($sql_query->num_rows > 0) {
        $lista = $sql_query->fetch_all(MYSQLI_ASSOC);
        // var_dump($lista);
    }
    
    if(!isset($_SESSION)){
        session_start();
    }

    $id = isset($_SESSION["id"]) ? $_SESSION["id"] : 0;
    $nome = isset($_SESSION["nome"]) ? $_SESSION["nome"] : "";
    
    // echo "ID: $id  -  Cliente: $nome";
    ?>

    <main>

        <h1>Clientes</h1>
        <h3>Lista de cadastrados</h3>
        <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>ID</th>
                <th width="100">NOME</th>
                <th>NASCIMENTO</th>
                <th>ORGÃO</th>
                <th>IDENTIDADE</th>
                <th>CPF</th>
                <th width="300">ESTADO CIVIL</th>
                <th>SEXO</th>
                <th width="100">E-MAIL</th>
                <th>ATIVO</th>
                <th width="180" class="text-center">AÇÃO</th>
            </tr>
            <?php foreach ($lista as $usuario) : ?>

                <tr>
                    <td><?= $usuario["idcliente"]; ?></td>
                    <td><?= $usuario["nome"]; ?></td>
                    <td><?= dataView($usuario["data_nascimento"]); ?></td>
                    <td><?= $usuario["orgao"]; ?></td>
                    <td><?= $usuario["rg"]; ?></td>
                    <td><?= $usuario["cpf"]; ?></td>
                    <td><?= $usuario["estado_civil"]; ?></td>
                    <td><?= $usuario["sexo"]; ?></td>
                    <td><?= $usuario["email"]; ?></td>
                    <td><?= $usuario["ativo"]; ?></td>
                    <td class="text-center">
                        <a href="edicaoCliente.php?id=<?= $usuario['idcliente']; ?>" style="text-decoration: none;" data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Editar">
                        <!-- [EDITAR] -->
                        <i class="bi bi-pencil-square" style="font-size: 1.9rem;"></i>
                        </a>
                         <?php
						    if(isset($_SESSION['tipo']) && $_SESSION['tipo'] == "Administrador"){
                                // $idDeletado = $usuario['idcliente']; 
                                $nomeDeletado = $usuario["nome"];
                                ?>
                                <a href="#" onclick="confirmarApagar(<?= $usuario['idcliente']; ?>, 'cliente')" data-confirm="teste" data-bs-toggle="tooltip" data-bs-placement="right" data-bs-title="Excluir" >
                                <!-- [EXCLUIR] -->
                                    <i class="bi bi-trash" style="font-size: 1.9rem; color: red;"></i>
                                </a>
                         <?php   
                            }
                         ?>
                    </td>
                </tr>
 <!-- data-bs-toggle="modal" data-bs-target="#delete_modal" -->
            <?php endforeach; ?>
        </table>
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