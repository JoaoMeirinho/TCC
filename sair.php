<?php
session_start();
session_destroy();
echo"<script language='javascript' type='text/javascript'>
        alert('Sessão encerrada!');window.location.
        href='index.php'</script>";
?>