<?php
require 'init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if(empty($id))
{
    header('Location: msgErro.html');
}

$PDO = db_connect();
$sql = "SELECT id, nome, canal_id, ano, temporadas, avaliacao FROM series WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt-> execute();
$series = $stmt->fetch(PDO::FETCH_ASSOC);
$sqlcanais="SELECT id, nomeCanal FROM canal ORDER BY nomeCanal ASC";
$stmtcanais = $PDO->prepare($sqlcanais);
$stmtcanais-> execute();

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
                    $("#menu").load("./navbar/navbar.html");
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div id="menu"></div>
            <h1 class="h1 text-center" style="margin-top: 120px">Edição de Série</h1>
        </div>
        <div class="container">
            <form action="editSeries.php" method="post">
            <div class="form-group">
                <label for="name">Nome: </label>
                <input type="text" class="form-control col-sm" name="nome" id="nome" style="width:25%;" value="<?php echo $series['nome'] ?>">
                    
            </div>
            <div class="form-group">
                <label for="canal">Canal: </label>
                <select class="form-control" name="canal" id="canal" style="width:25%">
                    <?php while($dados = $stmtcanais->fetch(PDO::FETCH_ASSOC)) : ?>
                        <?php if($dados['id'] == $serie['canal_id']):?>
                           <option selected="selected" value=" <?php echo $dados['id'] ?>" > <?php echo $dados['nomeCanal'] ?> </option>
                        <?php else: ?>
                            <option value=" <?php echo $dados['id'] ?>" > <?php echo $dados['nomeCanal'] ?> </option>
                        <?php endif; ?>
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
            <input type="hidden" name="id" value="<?php echo $series['id'] ?>">
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Alterar</button>
            <a class="btn btn-outline-primary my-2 my-sm-0" href="index.html" onclick="return confirm('Tem certeza que deseja cancelar? Se você sair, seu progresso será perdido...');">Cancelar</a>
            </form>
        </div>
    </body>
</html>