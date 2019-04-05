<?php
session_start();
if(!$_SESSION['emailUser']){
    header('Location: login.html');
    exit();
}
?>