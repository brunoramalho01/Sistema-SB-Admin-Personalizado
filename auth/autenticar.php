<?php
    session_start();
    require_once('../config/conection_bd.php');

    $usuario = @$_POST['usuario'];
    $senha = @$_POST['senha'];

    $query_con = $conn->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND senha = :senha");
    $query_con->bindValue(":usuario", $usuario);
    $query_con->bindValue(":senha", $senha);
    $query_con->execute();
    $res_con = $query_con->fetchAll(PDO::FETCH_ASSOC);

    if (@count($res_con) > 0) {
        $nivel = $res_con[0]['perfil'];

        $_SESSION['id_usuario'] = $res_con[0]['id'];
        $_SESSION['nome_usuario'] = $res_con[0]['nome'];
        $_SESSION['nick_usuario'] = $res_con[0]['usuario'];
        $_SESSION['perfil_usuario'] = $res_con[0]['perfil'];

        switch ($nivel) {
            case 'Administrador':
                header('Location: ../panel');
                break;
            case 'Ajudante':
                header('Location: ../panel');
                break;
            case 'Classificacao':
                header('Location: ../panel');
                break;
            default:
            //echo "<script language='javascript'>window.location='../index.php'</script>";
                echo "<script language='javascript'>window.alert('Perfil desconhecido!')</script>";
                header('Location: ../panel/index.php');
                break;
        }
    } else {
        //echo "<script language='javascript'>window.location='../index.php'</script>";
        header('Location: ../index.php');
        echo "<script language='javascript'>window.alert('Dados Incorretos!')</script>";
    }
?>