<?php

require 'init.php';
$trecho = isset($_POST['trecho']) ? $_POST['trecho'] : null;
if (empty($trecho))
{
    header('Location: ./../msgErro/msgErro.html');
}
$pesquisa = '%' . $trecho . '%';
$PDO = db_connect();
$sql = "SELECT id, nomeCanal FROM canal WHERE upper(nomeCanal) like :trecho ORDER BY nomeCanal ASC";
$stmt = $PDO->prepare($sql);
$stmt->execute([':trecho' => $pesquisa]);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisa | Séries Assistidas</title>
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">
    <script src="bootstrap/js/popper.js"></script>
    <script src="bootstrap/js/bootstrap.js"></script>
    <script src="bootstrap/js/JQuery.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(function(){
                $("#menu").load("./../navbar/navbar.html");
            });
        });
    </script>
</head>
<body>
    <div class="container">
            <div id="menu"></div>
    </div>
    <div class="container">
        <p class="h3 text-center" style="margin-top: 120px">Canais Encontrados na Pesquisa</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">
                        <a class="btn btn-secondary" href="./pesquisarCanal.html" onclick="return confirm('Tem certeza que deseja refazer a pesquisa?');">Refazer Pesquisa</a>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php while ($canal = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $canal['nomeCanal'] ?></td>
                        <td>
                            <a class="btn btn-primary" href="./../formEditCanal.php?id=<?php echo $canal['id'] ?>">Editar</a>
                            <a class="btn btn-danger" href="./../deleteCanais.php?id=<?php echo $canal['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            </table>
    </div>
</body>
</html>