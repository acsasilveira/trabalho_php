<?php
require 'init.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de cadastro</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/bootstrap.js"></script>
</head>
<body>
    <div class="container">
        <h1> CADASTRE SUA SÉRIE <h1>
        
        <form action="add.php" method="post">
        <div class="form-group">
            <label for="name">Nome: </label>
            <input type="text" class="form-control col-sm" name="nome" id="nome" style="width:25%;" placeholder="Digite o nome...">
        </div>
        <div class="form-group">
            <label for="canal">Canal: </label>
            <input type="text" class="form-control col-sm" name="canal" id="canal" style="width:25%;" placeholder="Ex: HBO, Netflix,...">
        </div>
        <div class="form-group">
            <label for="ano">Ano de lançamento: </label>
            <input type="int" class="form-control col-sm" name="ano" id="ano" style="width:25%;" placeholder="Ex: 2017...">
        </div>
        <div class="form-group">
            <label for="temporadas">Quantidade de temporadas: </label>
            <input type="int" class="form-control col-sm" name="temporadas" id="temporadas" style="width:25%;" placeholder="Ex: 2 temporadas...">
        </div>
        <div class="form-group">
            <label for="avaliacao">Avaliação: </label>
            <input type="int" class="form-control col-sm" name="avaliacao" id="avaliacao" style="width:25%;" placeholder="Entre 0 e 10...">
        </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>
</html>
