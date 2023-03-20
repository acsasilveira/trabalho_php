<?php
require_once 'init.php';
// pega os dados do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$canal = isset($_POST['canal']) ? $_POST['canal'] : null;
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;
$temporadas = isset($_POST['temporadas']) ? $_POST['temporadas'] : null;
$avaliacao = isset($_POST['avaliacao']) ? $_POST['avaliacao'] : null;
// validação (bem simples, se usa ape)
if ((empty($nome)) || (empty($canal)) || (empty($ano)) || (empty($temporadas)) || (empty($avaliacao)))
{
    echo "Por gentilza, preencha todos os campos!";
    exit;
}
if ($avaliacao > 10 || $avaliacao < 0)
{
    echo "A avaliação deve ser feita apenas entre 0 a 10!";
}
$PDO = db_connect();
$sql = "INSERT INTO Series(nome, canal, ano, temporadas, avaliacao) VALUES(:nome, :canal, :ano, :temporadas, :avaliacao)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':canal', $canal);
$stmt->bindParam(':ano', $ano);
$stmt->bindParam(':temporadas', $temporadas);
$stmt->bindParam(':avaliacao', $avaliacao);
if($stmt -> execute())
{
    header('Location: index.php');
}
else
{
    echo "Erro ao cadastrar";
    print_r($stmt->errorInfo());
}

?>