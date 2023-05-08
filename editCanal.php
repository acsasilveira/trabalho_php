<?php
require_once 'init.php';
$nomeCanal = isset($_POST['nomeCanal']) ? $_POST['nomeCanal'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
if ((empty($nomeCanal)) || (empty($id)))
{
    echo "Por gentileza, preencha todos os campos!";
    exit;
}
$PDO = db_connect();
$sql = "UPDATE canal SET nomeCanal = :nomeCanal WHERE id = :id";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nomeCanal', $nomeCanal);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);
if($stmt -> execute())
{
    header('Location: ./msgSucesso/msgSucessoEdicaoCanal.html');
}
else
{
    header('Location: ./msgErro/msgErro.html');
}
?>
