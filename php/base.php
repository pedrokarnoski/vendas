<?php

include('../php/setup.php');

// Executa uma consulta e retorna o resultado, se houver
function executar_SQL($SQL){
	// Realiza a consulta
	$conexao = mysqli_connect("localhost", "pedro", "1234", "vendas");
	
	$resultado = mysqli_query($conexao, $SQL);	
	
	if(!$resultado)
		die('N�o foi poss�vel realizar a consulta: ' . mysqli_error());
	
	// Retorna o resultado da consulta
	return $resultado;
}

// Coloca uma tupla de uma consulta em um array associativo
function retorna_linha($consulta){
	return mysqli_fetch_assoc($consulta);
}

// Fecha conex�o com MySQL
function desconectar($conexao){
	mysqli_close($conexao);
}

// Verifica se a consulta gerou algum resultado
function verifica_resultado($resultado){
	return (mysqli_num_rows($resultado) != 0);
}

// Libera a mem�ria do resultado de uma query
function libera_consulta($consulta){
	mysqli_free_result($consulta);
}


?>
