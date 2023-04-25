<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM Canal ORDER BY nomeCanal ASC";
$sql = "SELECT id, nomeCanal FROM Canal ORDER BY nomeCanal ASC";

$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$stmt = $PDO->prepare($sql);
$stmt->execute();
?>
<!doctype html>
<html>
    <head>
        <<head>
        <meta charset="utf-8">
        <title> Canais</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/JQuery.js"></script>
    <script src="bootstrap/js/popper.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="text/javascript">
        $(document).ready(function(){
            $(function(){
                $("#menu").load("navbar.html");
            });
        });
    </script>
    </head>
    </head>
    <body>
        <div class="container">
            <div id="menu"></div>
            <h1 class="h1 text-center" style="margin-top: 20px">Lista de Canais</h1>
        </div>
            <p>Total de canais: <?php echo $total ?></p>
            <?php if ($total > 0): ?>
            <table class="table table-striped" width="50%">
                <thead>
                    <tr>
                        <th>Nome</th>
                    </tr>
                </thdead>
            <tbody>
                <?php while ($canais = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $canais['nomeCanal'] ?></td>
            </tr>
            <?php endwhile; ?>
            </tbody>
            </table>
            <?php else: ?>
            <h4>Nenhum canal registrado<h4>
            <?php endif; ?>
        </div>
    </body>
</html>