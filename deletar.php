<?php
session_start();
include_once("script/conexao.php");
if(!isset($_SESSION['user'])){
    header("location:login.php");
}
else{
    if(empty($_GET['id'])){
        header("location:pedidos.php");
    }
    else{
        $user = $_SESSION['user'];
        $idCliente = $_SESSION['id'];
        $idAgendamento = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        if ($user == 'admin'){
            $queryValidacao = "SELECT * FROM agenda WHERE id_agendamento = '$idAgendamento'";
        }else{
            $queryValidacao = "SELECT * FROM agenda WHERE id_agendamento = '$idAgendamento' AND id_cliente = '$idCliente'";

        }
        $consulta = mysqli_query($conexao, $queryValidacao);
        $arrayPedido = mysqli_fetch_array($consulta);

        // verificando informações do pedido 
        $queryServico = "SELECT * FROM servicos WHERE id_servico = '$arrayPedido[id_servico]'";
        $consultaServico = mysqli_query($conexao,$queryServico);
        $arrayServico = mysqli_fetch_array($consultaServico);
        if(!mysqli_num_rows($consulta) == 1){
            echo"<script language='javascript' type='text/javascript'>
             alert('Pedido inexistente!');window.location.
             href='pedidos.php'</script>";
        }
    }
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
        <h1>Deletar Serviço, <?php echo $user ?>?</h1>
        <div>
            <p>Pedido: <b><?php echo $arrayServico['nomeServico'] ?></b></p>
            <p>Valor do pedido: <b>R$<?php echo $arrayServico['valor']?></b></p>
            <a href="script/deletar.php?id=<?php echo $idAgendamento ?>" class="link-btn-submit"><button id='submit' class="opt">Sim</button></a>
            <a href="pedidos.php" class="link-btn-submit"><button class="opt">Não</button></a>
        </div>
    </div>
    
</body>
</html>