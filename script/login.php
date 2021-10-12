<?php
session_start();
include_once("conexao.php");

$user = $_POST['user'];
// $entrar = $_POST['entrar'];
$senha = md5($_POST['pass']);
$query = "SELECT * FROM cliente WHERE usuario = '$user' AND senha = '$senha'";
$verifica = mysqli_query($conexao, $query) or die("Erro de seleção". mysqli_error($conexao));
if(mysqli_num_rows($verifica) <= 0){
    echo"<script language='javascript' type='text/javascript'>
    alert('Login e/ou senha incorretos');window.location
    .href='../login.html';</script>";
    die();
}else{
    $_SESSION['user'] = $user;
    header("location:../index.php");
}

?>