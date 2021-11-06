<?php
session_start();
include_once('conexao.php');
if(!isset($_SESSION['user'])){
    header("location:../login.php");
}
else{
    if(empty($_GET['id'])){
        header("location:../pedidos.php");
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

        // // verificando informações do pedido 
        // $queryServico = "SELECT * FROM servicos WHERE id_servico = '$arrayPedido[id_servico]'";
        // $consultaServico = mysqli_query($conexao,$queryServico);
        // $arrayServico = mysqli_fetch_array($consultaServico);
         if(mysqli_num_rows($consulta) == 1){
        // consultando
            if ($user = 'admin'){
                $query = "DELETE FROM agenda WHERE id_agendamento = '$idAgendamento'";
            }else{
                $query = "DELETE FROM agenda WHERE id_agendamento = '$idAgendamento' AND id_cliente = '$idCliente'";

            }
            $validandoQuery = mysqli_query($conexao,$query);
            echo"<script language='javascript' type='text/javascript'>
            alert('Pedido deletado com sucesso!');window.location.
           href='../pedidos.php'</script>";
        }else{
           echo"<script language='javascript' type='text/javascript'>
             alert('Pedido inexistente!');window.location.
             href='../pedidos.php'</script>";
         } 
    }
}
?>