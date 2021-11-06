<?php
session_start();
include_once('script/conexao.php');
if(isset($_SESSION['id'])){
    if(isset($_POST['servico'])){
        $id = $_SESSION['id'];
        $user = $_SESSION['user'];
        $servico = $_POST['servico'];
        $query = "SELECT * FROM servicos WHERE id_Servico = '$servico'";
        $validandoQuery = mysqli_query($conexao, $query);
        $array = mysqli_fetch_assoc($validandoQuery);
    }
    else{
        header('location:novoPedido.php');
    }
}else{
    header('location:login.php');
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style/stylelogin.css">
    <title>Document</title>
</head>
<body>
<div class="card">
        <form action="script/fazerpedido.php" method="post">
        <h1> Confirme seu Pedido, <?php echo $user ?></h1>
        <div>
            <input type="hidden" name="servico" value=<?php echo $servico; ?> readonly>
            <p>Pedido: <b><?php echo $array['nomeServico'] ?></b></p>
            <p>Valor: R$ <b><?php echo $array['valor'] ?></b></p>
            <input type="submit" name="submit" id="submit">
        </div>
    </form>
    </div>
</body>
</html>
