<?php
function validaMatric(){
	
}
if ($_server["request_method"] == "post") 
{
	$matricula = $_post["matricula"];
	$nome = $_post["aluno"];
	$email = $_post["email"];
	$arquivoAluno = fopen("Alunos.txt", "r") or die ("Aquivo com problemas");
	echo fgets ($arquivoAluno);
	fclose ($arquivoAluno);
	$cabecalho = "matricula;nome;email \n" ;
	$arquivoAlunow = fopen("Alunos.txt", "w") or die ("Aquivo com problemas");
	fwrite($arquivoAlunow,$cabecalho);
	$linha = $matricula . ";" . $nome. ";" . $email;
	fwrite($arquivoAlunow,$linha);
	fclose ($arquivoAlunow);
	
	
}
?>
<html>
  <head>
    <title>Incluir Aluno</title>
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    
  </head>
<body>
  <div id="area">
    <form id="formulario" autocomplete="off">
      <fieldset>
        <legend>Formulário</legend>
        <label>Matricula:</label><input class="campo_matricula" type="text"><br>
		<label>aluno:</label><input class="campo_aluno" type="text"><br>
        <label>Email:</label><input class="campo_email" type="password"><br>
        <br>
        <input class="btn_submit" type="submit" value="Incluir">
      </fieldset>
    </form>
  </div>
</body>
</html>