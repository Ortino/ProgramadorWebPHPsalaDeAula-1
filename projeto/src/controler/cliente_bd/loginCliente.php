<?php
    require_once "../../conexao.php";

    if(isset($_POST["email"]) || isset($_POST["senha"])){
            $email = $conexao->real_escape_string($_POST["email"]);
            $senha = $conexao->real_escape_string($_POST["senha"]);
            $lembrar = isset($_POST['lembrar']) ? $_POST['lembrar'] : false; 

            $sql_code = "select * from cliente where email = '$email'";
            $sql_query = $conexao->query($sql_code) or die("Falha na execução do código SQL: " . $conexao->error);
            
            //Quantidade de linhas retornado;
            $qtd = $sql_query->num_rows; //Atributo num_rows = número de linhas

            if($qtd == 1){
                
                $cliente = $sql_query->fetch_assoc();

                if(password_verify($senha, $cliente['senha'])){
                    if(!isset($_SESSION)){
                        session_start();
                    }

                    $_SESSION['id'] = $cliente['idcliente'];
                    $_SESSION['nome'] = $cliente['nome'];

                    //Criando o Cookie
                    //+60*60 = 3600 (1h);
                    //+60*60*24 = 86400 (24h);
                    //+60*60*24*30 = 2592000 (30 dias);
                    //+60*60*24*365 = 31536000  (1 ano);
                    // strtotime("now");
                    // strtotime("+1 day");
                    // strtotime("+1 month");
                    // strtotime("+1 yaer");
                    setcookie('cliente', $cliente['nome'], time()+2592000, "/");
                    // setcookie('cliente', $cliente['nome'], strtotime("+1 month"), "/");
                   

                    if($lembrar){
                    setcookie('login', $cliente['email'], strtotime("+1 month"), "/", "", false, true);
                    } else {
                        setcookie('login', $cliente['email'], strtotime("-1 month"), "/", "", false, true);
                    }
                    

                    
                    header("Location: ../../../index.php");
                } else {

                    // header("Location: ../../../nao_permitido.php");
                    echo "Falha ao logar! E-mail ou senha incorretos";
                }
                
            } else {
                echo "Falha ao logar! E-mail ou senha incorretos";
            }

        }

    
?>