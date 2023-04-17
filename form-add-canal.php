<?php
require 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Cadastro de Canais</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/JQuery.js"></script>
    <script src="bootstrap/js/popper.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>

</head>
<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light rounded">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample10" aria-controls="navbarsExample10" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <a class="navbar-brand" rel="home" href="#">
                        <img styles="max-width:100px; margin-top: -7px;" src="">
                    </a>
                    <div class="collapse navbar-collapse justify-content-md-center" id="navbarsExample10">
                        <ul class="navbar-nav">
                            <li class="nav-item active">
                                <a class="nav-link" href="index.php">Home <span class="sr-only">(atual)</span></a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Séries</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown10">
                                    <a class="dropdown-item" href="form-add.php">Cadastrar Série</a>
                                    <a class="dropdown-item" href="lista-series.php">Lista de Séries</a>
                                    <a class="dropdown-item" href="editar-as-listas-series.php">Edição de Séries</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Canais</a>
                                <div class="dropdown-menu" aria-labelledby="dropdown10">
                                    <a class="dropdown-item" href="form-add-canal.php">Cadastrar Canal</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
                <h1 class="h1 text-center" style="margin: 20px">Cadastro das Séries Assistidas</h1>
        <div class="container">
            <form action="add-canal.php" method="post">
            <div class="form-group">
                <label for="name">Nome: </label>
                <input type="text" class="form-control col-sm" name="nome" id="nome" style="width:25%;" placeholder="Digite o nome...">
            </div>
                <button type="submit" class="btn btn-primary">Cadastrar</button>
            </form>
        </div>
    </div>
</body>
</html>
