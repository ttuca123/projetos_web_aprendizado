	
<?php

	if (!isset($_POST["seqLocal"])){
		exit;
	}

	require 'bancos/gerencia_bancos.php';
	require 'utils/globals.php';


	$link = getBanco($ID_BANCO);
	
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	$seqLocal = $_POST["seqLocal"];	
	$avaliacao = $_POST["aval"];


	$sqlBuscarMedia = "SELECT avaliacao from local WHERE seq_local='".$seqLocal."'";	

	$media = $link->query($sqlBuscarMedia);

	$media = ($media+$seqLocal)/2;


	$SQL = "UPDATE local set  avaliacao = ".$media." WHERE seq_local='".$seqLocal."'";	


	if ($link->query($SQL) === TRUE) {
	

	    $retorno = array("retorno" => 'YES');
	} else {
	   $retorno = array("retorno" => 'NO');
	}


	echo  json_encode($retorno);
	$link->close();

	
?>

