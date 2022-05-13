<?php 
$v1
$v1
$result

if ($_server["request_method"] == "post"){

$v1 = $_post("valor1");
$v2 = $_post("valor2");
$result = $v1 + $v2;

}

; ?>

<!Doctype>
<html>
  <head>
    <title> Formulario </title>
  </head>
  <body>
  
    <form action="ex10soma.php " method="post">
	
	
    <input type="text" name = "valor1" value=<?php echo $v1; ?>>
		+
	<input type="text" name = "valor2" value=<?php echo $v2; ?>>
	= <?php if ($result != 0) echo  ?>
	
	<br><br>
	<input type="submit" value = "somar">

	</form>
	<br>
  </body>
</html>