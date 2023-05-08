<?php
require_once 'init.php';
// abre a conexão
$PDO = db_connect();

$sql_count = "SELECT COUNT(*) AS total FROM canal ORDER BY nomeCanal ASC";
$sql = "SELECT id, nomeCanal FROM canal ORDER BY nomeCanal ASC";

$stmt_count = $PDO->prepare($sql_count);
$stmt_count->execute();
$total = $stmt_count->fetchColumn();

$stmt = $PDO->prepare($sql);
$stmt->execute();

?>
<!doctype html>
<html>
    <head>
        <head>
        <meta charset="utf-8">
        <title>Lista | Séries Assistidas</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
        <script src="bootstrap/js/popper.js"></script>
        <script src="bootstrap/js/bootstrap.js"></script>
        <script src="bootstrap/js/JQuery.js"></script>
        <script type="text/javascript">
            $(document).ready(function(){
                $(function(){
                    $("#menu").load("./navbar/navbarCanal.html");
                });
            });
        </script>
    </head>
    <body>
        <div class="container">
            <div id="menu"></div>
            <h1 class="h1 text-center" style="margin-top: 120px">Lista de Canais</h1>
            <p>Total de canais: <?php echo $total ?></p>
            <?php if ($total > 0): ?>
            <table class="table table-striped" style="width: 50%">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">
                            <a class="btn btn-secondary" href="./formAddCanal.html">Cadastrar +</a>
                        </th>
                    </tr>
                </thdead>
            <tbody>
                <?php while ($canais = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                <tr>
                    <td><?php echo $canais['nomeCanal'] ?></td>
                    <td>
                    <a class="btn btn-outline-primary my-2 my-sm-0" href="formEditCanal.php?id=<?php echo $canais['id'] ?>">Editar</a>
                        <a class="btn btn-outline-danger my-2 my-sm-0" href="deleteCanais.php?id=<?php echo $canais['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>

                    </td>
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