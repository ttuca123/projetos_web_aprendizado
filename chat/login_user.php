<?php

	include "db.php";

	if (!isset($_POST["email_user"])){
		exit;
	}

	
	$email_user = $_POST["email_user"];
	$senha_user = $_POST["senha_user"];
	
	

	$sql_verifica = 'SELECT id_usuario, nome_usuario, email_usuario, senha_usuario, data_usuario,
	photo_usuario FROM usuarios WHERE email_usuario = "'.$email_user.'" AND senha_usuario= "'.$senha_user.'"';

	$exec_row = $conn->query($sql_verifica);

	if ($exec_row->num_rows > 0){
		$row = $exec_row -> fetch_row();


		$retorno = array("retorno" => $row[0], "nome_usuario"=>$row[1], "email_usuario"=>$row[2],
			"photo_usuario"=>$row[3]);
	} else {
		$retorno = array("retorno" => '0');
	}

	
	echo  json_encode($retorno);

	$stm->close();
	$conn->close();
?>