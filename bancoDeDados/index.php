<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <link rel="stylesheet" href="css/estilo.css" />
    <title>Senac - Curso de PHP</title>
</head>

<body>
    <div>

        <h3>Login.</h3>
        <hr>
        <br>
       
        <section id="resposta" class="alert alert-danger" role="alert" style="display: none;">

        </section>
        
        <form action="" method="post" name="f" onsubmit="return validar()">
            <br>
            
            <label class="form-label">E-mail:</label>
            <input type="email" name="email" class="form-control">
            
            <label class="form-label">Senha:</label>
            <input type="password" name="senha" class="form-control">
            <br>
            <input type="submit" value="Entrar" class="btn btn-primary">
        </form>
        
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8"
        crossorigin="anonymous"></script>
</body>

</html>