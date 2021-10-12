
<?php
session_start();
if (isset($_SESSION['user'])){
echo "Bem-vindo(a),".$_SESSION['user'];
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
           <li><a>Serviços</a></li>
           <li><a href='sobre.php'>Sobre</a></li>
        </ul>
        <div id="divLogo"><img src="img/logoRETIS.png" alt="" id="logo"></div>
        <button class="login"><a href="login.php">Login</a></button>
   </nav>
   <!-- <div class="image">
      <h1>Massagens Terapêuticas</h1>
      <p>Para viver melhor a vida!</p>
   </div> -->
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
   <button class="btn-agendar">Agendar Consulta</button>
   <div class="mapa">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d14646.567770242542!2d-47.3903991252475!3d-23.401167063394844!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94cf5e965c1cabb9%3A0x51d95a530847f2b5!2sCajuru%20do%20Sul%2C%20Sorocaba%20-%20SP!5e0!3m2!1spt-BR!2sbr!4v1629808303163!5m2!1spt-BR!2sbr" width="75%" height="450" style="border:0;" allowfullscreen="" loading="lazy" id="maps"></iframe>
   </div>
   <footer>
         <div class="pt1">
            <h2>Reflexoterapias e Terapias Integrativas Sorocaba</h3>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Totam in quo voluptatibus, aperiam similique eaque blanditiis labore libero sequi nobis maxime neque tempora consectetur sed laboriosam a, saepe nesciunt ab.</p>
         </div>
         <div class="pt2">
            <h2>Acesso Rápido</h2>
            <ul>
               <li>Home</li>
               <li>Serviços</li>
               <li>Sobre</li>
            </ul>
         </div>
         <div class="pt3">
            <form action="script/enviarEmail.php" method="POST">
               <h2>Contate-nos</h2>
               <input type="text" name="nome" id="nome" placeholder="Seu Nome">
               <input type="text" name="mail" id="mail" placeholder="Seu Email">
               <input type="text" name="assunto" id="assunto" placeholder="Assunto">
               <textarea name="mailText" id="mailText" placeholder="Mensagem"></textarea>
               <input type="submit" value="Enviar">
            </form>
         </div>
   </footer>
</body>
</html>