<?php
require 'init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;

if (empty($id))
{
    echo "ID para alteração não definido";
    exit;
}

$PDO = db_connect();
$sql = "SELECT nome, canal, ano, temporadas, avaliacao FROM Series WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$series = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($series))
{
    echo "Nenhuma série encontrada";
    exit;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edição de Séries</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <style type="text/css">
            .container{
                margin-top: 50px;
                margin-left: 100px;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <h2>Edição de Série<h2>
            <form action="edit.php" method="post">
            <div class="form-group">
                <label for="name">Nome: </label>
                <input type="text" class="form-control col-sm" name="nome" id="nome" style="width:25%;" placeholder="<?php echo $series['nome'] ?>...">
                    
            </div>
            <div class="form-group">
                <label for="canal">Canal: </label>
                <input type="text" class="form-control col-sm" name="canal" id="canal" style="width:25%;" placeholder="<?php echo $series['canal'] ?>...">
            </div>
            <div class="form-group">
                <label for="ano">Ano de lançamento: </label>
                <input type="int" class="form-control col-sm" name="ano" id="ano" style="width:25%;" placeholder="<?php echo $series['ano'] ?>...">
            </div>
            <div class="form-group">
                <label for="temporadas">Quantidade de temporadas: </label>
                <input type="int" class="form-control col-sm" name="temporadas" id="temporadas" style="width:25%;" placeholder="<?php echo $series['temporadas'] ?> temporadas...">
            </div>
            <div class="form-group">
                <label for="avaliacao">Avaliação de 0 a 10:</label>
                <input type="int" class="form-control col-sm" name="avaliacao" id="avaliacao" style="width:25%;" placeholder="<?php echo $series['avaliacao'] ?>...">
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" class="btn btn-primary">Alterar</button>
            </form>
    </div>
    </body>
</html>