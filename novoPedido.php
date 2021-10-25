<?php
session_start();
include_once('script/conexao.php');
if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    $user = $_SESSION['user'];
    $query = "SELECT * FROM servicos";
    $validandoQuery = mysqli_query($conexao, $query);
    // $arrayQuery = mysqli_fetch_assoc($validandoQuery);

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
        <h1> Faça seu Pedido, <?php echo $user ?></h1>
        <div>
            <!-- <input type="text" name="nome" placeholder="Nome" id="nome" value="<?php echo $nome; ?>" required readonly>
            <input type="text" name="endereco" placeholder="Endereço" id="endereco" value="<?php echo $endereco; ?>" required readonly>
            <input type="number" name="numTel" placeholder="Número Telefone" id="numTel" value="<?php echo $numTel; ?>" required>
            <input type="mail" name="mail" placeholder="Email" id="mail" value="<?php echo $email; ?>" required>
             -->
            <select name="servico" class='opt'>
                <?php
                    while($row = mysqli_fetch_assoc($validandoQuery)){
                        echo "<option value=$row[nomeServico]>$row[nomeServico]</option>";
                    }
                ?>
                
            </select>
            <input type="submit" name="submit" id="submit">
            
        </div>
    </form>
    </div>
</body>
</html>