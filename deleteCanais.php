<?php
require_once 'init.php';
$id = isset($_GET['id']) ? $_GET['id'] : null;
if(empty($id))
{
    echo "ID não informado";
    exit;
}

$PDO = db_connect();
$sql_serie = "SELECT COUNT(*) AS total FROM series WHERE canal_id = :id";
$stmt_serie = $PDO->prepare($sql_serie);
$stmt_serie->bindParam(':id', $id, PDO::PARAM_INT);
$stmt_serie->execute();
$total = $stmt_serie->fetchColumn();
if ($total > 0)
{
    header('Location: ./msgErro/msgErroDelete.html');
}
else
{
    $sql = "DELETE FROM canal WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if($stmt -> execute())
    {
        header('Location: ./msgSucesso/msgSucesso.html');
    }
    else
    {
        header('Location: ./msgErro/msgErro.html');
    }
}
?>