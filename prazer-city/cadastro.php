
<html>

<HEADER>
<style>
table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;
}

td, th {
    border: 1px solid #dddddd;
    text-align: left;
    padding: 8px;
}

tr:nth-child(even) {
    background-color: #dddddd;
}
</style>
<TITLE>Cadastro de Locais</TITLE>
</HEADER>

<BODY>


<h2>Cadastro</h2>
	<form method="POST" >
		<table title="Cadastro de Locais">
		  
		  <tr>
		    <td>Nome</td>
		    <td><input type="text" name="nome" /></td>	   
		  </tr>
		  <tr>
		     <td>
		     Descri&ccedil&atildeo: 
		     </td>
			<td>
				<input type="text" name="descricao" />
	  		</td>

	  		</tr>

		  <tr>
		     <td>
		     Telefone: 
		     </td>
			<td>
				<input type="text" name="fone" />
	  		</td>

	  		</tr>

	  		<tr>
	  			<td>Latitude: </td>
				<td>
				<input type="text" name="lat" />
				</td>
	  		</tr>

	  		<tr>
	  			<td>Longitude: </td>
				<td>
				 <input type="text" name="long" />
				</td>
	  		</tr>

	  		<tr>
	  			<td>Avalia&ccedil&atildeo: </td>
				<td>
				 <input type="text" name="aval" />
				</td>
	  		</tr>  		
		</table>	
		<button type="Submit">Cadastrar</button>
		</form>

<?php

	require 'bancos/gerencia_bancos.php';
	require 'utils/globals.php';


	

	if (!isset($_POST["nome"])){
		exit;
	}

	$link = getBanco($ID_BANCO);
	
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}

	$nome = utf8_decode($_POST["nome"]);
	$descricao = utf8_decode($_POST["descricao"]);
	$latitude = utf8_decode($_POST["lat"]);
	$longitude = utf8_decode($_POST["long"]);
	$fone = utf8_decode($_POST["fone"]);
	$avaliacao = utf8_decode($_POST["aval"]);


	$SQL = "INSERT INTO local (nome, descricao, latitude, longitude, fone, avaliacao) VALUES 
	('".$nome."', '".$descricao."', '".$latitude."',  '".$longitude."', 
	'".$fone."', '".$avaliacao."')";

	


	if ($link->query($SQL) === TRUE) {
	    echo "Cadastro realizado com sucesso.";
	} else {
	    echo "Error: " . $SQL . "<br>" . $link->error;
	}

	$link->close();

	
?>


</BODY>
</html>