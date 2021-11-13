<?php
session_start();
include_once('script/conexao.php');
if (isset($_SESSION['user'])){
   include_once("script/conexao.php");
   echo "<p>Bem-vindo(a),".$_SESSION['user']. "</p>";
   $user = $_SESSION['user'];

   if ($user != 'admin'){
      $id = $_SESSION['id'];
   }

   if (empty($_GET['situacao'])){
      $situacao = 'PENDENTE';
   }else{
      $situacao = $_GET['situacao'];
   }

   if ($user == 'admin'){
      $query = "SELECT * FROM agenda WHERE situacao = '$situacao' ORDER BY data ASC";
   }else{
      $query = "SELECT * FROM agenda WHERE id_cliente = '$id' AND situacao = '$situacao'ORDER BY data ASC";
   }

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
<h1>Filtrar:</h1>
<form action="" method="get">
<select name="situacao" class="opt">
   <option value="PENDENTE" <?php if ($situacao == "PENDENTE")  echo "selected";?>>Pendente</option>
   <option value="ACEITO" <?php if ($situacao == "ACEITO")  echo "selected";?>>Aceito</option>
   <option value="RECUSADO" <?php if ($situacao == "RECUSADO")  echo "selected";?>>Recusado</option>
   <option value="REALIZADO" <?php if ($situacao == "REALIZADO")  echo "selected";?>>Realizado</option>
</select>
<input type="submit" value="atualizar" class="btn-pedido">
</form>
<h1>Pedidos:</h1>
<?php
if(!$validandoQuery){
echo mysqli_error($conexao);
}
   while ($row = mysqli_fetch_assoc($validandoQuery)){
      $queryServico = "SELECT * FROM servicos WHERE id_servico = '$row[id_servico]'";
      $validandoQueryServico = mysqli_query($conexao, $queryServico);
      $arrayServico = mysqli_fetch_array($validandoQueryServico);

      echo "<div class = 'card'>
               <h1> Pedido: ".$arrayServico['nomeServico']."</h1>
               <p> Situação: <b>".$row['situacao']."</b></p>";
      if($row['situacao'] == 'ACEITO' || $row['situacao'] == 'REALIZADO'){
         echo "<p> Agendado para: <b>".date('d/m/Y', strtotime($row['data']))."</b></p>";
      }
      if($user == 'admin'){
         $queryUser = "SELECT * FROM cliente WHERE id_cliente = '$row[id_cliente]'";
         $validandoQueryUser = mysqli_query($conexao, $queryUser);
         $arrayUser = mysqli_fetch_array($validandoQueryUser);
         echo "<p>Cliente: ".$arrayUser['nome']."</p>";
         echo "<p>Endereço: ".$arrayUser['endereco']."</p>";
         echo "<p>Email: ".$arrayUser['email']."</p>";
         echo "<p>Número de telefone: ".$arrayUser['numTel']."</p>";
      }

      echo "<div class='menu-avaliar'>
            <a href='deletar.php?id=".$row['id_agendamento']."'><button class='login-on'>Deletar pedido</button></a>";

      if ($user == 'admin'){
         echo "<a href='avaliarpedido.php?id=".$row['id_agendamento']."'><button class='btn-pedido'>Avaliar pedido</button></a>";
      }
      echo "</div>";
      echo "</div>";

   }

?>
</body>
</html>