<?php 

// Verifica se o usuário está logado e tem um perfil válido
if (isset($_SESSION['perfil_usuario'])) {
    $perfil = $_SESSION['perfil_usuario'];

    // Verifique o perfil do usuário e conceda permissão de acordo com o perfil
    if ($perfil == 'Administrador') {
        // Permissão para Administrador
        
    } elseif ($perfil == 'Ajudante') {
        // Permissão para Usuário Ajudante
        
        // para atribuir mais permisões, deve criar um novo "elseif"... 
    } else {
        // Se o perfil não for reconhecido, redirecione para a página de índice
        header('Location: ../index.php');
        exit;
    }
} else {
    // Se o usuário não estiver logado, redirecione para a página de login
    header('Location: ../login.php');
    exit;
}