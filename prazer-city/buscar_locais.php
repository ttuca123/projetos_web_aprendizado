
<?php	

	require '/entidades/local.php';

	$link = mysqli_connect("localhost", "root", "", "prazer-city");
	
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}


	$SQL = "SELECT seq_local, nome, descricao, fone, latitude, longitude, avaliacao FROM local order by avaliacao desc, nome asc";	
	
	$resultado = $link->query($SQL);	
	
	
	
	$localJson = array();
	

	$obj = new stdClass();

	if(!$resultado){
		echo "Erro no resultado";
		die;
	}

	while($row = $resultado->fetch_assoc()) {

		$local = new Local();

		$local->seq_local = utf8_encode($row["seq_local"]);
		$local->nome = utf8_encode($row["nome"]);
		
		$local->descricao = utf8_encode($row["descricao"]);
		$local->fone = utf8_encode($row["fone"]);
		$local->latitude = utf8_encode($row["latitude"]);
		$local->longitude = utf8_encode($row["longitude"]);
		$local->avaliacao = utf8_encode($row["avaliacao"]);
		
		
		array_push($localJson, $local);		
		
	}
	
	$obj->local=$localJson;
	

	
	if($obj){
		print_r (json_encode($obj));
	}else{
		echo "Erro no objeto";
		die;
	}

	$link->close();

	?>