<html>
<head>
<title>WebService</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<?php	

	ini_set("default_charset", 'utf-8');

	require 'entidades/local.php';
	require 'bancos/gerencia_bancos.php';
	require 'utils/globals.php';


	$link = getBanco($ID_BANCO);

	
	
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
		$local->nome = encodeToUtf8($row["nome"]);
		
		$local->descricao = encodeToUtf8($row["descricao"]);
		$local->fone = encodeToUtf8($row["fone"] );
		$local->latitude = encodeToUtf8($row["latitude"]);
		$local->longitude = encodeToUtf8($row["longitude"]);
		$local->avaliacao = encodeToUtf8($row["avaliacao"]);		
		
		array_push($localJson, $local);		
		
	}
	

	 function encodeToUtf8($string) {
	     return mb_convert_encoding($string, "UTF-8", mb_detect_encoding($string, "UTF-8, ISO-8859-1, ISO-8859-15", true));
	}

	$obj->local=($localJson);
	

	//Utilização dessa função para decodificar os caracteres especiais - JSON_UNESCAPED_UNICODE
	if($obj){
		echo json_encode($obj, JSON_UNESCAPED_UNICODE);
	}else{
		echo "Erro no objeto";
		die;
	}

	$link->close();

	?>

	</html>