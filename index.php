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
        <title>Séries Assistidas</title>

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/JQuery.js"></script>
    <script src="bootstrap/js/popper.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    </head>
    <body>
        <div class="container">
            <h1 class="h1 text-center">Cadastro das Séries Assistidas</h1>
            <p><a href="form-add.php">Adicionar Série</a></p>
            <h2>Lista de séries assistidas</h2>
            <p>Total de séries: <?php echo $total ?></p>
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