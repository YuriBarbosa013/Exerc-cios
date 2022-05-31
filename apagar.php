<?php

include_once './conexão.php';

filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);

if(empty($id)){
    $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Funcionário não encontrado!</p>";
    header("LOCATION: index.php");
    exit();
}

    $query_usuario = "SELECT id FROM usuarios WHERE id = $id LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->execute();

    if(($result_usuario) AND ($result_usuario->rowCount () != 0)){
        $query_del_usuario = "DELETE FROM usuarios WHERE id = $id";
        $apagar_usuario = $conn->prepare($query_del_usuario);

       if($apagar_usuario->execute()){
        $_SESSION['msg'] = "<p style='color: green;'>Funcionário apagado com sucesso!</p>";
        header("LOCATION: index.php");

       }else{
        $_SESSION['msg'] = "<p style='color: #f00;'>Funcionário não foi apagado!</p>";
        header("LOCATION: index.php");
       }

    }else{
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Funcionário não encontrado!</p>";
    header("LOCATION: index.php");
    
    }