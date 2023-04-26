<?php
require_once 'init.php';
// pega os dados do formulário
$nome = isset($_POST['nome']) ? $_POST['nome'] : null;
// validação
if (empty($nome))
{
    echo "oi Por gentilza, preencha todos os campos!";
    exit;
}
$PDO = db_connect();
$sql = "INSERT INTO Canal(nomeCanal) VALUES(:nome)";
$stmt = $PDO->prepare($sql);
$stmt->bindParam(':nome', $nome);
if($stmt -> execute())
{
    header('Location: index.html');
}
else
{
    header('Location: msgErro.html');
}

?>