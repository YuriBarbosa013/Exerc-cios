<?php
session_start();
ob_start();

    include_once './conexão.php';

    $id = filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
   
   
    if(empty($id)){
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
        header("Location: index.php");
        exit();
    }

    $query_usuario = "SELECT id, nome, matricula, função FROM usuarios WHERE id = $id LIMIT 1";
    $result_usuario = $conn->prepare($query_usuario);
    $result_usuario->execute();

    if(($result_usuario) AND ($result_usuario->rowCount() != 0)){
        $row_usuario = $result_usuario->fetch (PDO::FETCH_ASSOC);

    }else{
        $_SESSION['msg'] = "<p style='color: #f00;'>Erro: Usuário não encontrado!</p>";
        header("Location: index.php");
        exit();
    }

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Editar </title>

    
    </head> 
    <body>
    <br><a href="index.php">Listar</a><br>
        <a href="cadastrar.php">Cadastrar</a><br><br>

            <h1 style="margin: auto; width: 220px;">Editar</h1>

        <?php

        $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);

        if(!empty($dados['EditUsuario'])){
            $empty_input = false;
            $dados = array_map('trim', $dados);
            if(in_array("", $dados)){
                $empty_input = true;
                echo "<p style='color: #f00;'> Erro: Preencher todos os campos!!</p>";
            }
            if(!$empty_input){
                echo"Editar <br>";
            }
        }

        ?>

            <form id="edit-usuario" method="POST" action="">
                <label>Nome</label>
                <input type="text" name="name" id="nome" placeholder="Nome completo" value="<?php
                if(isset($dados['nome'])){
                    echo $dados['nome'];
                }elseif(isset ($row_usuario['nome'])){ echo $row_usuario['nome']; } ?>"><br><br>

                <label>Matricula</label>
                <input type="text" name="matricula" id="matricula" placeholder="matricula" value="<?php
                if(isset($dados['matricula'])){
                        echo $dados['matricula'];
                }elseif(isset ($row_usuario['matricula'])){ echo $row_usuario['matricula']; } ?>"><br><br>

                <label>Função</label>
                <input type="text" name="função" id="função" placeholder="função" value="<?php
                if(isset($dados['função'])){
                    echo $dados['função'];
                }elseif(isset ($row_usuario['função'])){ echo $row_usuario['função']; } ?>"><br><br>

                <input type="submit" value="Salvar" name="EditUsuario">
            </form>
    </body>
</html>