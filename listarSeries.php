<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM Series ORDER BY nome ASC";
$sql = "SELECT Se.id, Se.nome, Se.ano, Se.temporadas, Se.avaliacao, Ca.id, Ca.nomeCanal FROM Series as Se INNER JOIN Canal as Ca WHERE Se.canal_id = Ca.id";

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
            <h1 class="h1 text-center" style="margin-top: 20px">Lista de Séries Assistidas</h1>
        </div>
            <p>Total de séries: <?php echo $total ?></p>
            <?php if ($total > 0): ?>
            <table class="table table-striped" width="50%">
                <thead>
                    <tr>
                        <th>Título</th>
                        <th>Canal</th>
                        <th>Ano</th>
                        <th>Temporadas</th>
                        <th>Avaliação</th>
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