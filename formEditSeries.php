<?php
require 'init.php';

$PDO = db_connect();
$sql = "SELECT Se.id, Se.nome, Se.ano, Se.temporadas, Se.avaliacao, Ca.id, Ca.nomeCanal FROM Series as Se INNER JOIN Canal as Ca WHERE Se.canal_id = Ca.id";
$stmt = $PDO->prepare($sql);
$stmt-> execute();
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
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
            <h1 class="h1 text-center" style="margin: 20px">Editar Série</h1>
        </div>
            <form action="editSeries.php" method="post">
            <div class="form-group">
                <label for="name">Nome: </label>
                <input type="text" class="form-control col-sm" name="nome" id="nome" style="width:25%;" value="<?php echo $series['nome'] ?>">
                    
            </div>
            <div class="form-group">
                <label for="canal">Canal: </label>
                <label for="canal">Canal: </label>
                <select class="form-control" name="canal" id="canal" required style="width:25%">
                    <?php while($dados = $stmt->fetch(PDO::FETCH_ASSOC)) : ?>

                        <option value=" <?php echo $dados['id'] ?>" > <?php echo $dados['nomeCanal'] ?> </option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="ano">Ano de lançamento: </label>
                <input type="int" class="form-control col-sm" name="ano" id="ano" style="width:25%;" value="<?php echo $series['ano'] ?>">
            </div>
            <div class="form-group">
                <label for="temporadas">Quantidade de temporadas: </label>
                <input type="int" class="form-control col-sm" name="temporadas" id="temporadas" style="width:25%;" value="<?php echo $series['temporadas'] ?>">
            </div>
            <div class="form-group">
                <label for="avaliacao">Avaliação de 0 a 10:</label>
                <input type="number" class="form-control col-sm" name="avaliacao" id="avaliacao" style="width:25%;" value="<?php echo $series['avaliacao'] ?>">
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" class="btn btn-primary">Alterar</button>
            </form>
        </div>
    </body>
</html>