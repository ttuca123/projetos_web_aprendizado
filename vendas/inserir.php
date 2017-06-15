<?php
	mysql_connect("localhost", "root", "");
	mysql_select_db("vendas");

	$SQL = "INSERT INTO vendas (produto, preco, latitude, longitude) VALUES 
	('".$_GET["produto"]."', '".$_GET["preco"]."',  '".$_GET["latitude"]."', 
	'".$_GET["longitude"]."')";

	echo $SQL;

	mysql_query($SQL);

	if(mysql_affected_rows()>0){

		echo "Y";
	}else{
		echo "N";
	}
?>