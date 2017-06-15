	
<?php

	if (!isset($_POST["seqLocal"])){
		exit;
	}

	$link = mysqli_connect("localhost", "root", "", "prazer-city");
	
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	$seqLocal = $_POST["seqLocal"];	
	$avaliacao = $_POST["aval"];


	$SQL = "UPDATE local set  avaliacao = ".$avaliacao." WHERE seq_local='".$seqLocal."'";	


	if ($link->query($SQL) === TRUE) {
	    $retorno = array("retorno" => 'YES');
	} else {
	   $retorno = array("retorno" => 'NO');
	}


	echo  json_encode($retorno);
	$link->close();

	
?>

