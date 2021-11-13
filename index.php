<?php
session_start();
include_once('script/conexao.php');
if (isset($_SESSION['user'])){
$user = $_SESSION['user'];
echo "<p>Bem-vindo(a),".$user."</p>";
};



?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/style.css">
</head>
<body>
   <nav>
         <!-- <img src="img/sidebar2.png" alt="" id="sidebar"> -->
        <ul class="menu">
           <li><a href='index.php'>Home</a></li>
           <li><a href="servicos.php">Serviços</a></li>
           <li><a href='sobre.php'>Sobre</a></li>
           <?php
            if(isset($_SESSION['user'])) echo "<li><a href='sair.php'>Sair</a></li>";
           ?>
        </ul>
        <div id="divLogo"><img src="img/logogus.png" alt="" id="logo"></div>
        <?php
        if(empty($_SESSION['user'])){
            echo "<button class='login'><a href='login.php'>Login</a></button>";
        }else{
           echo '<button class="login-on"><a href="pedidos.php?situacao=PENDENTE">Pedidos</a></button>';
        };
         ?>
        
   </nav>
   <div class="image">
      <h1>Massagens Terapêuticas</h1>
      <p>Para viver melhor a vida!</p>
   </div>
   <h1>Por que fazer uma massagem?</h1>
   <p>A massagem é uma troca de energias em que, através de técnicas de deslizamento, fricção e amassamento, 
      se trabalha o sistema circulatório, linfático, nervoso e energético, que proporcionam a descontração 
      do corpo e da mente, combatendo a fadiga física e mental.
   </p>
   <p>
      Alguns dos benefícios da massagem que mais refletem de forma efetiva no dia a dia incluem o Controle 
      do estresse, Diminuição da ansiedade, Alívio da tensão e das dores musculares, Alívio das dores de cabeça, 
      Diminuição do cansaço e Diminuição das insônias.
   </p>
   <div class="quote">
      <p><i>"Fazer massagens mudou a minha vida!"</i></p>
      <p id="name"> -Teixeira, Consuele</p>
   </div>
   <h1>Curtiu? Então agende já sua consulta!</h1>
   <a href="novoPedido.php"><button class="btn-agendar">Agendar Consulta</button></a>
   <div class="mapa">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14646.567770242542!2d-47.3903991252475!3d-23.401167063394844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf5e965c1cabb9%3A0x51d95a530847f2b5!2sCajuru%20do%20Sul%2C%20Sorocaba%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1629808303163!5m2!1spt-BR!2sbr" width="75%" height="450" style="border:0;" allowfullscreen="" loading="lazy" id="maps"></iframe>
   </div>
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