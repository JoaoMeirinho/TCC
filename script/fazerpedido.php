<?php
session_start();
require_once('conexao.php');
$servico = $_POST['servico'];
$queryServico = "SELECT * FROM servicos WHERE id_servico ='$servico'";
$validandoServico = mysqli_query($conexao,$queryServico);
$arrayServico = mysqli_fetch_array($validandoServico);

// buscando id's
$idServico = $arrayServico['id_servico'];
$idUsuario = $_SESSION['id'];

//validando o pedido
$queryInserirPedido = "INSERT INTO agenda (id_cliente, id_servico, situacao, data) VALUES ('$idUsuario','$idServico','PENDENTE','0000-00-00')";
$validandoPedido = mysqli_query($conexao,$queryInserirPedido);
if($validandoPedido){
    echo"<script language='javascript' type='text/javascript'>
    alert('Pedido feito com sucesso!');window.location.
    href='../pedidos.php'</script>";
  }
  else{
    echo"<script language='javascript' type='text/javascript'>
    alert('Não foi possível realizar o pedido');'</script>";

    echo mysqli_error($conexao);
}


?>