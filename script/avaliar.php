<?php 
session_start();
include_once("conexao.php");
if(!isset($_SESSION['user'])){
    header("location:../login.php");
}
else{
    if($_SESSION['user'] != 'admin'){
        header("location: ../login.php");
    }else{
            $situacao = $_POST['situacao'];
            $idAgendamento = $_POST['idAgendamento'];
            $dataAgendamento = date('Y-m-d', strtotime($_POST['data']));            
            $querySelect = "SELECT * FROM agenda WHERE id_agendamento = '$idAgendamento'";
            $validandoQuerySelect = mysqli_query($conexao,$querySelect);
            if (mysqli_num_rows($validandoQuerySelect) < 1){
                echo"<script language='javascript' type='text/javascript'>
            alert('Pedido inexistente!');window.location.
           href='../pedidos.php'</script>";
            }else{
                
                $query = "UPDATE agenda SET situacao = '$situacao', data = '$dataAgendamento' WHERE id_agendamento = '$idAgendamento'";
                $validandoQuery = mysqli_query($conexao, $query);
                if(!$validandoQuery){
                    echo"<script language='javascript' type='text/javascript'>
                    alert('Pedido não avaliado!');window.location.
                   href='../pedidos.php'</script>";
                }else{
                echo"<script language='javascript' type='text/javascript'>
                alert('Pedido avaliado com sucesso!');window.location.
               href='../pedidos.php'</script>";
                }
            }
    }
}
?>