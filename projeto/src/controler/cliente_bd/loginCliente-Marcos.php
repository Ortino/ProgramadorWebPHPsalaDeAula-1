<!DOCTYPE html>
<html lang="pt-br">

<head>

	<?php
        require_once "../../../html/head.php";
        // require_once "../../../html/header.php";
        require_once "../../conexao.php";
	?>

</head>

<body>
	
	<main>

    <?php
    
        if(isset($_POST['email']) || isset($_POST['senha'])){
            $email = $conexao->real_escape_string($_POST['email']);
            $senha = $conexao->real_escape_string($_POST['senha']);
            $lembrar = isset($_POST['lembrar']) ? $_POST['lembrar'] : false;

            $sql_code = "SELECT * FROM cliente WHERE email = '$email'";
                $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);

                //Quantidade de linhas retornado;
                $qtd = $sql_query->num_rows;

                if($qtd == 1){
                    
                    $usuario = $sql_query->fetch_assoc();
                    
                    if(password_verify($senha, $usuario['senha'])){
                                        
                        if(!isset($_SESSION)){
                            session_start();
                        }

                        // $_SESSION['user'] = $usuario;
                        $_SESSION['id'] = $usuario['idcliente'];
                        $_SESSION['nome'] = $usuario['nome'];
                        // $cli = $usuario['nome'];

                            if(!isset($_COOKIE['cliente'])){

                                //+60*60 = 3600 (1h);
                                //+60*60*24 = 86400 (24h)
                                //+60*60*24*30 = 2592000 (30 dias);
                                //+60*60*24*365 = 31536000 (1 ano);
                                // time();
                                // strtotime("now");
                                // strtotime("+1 day");
                                // strtotime("+1 month");
                                // strtotime("+1 year");
                                // echo date("d/m/y");
                                setcookie('cliente', $usuario['nome'], time()+3600, "/");
                                // setcookie('cliente', $usuario['nome'], time()+3600, "/", "", false, true);
                                // var_dump($_COOKIE);
                                
                                /*
                                setcookie( string $name 
                                [, string $value = "" 
                                [, int $expires = 0 
                                [, string $path = "" 
                                [, string $domain = "" 
                                [, bool $secure 
                                [, bool $httponly 
                                [, array $options = [] ]]]]]]]): bool
                                */
                            }

                            if($lembrar){
                                if(!isset($_COOKIE['login']) || $_COOKIE['login'] != $email){
                                    setcookie('login', $cliente['email'], strtotime("+1 hour"), "/", "", false, true);
                                }
                            } else {
                                setcookie('login', $cliente['email'], strtotime("-1 hour"), "/", "", false, true);
                            }

                            header("Location: ../../../index.php");
                            // header("Location: index.php");

                    }else{
                        paginaErroLogin();
                    }
                    
                } else {
                    paginaErroLogin();
                }
                
        }

    function paginaErroLogin(){
        // data-bs-toggle="modal" data-bs-target="#login_modal";
                    echo '<!DOCTYPE html>';
                    echo '<html xmlns="http://www.w3.org/1999/xhtml">';
                    echo '<head>';
                    echo '   <meta http-equiv="refresh" content="5; url=../../../index.php">';
                    echo '</head>';
                    echo '<body>';
                    echo '<div class="alert alert-danger" role="alert">
                        <a style="text-decoration: none; float: right;" href="index.php" class="alert-link">x</a>
                        <h3 style="text-align: center;">Falha ao logar! E-mail ou senha incorretos!</h3>
                    </div>';
                    echo '</body>';
                    echo '</html>';
    }

?>
               
        <br />
        <br />
        <a href="../../../index.php" class="btn btn-link" style="margin-left: 40%;">
            <img src="../../../img/erroLogin.jpg" style="width: 20rem; margin: auto" >
        </a>
        <br>
        <a href="../../../index.php" class="btn btn-link" style="margin-left: 50%;">
            <i class="bi bi-reply" style="font-size: 2rem;"></i>
        </a>

        <?php die(); ?>

   	</main>

	<?php
	include "html/rodaPe.php";
	?>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
</body>

</html>

<!-- Modal -->
<!-- <div class="modal fade" id="erro_login_modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ERRO</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="src/logout.php" method="post">
                <div class="modal-body">

                    <h2 style='text-align: center;'>Falha ao logar! E-mail ou senha incorretos!</h2>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">OK</button>
                </div>
            </form>
        </div>
    </div>
</div> -->