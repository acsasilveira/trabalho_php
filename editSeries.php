<?php
require_once 'init.php';
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$canal = isset($_POST['canal']) ? $_POST['canal'] : null;
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;
$temporadas = isset($_POST['temporadas']) ? $_POST['temporadas'] : null;
$avaliacao = isset($_POST['avaliacao']) ? $_POST['avaliacao'] : null;
$id = isset($_POST['id']) ? $_POST['id'] : null;
if ((empty($nome)) || (empty($canal)) || (empty($ano)) || (empty($temporadas)) || (empty($avaliacao)) || (empty($id)))
{
    echo "Por gentileza, preencha todos os campos!";
    exit;
}
if ($avaliacao > 10 || $avaliacao < 0)
{
    header('Location: ./msgErro/msgErroAvaliacaoEdit.html');
}
else
{
    $PDO = db_connect();
    $sql = "UPDATE series SET nome = :nome, canal_id = :canal, ano = :ano, temporadas = :temporadas, avaliacao = :avaliacao WHERE id = :id";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':canal', $canal);
    $stmt->bindParam(':ano', $ano);
    $stmt->bindParam(':temporadas', $temporadas);
    $stmt->bindParam(':avaliacao', $avaliacao);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    if($stmt -> execute())
    {
        header('Location: ./msgSucesso/msgSucessoEdicaoSerie.html');
    }
    else
    {
        header('Location: ./msgErro/msgErro.html');
    }
}
?>
