<?php 
funcion somar($p1, $p2) {
	return $p1 + $p2;
}
funcion subtrair($p1, $p2) {
	return $p1 - $p2;
}
funcion dividir($p1, $p2) {
	return $p1 / $p2;
}
funcion multiplicar($p1, $p2) {
	return $p1 * $p2;
}




$v1 = "";
$v1 = "";
$result = 0;

if ($_server["REQUEST_METHOD"] == "POST"){

$v1 = $_post("valor1");
$v2 = $_post("valor2");
$op = $_post("operador1");

		if (op1 === "+") {
		$result = somar ($v1, $v2);
		
}elseif (op1 === "-"){
$result = subtrair ($v1, $v2);

	}elseif (op1 === "/"){
	$result = dividir ($v1, $v2);
	
		}elseif (op1 === "*"){
		$result = multiplicar ($v1, $v2);
		
			



$result

; ?>

<!Doctype>
<html>
  <head>
    <title> Ex14 </title>
  </head>
  <body>
  
    <form action="ex10soma.php " method="post">
	
	
    <input type="text" name = "valor1" value=<?php echo $v1; ?>>
	<select  name = "operador">
		<option>+</option>
		<option>-</option>
		<option>/</option>
		<option>*</option>
		</select>
		
		+
	<input type="text" name = "valor2" value=<?php echo $v2; ?>>
	= <?php if ($result != 0) echo  ?>
	
	<br><br>
	<input type="submit" value = "somar">

	</form>
	<br>
  </body>
</html>