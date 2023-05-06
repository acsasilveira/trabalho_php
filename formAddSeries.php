<?php
require_once 'init.php';
$PDO = db_connect();
$sql = "SELECT id, nomeCanal FROM Canal ORDER BY nomeCanal ASC";
$stmt = $PDO->prepare($sql);
$stmt-> execute();

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastro | Séries Assistidas</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/popper.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/JQuery.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(function(){
                    $("#menu").load("navbar.html");
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
        <div id="menu"></div>
            <h1 class="h1 text-center" style="margin-top: 20px">Cadastro das Séries Assistidas</h1>
        </div>
        <div class="container">
            <form action="addSeries.php" method="post">
            <div class="form-group">
                <label for="name">Nome: </label>
                <input type="text" class="form-control col-sm" name="nome" id="nome" style="width:25%;" placeholder="Digite o nome...">
            </div>
            <div class="form-group">
                <label for="canal">Canal: </label>
                <select class="form-control" name="canal" id="canal" required style="width:25%">
                    <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>

                        <option value=" <?php echo $dados['id'] ?>" > <?php echo $dados['nomeCanal'] ?> </option>
                    <?php endwhile; ?>
                </select>
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
                <label for="avaliacao">Avaliação de 0 a 10: </label>
                <input type="int" class="form-control col-sm" name="avaliacao" id="avaliacao" style="width:25%;" placeholder="Entre 0 e 10...">
            </div>
                <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Cadastrar</button>
                <a class="btn btn-outline-primary my-2 my-sm-0" href="index.html" onclick="return confirm('Tem certeza que deseja cancelar? Se você sair, seu progresso será perdido...');">Cancelar</a>
                

            </form>
        </div>
</body>
</html>
