<?php
session_start();
include_once('script/conexao.php');
if(isset($_SESSION['user'])){
    if($_SESSION['user'] == 'admin'){
    $user = $_SESSION['user'];
    $idAgendamento = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
    $query = "SELECT * FROM agenda WHERE id_agendamento='$idAgendamento'";
    $validandoQuery = mysqli_query($conexao, $query);
    $arrayAgendamento = mysqli_fetch_assoc($validandoQuery);

    // dados cliente 
    $queryCliente = "SELECT * FROM cliente WHERE id_cliente = '$arrayAgendamento[id_cliente]'";
    $validandoQueryCliente = mysqli_query($conexao, $queryCliente);
    $arrayCliente = mysqli_fetch_assoc($validandoQueryCliente);

    //dados serviço
    $queryServico = "SELECT * FROM servicos WHERE id_servico = '$arrayAgendamento[id_servico]'";
    $validandoQueryServico = mysqli_query($conexao, $queryServico);
    $arrayServico = mysqli_fetch_assoc($validandoQueryServico);
    }else{
        header('location:login.php');
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
        <h1> Avaliação de pedido</h1>
        <form action="script/avaliar.php" method="post">
        <div>
                <input type="hidden" name='idAgendamento' value="<?php echo $idAgendamento?>">
                <p>Nome do Cliente: <b> <?php echo $arrayCliente['nome']?> </b> </p>
                <p>Servico: <b> <?php echo $arrayServico['nomeServico']?> </b></p>
                <select name="situacao" class='opt'>
                    <option value="PENDENTE">PENDENTE</option>
                    <option value="ACEITO">ACEITO</option>
                    <option value="RECUSADO">RECUSADO</option>
                    <option value="REALIZADO">REALIZADO</option>
                </select>
                <p>Agendar para:</p>
                <input type="date" name="data" id="data">
                <input type="submit" name="submit" value="Enviar" id='submit'>
        </div>
    </form>
    </div>
</body>
</html>