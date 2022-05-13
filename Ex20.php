<?php
function validaMatric(){
	
}
$matricula = "";
$nome = "";
$email = "";

if ($_server["request_method"] == "post") 
{
	$matricula = $_post["matricula"];
	if ((file_exists("Alunos.txt")){
		$cabecalho = "matricula;nome;email \n" ;
		$arquivoAlunow = fopen("Alunos.txt", "w")
		fwrite($arquivoAlunow,$cabecalho);
		fclose ($arquivoAlunow);
	}
	$x = 0;
	$arquivoAlunoIn = fopen("Alunos novos.txt", "r") or die ("Erro");
	while(!feof($$arquivoAlunoIn)){
		$linha[] = fgets ($arquivoAlunoIn);
		$colunaDados = explode(";", $linha);
		if $colunaDados[0] = $matricula{
			$nome = $colunaDados[1];
			$nome = $colunaDados[2];
		}
	}
	$arquivoAlunow = fopen("Alunos.txt", "w") or die ("Aquivo com problemas");
	$linha = $matricula . ";" . $nome. ";" . $email;
	fwrite($arquivoAlunow,$linha);
	fclose ($arquivoAluno);
	
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
        <label>Matricula:</label><input class="campo_matricula" type="text" value = <?php echo $matricula ?>><br>
		<label>aluno:</label><input class="campo_aluno" type="text"><br>
        <label>Email:</label><input class="campo_email" type="password"><br>
        <br>
        <input class="btn_submit" type="submit" value="Incluir">
      </fieldset>
    </form>
  </div>
</body>
</html>