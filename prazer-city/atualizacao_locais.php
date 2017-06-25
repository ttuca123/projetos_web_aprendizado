	
<?php

	

	require 'bancos/gerencia_bancos.php';
	require 'utils/globals.php';
	require 'entidades/atualizacao_local.php';



	$link = getBanco($ID_BANCO);
	
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	


	$sqlVerificarAtualizacao = "SELECT * FROM atualizacao_local ORDER BY dt_atualizacao desc LIMIT 1";	

	$verificacao = $link->query($sqlVerificarAtualizacao);		

	$atualizacaoLocal = new AtualizacaoLocal();

	while($row = $verificacao->fetch_assoc()) {
		
		$atualizacaoLocal->seq_atualizacao = utf8_encode($row["seq_atualizacao"]);
		$atualizacaoLocal->codigoHash = utf8_encode($row["codigo_hash"]);	
		$atualizacaoLocal->dtAtualizacao = utf8_encode($row["dt_atualizacao"]);	

		

	}	


	echo  json_encode($atualizacaoLocal);

	
	$link->close();

	
?>

