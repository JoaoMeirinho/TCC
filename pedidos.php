<?php
session_start();
include_once('script/conexao.php');
if (isset($_SESSION['user'])){
   include_once("script/conexao.php");
   echo "<p>Bem-vindo(a),".$_SESSION['user']. "</p>";
   $id = $_SESSION['id'];
   $query = "SELECT * FROM agenda WHERE id_cliente = '$id' ORDER BY id_agendamento DESC";
   $validandoQuery = mysqli_query($conexao,$query);
   // $arrayAgenda = mysqli_fetch_array($validandoQuery);
}else{
   header("location:login.php");
};



?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/style.css">
    <title>Document</title>
</head>
<body>
<div class="menu-pedidos">
   <button class="btn-pedido"><a href="index.php">Voltar</a></button>
   <button class="btn-pedido"><a href="novoPedido.php">+ Novo Pedido</a></button>
</div>

<?php
   while ($row = mysqli_fetch_assoc($validandoQuery)){
      $queryServico = "SELECT * FROM servicos WHERE id_servico = '$row[id_servico]'";
      $validandoQueryServico = mysqli_query($conexao, $queryServico);
      $arrayServico = mysqli_fetch_array($validandoQueryServico);
      echo "<div class = 'card'>
               <h1> Pedido: ".$arrayServico['nomeServico']."</h1>
               <p> Situação: ".$row['situacao']."</p>
               <a href='deletar.php?id=".$row['id_agendamento']."'><button class='login-on'>Deletar pedido</button></a>
            </div>";
   }

?>
</body>
</html>