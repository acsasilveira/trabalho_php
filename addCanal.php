<?php
require_once 'init.php';
// pega os dados do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
// validação
if (empty($nome))
{
    echo "Por gentilza, preencha todos os campos!";
    exit;
}
$PDO = db_connect();
$sql = "INSERT INTO canal(nomeCanal) VALUES(:nome)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
if($stmt -> execute())
{
    header('Location: ./msgSucesso/msgSucessoCadastroCanal.html');
}
else
{
    header('Location: ./msgErro/msgErro.html');
}

?>