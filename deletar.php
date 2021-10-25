<?php
session_start();
include_once("script/conexao.php");
if(!isset($_SESSION['id'])){
    header("location:login.php");
}
else{
    if(empty($_GET['id'])){
        header("location:pedidos.php");
    }
    else{
        $idCliente = $_SESSION['id'];
        $idAgendamento = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
        $queryValidacao = "SELECT * FROM agenda WHERE id_agendamento = '$idAgendamento' AND id_cliente = '$idCliente'";
        $consulta = mysqli_query($conexao, $queryValidacao);
        if(mysqli_num_rows($consulta) == 1){
            // consultando
            $query = "DELETE FROM agenda WHERE id_agendamento = '$idAgendamento' AND id_cliente = '$idCliente'";
            $validandoQuery = mysqli_query($conexao,$query);
            echo"<script language='javascript' type='text/javascript'>
            alert('Pedido deletado com sucesso!');window.location.
            href='pedidos.php'</script>";
        }else{
            echo"<script language='javascript' type='text/javascript'>
            alert('Pedido inexistente!');window.location.
            href='pedidos.php'</script>";
        }
        
        // header("location:pedidos.php");
    }
}


?>