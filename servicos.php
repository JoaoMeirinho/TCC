<?php
session_start();
include_once('script/conexao.php');
if (isset($_SESSION['user'])){
echo "<p>Bem-vindo(a),".$_SESSION['user']."</p>";
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
<nav>
         <!-- <img src="img/sidebar2.png" alt="" id="sidebar"> -->
        <ul class="menu">
           <li><a href='index.php'>Home</a></li>
           <li><a href="servicos.php">Serviços</a></li>
           <li><a href='sobre.php'>Sobre</a></li>
        </ul>
        <div id="divLogo"><img src="img/logoRETIS.png" alt="" id="logo"></div>
        <?php
        if(empty($_SESSION['user'])){
            echo "<button class='login'><a href='login.php'>Login</a></button>";
        }else{
           echo "<button class='login-on'><a href='pedidos.php'>Pedidos</a></button>";
        };
         ?>
   </nav>
   <?php
//   Gerando cards de serviço
$query = "SELECT * FROM servicos";
$validandoQuery = mysqli_query($conexao, $query);


while($row = mysqli_fetch_array($validandoQuery)){
   echo "<div class='card'>
            <h1>".$row['nomeServico']."</h1>
            <p>".$row['descricao']."</p>
            <p>R$ <b>".$row['valor']."</b></p>
            <a href='novoPedido.php'><button class='login'>Fazer Pedido</button></a>
         </div>";
      }

   ?>
   <footer>
         <div class="pt1">
            <h2>Reflexoterapias e Terapias Integrativas Sorocaba</h3>
            <p>Agende já sua consulta e viva a vida ainda melhor!</p>
         </div>
         <div class="pt2">
            <h2>Acesso Rápido</h2>
            <ul>
               <a href="index.php"><li>Home</li></a>
               <a href="servicos.php"><li>Serviços</li></a>
               <a href="sobre.php"><li>Sobre</li></a>
            </ul>
         </div>
         <div class="pt3">
            <h2>Contate-nos</h2>
            <div class="icons">
               <a href="https://www.instagram.com/terapiasintegrativasorocaba/"><img src="img/instagram.png" alt="" class="icon-link"></a>
               <a href="https://api.whatsapp.com/send?phone=5515996898161"><img src="img/whatsapp.png" alt="" class="icon-link"></a>
               <a href="https://www.facebook.com/Reflexoterapia-e-Terapias-Integrativas-Sorocaba-626355597815833"><img src="img/facebook.png" alt="" class="icon-link"></a>
               <a href="mailto:mcftintegrativas@gmail.com"><img src="img/mail.png" alt="" class="icon-link"></a>
            </div>
         </div>
   </footer>
</body>
</html>