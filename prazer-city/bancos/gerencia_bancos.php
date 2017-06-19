<?php

//Hospedeiro
//https://prazercity.000webhostapp.com/index.html

function getBanco ($idBanco){


	$link="";

	switch ($idBanco) {
		case 1:
			$link = mysqli_connect("localhost", "root", "", "prazer-city");
			break;
		case 2:
			$link = mysqli_connect("localhost", "id1988402_root", "C@gece123", "id1988402_prazer_city");
			break;
		
		default:
			# code...
			break;
	}
	
	return $link;

}






?>