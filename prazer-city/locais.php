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


<?php	

	$link = mysqli_connect("localhost", "root", "", "prazer-city");
	
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}




	$SQL = "SELECT seq_local, nome, fone, latitude, longitude, avaliacao FROM local";	
	$resultado = $link->query($SQL);
	
	
	$resultadoFinal="";

?>

<center><h2>Cadastro de Locais</h2></center>
	<form method="POST" >
		

		<table title="Cadastro de Locais">

		<th>Sequencial</th>
		<th>Nome</th>
		<th>Telefone</th>
		<th>Latitude</th>
		<th>Longitude</th>
		<th>Avaliacao</th>
	<?php
		  while($row = $resultado->fetch_assoc()) {
		$retorno = array($row["seq_local"], $row["nome"], $row["fone"],
			$row["latitude"], $row["longitude"], $row["avaliacao"]);
		?>
		
				

		  <tr>		    
		    <td><?php echo $row["seq_local"] ?></td>	   	 
		    
			<td>
				<?php echo $row["nome"] ?>
	  		</td>
	  			  			
				<td>
					<?php echo $row["fone"] ?>
				</td>
	  		  			
				<td>
				<?php echo $row["latitude"] ?>
				</td>
	  		  			
				<td>
				 <?php echo $row["longitude"] ?>
				</td>
	  		  			
				<td>
				 <?php echo $row["avaliacao"] ?>
				</td>
	  		</tr>  			
			

	<?php
			
		} ?>
		</table>
	<?php

		
		
	$link->close();

	
?>

