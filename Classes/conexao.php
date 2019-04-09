<?php
define('DB_HOST', '127.0.0.1');
define('DB_NAME', 'phpoo');
define('DB_USER', 'root');
define('DB_PASS', '');

$conexao = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME) or die('Não foi possível conectar ao banco');
?>