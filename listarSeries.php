<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM series ORDER BY nome ASC";
$sql = "SELECT Se.id, Se.nome, Se.ano, Se.temporadas, Se.avaliacao, Ca.nomeCanal FROM series as Se INNER JOIN canal as Ca WHERE Se.canal_id = Ca.id ORDER BY Se.nome ASC";

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
        <title> Lista | Séries Assistidas</title>
        <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/popper.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/JQuery.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(function(){
                    $("#menu").load("navbarIndex.html");
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div id="menu"></div>
            <h1 class="h1 text-center" style="margin-top: 120px">Lista de Séries Assistidas</h1>
            <p>Total de séries: <?php echo $total ?></p>
            <?php if ($total > 0): ?>
            <table class="table table-striped" style="width: 70%">
                <thead>
                    <tr>
                        <th scope="col" >Título</th>
                        <th scope="col">Canal</th>
                        <th scope="col">Ano</th>
                        <th scope="col">Temporadas</th>
                        <th scope="col">Avaliação</th>
                        <th scope="col">
                            <a class="btn btn-secondary" href="./formAddSeries.php">Cadastrar +</a>
                        </th>
                    </tr>
                </thdead>
            <tbody>
                <?php while ($series = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $series['nome'] ?></td>
                    <td><?php echo $series['nomeCanal'] ?></td>
                    <td><?php echo $series['ano'] ?></td>
                    <td><?php echo $series['temporadas'] ?></td>
                    <td><?php echo $series['avaliacao'] ?></td>
                    <td>
                        <a class="btn btn-outline-primary my-2 my-sm-0" href="formEditSeries.php?id=<?php echo $series['id'] ?>">Editar</a>
                        <a class="btn btn-outline-danger my-2 my-sm-0" href="deleteSeries.php?id=<?php echo $series['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>

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