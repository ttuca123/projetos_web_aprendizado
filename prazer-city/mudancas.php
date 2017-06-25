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
<TITLE>Lista de Mudanças</TITLE>
</HEADER>

<BODY>


<?php	

    require 'bancos/gerencia_bancos.php';
	require 'utils/globals.php';


	$link = getBanco($ID_BANCO);	
	
	if (!$link) {
	    echo "Error: Unable to connect to MySQL." . PHP_EOL;
	    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
	    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
	    exit;
	}


	$SQL = "SELECT * FROM atualizacao_local ORDER BY dt_atualizacao desc";	
	
	$resultado = $link->query($SQL);	
	
	$resultadoFinal="";

	

?>

<center><h2>Lista de Mudan&ccedilas</h2></center>
	<form method="POST" >
		

		<table>

		<th>Codigo Hash</th>
		<th>Data Atualiza&ccedil&atildeo</th>
		
	<?php
		  while($row = $resultado->fetch_assoc()) {
			
		?>
		
				

		  <tr>		    
		    <td><?php echo $row["codigo_hash"] ?></td>	   	 
		    
			<td>
				<?php echo $row["dt_atualizacao"] ?>
	  		</td>  		

	  		</tr>  			
			

	<?php
			
		} ?>
		</table>
	<?php		
		
	$link->close();

	
?>

