<?php
    include_once './conexão.php';
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title> Cadastrar </title>
    </head> 
    <body>
            <a href="index.php">Listar</a><br>
            <a href="cadastrar.php">Cadastrar</a><br>
            <h1 style="margin: auto; width: 220px;">Cadastrar Funcionários</h1>

           <?php
            //Receber os dados do formulário
            $dados = filter_input_array(INPUT_POST, FILTER_DEFAULT); 

           if(!empty($dados['cadUsuario'])){
                $empty_input = false;

               $dados = array_map('trim', $dados); 
                if(in_array("", $dados)){
                    $empty_input = true;
                    echo "<center> <p style='color: red;'>Erro: Preencher todos os campos!!</p><center>";
                }
                
                if(!$empty_input){
                    $query_usuario = "INSERT INTO usuarios (nome, matricula) VALUES ('" . $dados['nome'] . "', '" . $dados['matricula'] . "')";
                    $cad_usuario = $conn->prepare($query_usuario);
                    $cad_usuario->execute();
                    
                   if($cad_usuario->rowCount() ){
                        echo "<center><p> Usuário cadastrado com sucesso!! </p></center><br>";
                    }else{
                        echo "Erro ao Cadastrar!<br>";
                    }
                }
            }
            ?>
            <form style="margin: auto; width: 220px;" name="cadUsuario" method="POST" action="">
                <label>Nome:</label><br>
                <input type="text" name="nome" id="nome" placeholder="Nome completo" ><br><br>
                <label>Matrícula:</label>
                <input type="number" name="matricula" id="matricula" placeholder="Matrícula" ><br><br>
                <label>Função:</label>
                <input type="text" name="funcao" id="função" placeholder="Função" ><br><br>
                <input type="submit" value="Cadastrar" name="cadUsuario">

            </form>
        
    </body>
</html>