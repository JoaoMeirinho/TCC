
<?php
session_start();
if (isset($_SESSION['user'])){
echo "<p>Bem-vindo(a),".$_SESSION['user']."</p>";
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
   <!-- <div class="image">
      <h1>Massagens Terapêuticas</h1>
      <p>Para viver melhor a vida!</p>
   </div> -->
   <h1>O que é a Reflexoterapia?</h1>
   <p>Uma prática de terapêutica alternativa que consiste na aplicação 
      de pressão nos pés e nas mãos, de forma a produzir em 
      efeito noutra parte do corpo. A pressão é aplicada 
      com o polegar, dedos e mãos segundo técnicas específicas 
      e sem a utilização de óleos ou loções.
   </p>
   <h1>Benefícios da Reflexoterapia </h1>
   <p>
   Além da redução do estresse, a reflexologia 
   possui vários outros benefícios, 
   dentre os quais podemos destacar:
   <ul class="text-list">
      <li>Alívio de dores;</li>
      <li>Agindo sobre o sistema nervoso, elimina acúmulos de sangue nos plexos
         nervosos dos pés;</li>
      <li>Estímulo do sistema imunológico;</li>
      <li>Livra o corpo de toxinas;</li>
      <li>Ajuda na recuperação pós-cirúrgica;</li>
      <li>Melhora da saúde e bem estar geral, como influência na atividade intestinal, 
         qualidade do sono e muito mais!</li>
   </ul>
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