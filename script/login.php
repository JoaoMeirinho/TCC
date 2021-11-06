<?php
session_start();
include_once("conexao.php");

$admin = "admin";
$adminpass = md5("Tcc_Retis_2334512");
$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
// $entrar = $_POST['entrar'];
$senha = md5($_POST['pass']);
$query = "SELECT * FROM cliente WHERE usuario = BINARY '$user' AND senha = BINARY '$senha'";
$verifica = mysqli_query($conexao, $query) or die("Erro de seleção". mysqli_error($conexao));
if(mysqli_num_rows($verifica) <= 0){
    if ($user === $admin && $senha ===  $adminpass){
        $_SESSION['user'] = $admin;
        header("location:../index.php");

    }else{
    echo"<script language='javascript' type='text/javascript'>
    alert('Login e/ou senha incorretos');window.location
    .href='../login.php';</script>";
    die();
    }
}
else{
    $arrayDados = mysqli_fetch_array($verifica);
    $id = $arrayDados['id_cliente'];
    $_SESSION['id'] = $id;
    $_SESSION['user'] = $user;
    
    header("location:../index.php");
}

?>