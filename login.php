<?php
session_start();
include('Classes/conexao.php');
    if(empty($_POST['email']) || empty($_POST['senha'])){
        header('Location: login.html');
        exit();
    }

$usuario = mysqli_real_escape_string($conexao, $_POST['email']);
$senha = mysqli_real_escape_string($conexao, $_POST['senha']);

$query = "select idUser, senhaUser from tb_usuario where emailUser = '{$usuario}' and senhaUser = md5('{$senha}')";

$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

if($row == 1){
    $_SESSION['emailUser'] = $usuario;
    header('Location: index.php');
    exit();
}
else{
    header('Location: login.html');
}

?>
