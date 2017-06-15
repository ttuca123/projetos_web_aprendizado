<?php

	$nome = ucwords(trim($_POST["nome"]));

	if($nome == ""){

		echo "Preencha o campo nome";
		exit;
	}

	$arquivo_nome="clientes.txt";

	$arquivo = fopen($arquivo_nome, "a");

	fwrite($arquivo, $nome."\r\n");

	fclose($arquivo);

?>