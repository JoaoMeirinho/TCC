<?php
$nome= $_POST["nome"];
$email = $_POST["mail"];
$assunto = $_POST["assunto"];
$msg = $_POST["mailText"];
$destino = "jao46roberto@gmail.com";
// corpo do email

$arquivo = "
  <style type='text/css'>
  body {
  margin:0px;
  font-family:Verdane;
  font-size:12px;
  color: #666666;
  }
  a{
  color: #666666;
  text-decoration: none;
  }
  a:hover {
  color: #FF0000;
  text-decoration: none;
  }
  </style>
    <html>
        <table width='510' border='1' cellpadding='1' cellspacing='1' bgcolor='#CCCCCC'>
            <tr>
              <td>
  <tr>
                 <td width='500'>Nome:$nome</td>
                </tr>
                <tr>
                  <td width='320'>Mensagem:$msg</td>
                </tr>
            </td>
          </tr>
        </table>
    </html>
  ";

  $headers  = 'MIME-Version: 1.0' . "\r\n";
  $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
  $headers .= 'From: $nome <$email>';
  $enviaremail = mail($destino, $assunto, $arquivo, $headers);



?>