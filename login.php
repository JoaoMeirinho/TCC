<?php
session_start();
if(isset($_SESSION['user'])){
    header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style/stylelogin.css">
</head>
<body>
    <div class="card">
        <form action="script/login.php" method="post">
        <h1>Login</h1>
        <div>
            <input type="text" name="user" placeholder="Usuário" id="nome"required>
            <input type="password" name="pass" placeholder="Senha" id="pass" required>
            <input type="submit" name="submit" id="submit">
            <a href="cadastro.html">Cadastre-se!</a>
        </div>
    </form>
    </div>
</body>
</html>