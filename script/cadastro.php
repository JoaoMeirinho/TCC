<?php 
include_once('conexao.php');
// pegando dados do form cadastro
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_SPECIAL_CHARS);
$mail = filter_input(INPUT_POST, 'mail', FILTER_SANITIZE_EMAIL);
$numTel = filter_input(INPUT_POST, 'numTel', FILTER_SANITIZE_NUMBER_INT);
$endereco = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
$user = filter_input(INPUT_POST, 'user', FILTER_SANITIZE_SPECIAL_CHARS);
$pass = md5($_POST["pass"]);

// fazendo a consulta no banco de dados
$sqluser = "SELECT * from cliente where usuario = '$user'";
$queryuser = mysqli_query($conexao, $sqluser);

//verificando se os dados ja existem
if(mysqli_num_rows($queryuser) >= 1){
    echo "<script language='javascript' type='text/javascript'>
    alert('Usuário já existente!');window.location.
    href='login.html'</script>";
}
else{
    $queryinsert = "INSERT INTO cliente (nome,usuario,senha,endereco,numTel,email) VALUES ('$nome','$user','$pass','$endereco','$numTel','$mail')";
    $insert = mysqli_query($conexao,$queryinsert);
    if($insert){
        echo"<script language='javascript' type='text/javascript'>
        alert('Usuário cadastrado com sucesso!');window.location.
        href='../login.php'</script>";
      }
      else{
        echo"<script language='javascript' type='text/javascript'>
        alert('Não foi possível cadastrar esse usuário')</script>";

        // echo mysqli_error($conexao);
    }
}




?>