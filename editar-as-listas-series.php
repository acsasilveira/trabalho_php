<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM Series ORDER BY nome ASC";

$sql = "SELECT id, nome, canal, ano, temporadas, avaliacao FROM Series ORDER BY nome ASC";

$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title> Séries Assistidas</title>

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
            <h1 class="h1 text-center" style="margin-top: 20px">Lista de Séries Assistidas</h1>
            <p><b>Total de séries: </b><?php echo $total ?></p>
            <?php if ($total > 0): ?>
            
                <table class="table table-striped" width="50%">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Canal</th>
                            <th>Ano</th>
                            <th>Temporadas</th>
                            <th>Avaliação</th>
                            <th>Alterações</th>
                        </tr>
                    </thdead>
                    <tbody>
                        <?php while ($series = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                        <tr>
                            <td><?php echo $series['nome'] ?></td>
                            <td><?php echo $series['canal'] ?></td>
                            <td><?php echo $series['ano'] ?></td>
                            <td><?php echo $series['temporadas'] ?></td>
                            <td><?php echo $series['avaliacao'] ?></td>
                            <td>
                                <a href="form-edit.php?id=<?php echo $series['id'] ?>">Editar</a>
                                <?php echo "/" ?>
                                <a href="delete.php?id=<?php echo $series['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                            </td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
            </table>
            <?php else: ?>
            <h4>Nenhuma série registrada<h4>
            <?php endif; ?>
        </div>
    </body>
</html>