<?php
    include_once './conexão.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title> Listar </title>
    </head> 
    <body>
            <a href="index.php">Listar Funcionários</a><br>
            <a href="cadastrar.php">Cadastrar</a><br>
            <h1 style="margin: auto; width: 220px;">Listar</h1>

            <?php
            //Receber o numero da página
            $pagina_atual = filter_input(INPUT_GET, "page", FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //Setar a quantidade de registros por página
            $limite_resultado = 10;

            //Calcular o inicio da visualização
            $inicio = ($limite_resultado * $pagina) - $limite_resultado;

           $query_usuarios = "SELECT id, nome, matricula, função  FROM usuarios LIMIT $inicio, $limite_resultado";
           $result_usuarios = $conn->prepare($query_usuarios);
           $result_usuarios->execute();

           if( ($result_usuarios) AND ($result_usuarios->rowCount () !=0) ){
               while($row_usuario = $result_usuarios->fetch(PDO::FETCH_ASSOC)){
                   //var_dump($row_usuario);
                   extract($row_usuario);
                   echo "ID: $id <br>";
                   echo "Nome: $nome <br>";
                   echo "matricula: $matricula <br>";
                   echo "função: $função <br><br>";

                    echo "<a href='visualizar.php?id=$id'> Visualizar </a><br>";
                    echo "<a href='editar.php?id=$id'> Editar </a><br>";
                    echo "<a href='apagar.php?id=$id'> Apagar </a><br>";
                    echo "<hr>";
               }
              
           }else{
               echo "<p style='color: red;'>Erro: Preencher todos os campos!!</p>";
           }
            ?>
          
    </body>
    </head>
</html>