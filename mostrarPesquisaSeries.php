<?php
require 'init.php';
$trecho = isset($_POST['trecho']) ? $_POST['trecho'] : null;
if (empty($trecho))
{
    header('Location: ./msgErro/msgErro.html');
}
$pesquisa = '%' . $trecho . '%';
$PDO = db_connect();
$sql = "SELECT Se.id, Se.nome, Se.canal_id, Se.ano, Se.temporadas, Se.avaliacao, Ca.id, Ca.nomeCanal FROM series as Se INNER JOIN canal as Ca on Se.canal_id = Ca.id WHERE upper(Se.nome) like :trecho ORDER BY Se.nome ASC";
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
                $("#menu").load("./navbar/navbar.html");
            });
        });
    </script>
</head>
<body>
    <div class="container">
            <div id="menu"></div>
    </div>
    <div class="container">
        <p class="h3 text-center" style="margin-top: 120px">Séries Encontradas na Pesquisa</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Canal</th>
                    <th scope="col">Ano de Lançamento</th>
                    <th scope="col">Temporadas</th>
                    <th scope="col">Avaliação</th>
                    <th scope="col">
                        <a class="btn btn-secondary" href="./pesquisarSerie.html" onclick="return confirm('Tem certeza que deseja refazer a pesquisa?');">Refazer Pesquisa</a>
                    </th>
                    
                </tr>
            </thead>
            <tbody>
                <?php while ($serie = $stmt->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $serie['nome'] ?></td>
                        <td><?php echo $serie['nomeCanal'] ?></td>
                        <td><?php echo $serie['ano'] ?></td>
                        <td><?php echo $serie['temporadas'] ?></td>
                        <td><?php echo $serie['avaliacao'] ?></td>
                        <td>
                            <a class="btn btn-primary" href="formEditSeries.php?id=<?php echo $serie['id'] ?>">Editar</a>
                            <a class="btn btn-danger" href="deleteSeries.php?id=<?php echo $serie['id'] ?>" onclick="return confirm('Tem certeza de que deseja remover?');">Remover</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
            </table>
    </div>
</body>
</html>