<?php
session_start();
if (isset($_SESSION['user'])){
echo "Bem-vindo(a),".$_SESSION['user'];
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
</body>
</html>