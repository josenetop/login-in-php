<?php
session_start();
include 'conexao.php';

$nome = mysqli_real_escape_string($conexao, trim($_POST['nome']));
$email = mysqli_real_escape_string($conexao, trim($_POST['email']));
$senha = mysqli_real_escape_string($conexao, trim(md5($_POST['senha'])));

$sql = "select count(*) as total from tb_usuario where emailUser = '$email'";
$result = mysqli_query($conexao, $sql);
$row = mysqli_fetch_assoc($result);

if($row['total'] == 1){
    $_SESSION['usuarioExiste'] = true;
    header('Location: cadastro.php');
    exit;
}
$sql = "INSERT INTO tb_usuario (nomeUser, emailUser, senhaUser, createAt) VALUES ('$nome','$email', '$senha', NOW())";

if($conexao->query($sql) === TRUE){
    $_SESSION['statusCadastro'] = true;
}

$conexao->close();

header('Location: cadastro.php');
exit;
?>