<?php
require_once 'init.php';
// pega os dados do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
$canal = isset($_POST['canal']) ? $_POST['canal'] : null;
$ano = isset($_POST['ano']) ? $_POST['ano'] : null;
$temporadas = isset($_POST['temporadas']) ? $_POST['temporadas'] : null;
$avaliacao = isset($_POST['avaliacao']) ? $_POST['avaliacao'] : null;
// validação

if ((empty($nome)) || (empty($canal)) || (empty($ano)) || (empty($temporadas)) || (empty($avaliacao)))
{
    echo "Por gentilza, preencha todos os campos!";
    exit;
}

if($avaliacao >= 0 && $avaliacao <= 10){
    $PDO = db_connect();
    $sql = "INSERT INTO series(nome, canal_id, ano, temporadas, avaliacao) VALUES(:nome, :canal_id, :ano, :temporadas, :avaliacao)";
    $stmt = $PDO->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':canal_id', $canal);
    $stmt->bindParam(':ano', $ano);
    $stmt->bindParam(':temporadas', $temporadas);
    $stmt->bindParam(':avaliacao', $avaliacao);
    if($stmt -> execute())
    {
        header('Location: ./msgSucesso/msgSucessoCadastroSerie.html');
    }
    else
    {
        header('Location: ./msgErro/msgErro.html');
    }
}

else
{
    header('Location: ./msgErro/msgErroAvaliacaoAdd.html');
}

?>