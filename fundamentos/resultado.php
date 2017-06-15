<?php

	$numero1 = $_POST["n1"];
	$numero2 = $_POST["n2"];

	$resultado = $numero1 + $numero2;
	$subtracao = $numero1 - $numero2;
	$divisao = $numero1 / $numero2;
	$multiplicacao = $numero1 * $numero2;

	echo "Soma: ".$resultado."<br><br>";
	echo "Subtração: ".$subtracao."<br><br>";
	echo "Divisão: ".$divisao."<br><br>";
	echo "Multiplicacao".$multiplicacao."<br><br>";


?>