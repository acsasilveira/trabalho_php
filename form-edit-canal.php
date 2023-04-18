<?php
require 'init.php';

$PDO = db_connect();
$sql = "SELECT nomeCanal FROM Canal WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$canais = $stmt->fetch(PDO::FETCH_ASSOC);

if (!is_array($canais))
{
    echo "Nenhuma canal encontrado!";
    exit;
}
?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edição de Canais</title>
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
                                <a class="dropdown-item" href="form-edit-series.php">Edição de Séries</a>
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown10" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Canais</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown10">
                                <a class="dropdown-item" href="form-add-canal.php">Cadastrar Canal</a>
                                <a class="dropdown-item" href="lista-canal.php">Listar Canais</a>
                                <a class="dropdown-item" href="form-edit-canal.php">Edição de Canais</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <h1 class="h1 text-center" style="margin-top: 20px">Editar Canais</h1>
            <form action="edit-series.php" method="post">
            <div class="form-group">
                <label for="name">Nome: </label>
                <input type="text" class="form-control col-sm" name="nome" id="nome" style="width:25%;" value="<?php echo $series['nomeCanal'] ?>">
                    
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" class="btn btn-primary">Alterar</button>
            </form>
    </div>
    </body>
</html>