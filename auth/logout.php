<?php
session_start();

// Destrua a sessão
session_destroy();

// Redirecione para a página de login ou outra página de sua escolha
header("Location: ../index.php");
exit();
?>
