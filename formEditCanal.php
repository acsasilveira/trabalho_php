<?php
require 'init.php';

$id = isset($_GET['id']) ? (int) $_GET['id'] : null;
if(empty($id))
{
    header('Location: msgErro.html');
}
$PDO = db_connect();
$sql = "SELECT id, nomeCanal FROM canal WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
$stmt->execute();
$canal = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Edição de Canais</title>
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
            <h1 class="h1 text-center" style="margin-top: 120px">Edição de Canal</h1>
            <form action="editCanal.php" method="post">
            <div class="form-group">
                <label for="nomeCanal">Nome: </label>
                <input type="text" class="form-control col-sm" name="nomeCanal" id="nomeCanal" style="width: 25%;" value="<?php echo $canal['nomeCanal'] ?>">
                    
            </div>
            <input type="hidden" name="id" value="<?php echo $id ?>">
            <button type="submit" class="btn btn-outline-success my-2 my-sm-0">Alterar</button>
            <a class="btn btn-outline-primary my-2 my-sm-0" href="index.html" onclick="return confirm('Tem certeza que deseja cancelar? Se você sair, seu progresso será perdido...');">Cancelar</a>
            </form>
    </div>
    </body>
</html>