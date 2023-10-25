<?php
// Inicia a se��o
session_start();

// Importa p�gina base para opera��es com o banco de dados
//require "/php/base.php";
include ('../php/base.php');

// Atribui os valores digitados no formul�rio aos campos correspondentes
$email = isset($_POST["tf_email"]) ? addslashes(trim($_POST["tf_email"])) : false;
$senha = (strlen($_POST["tf_senha"]) > 0) ? md5(trim($_POST["tf_senha"])) : false;

// Procura pelo usu�rio no banco de dados
$usuario = executar_SQL("SELECT idusuario, nomeusuario, email FROM Usuario WHERE email = '$email' AND Senha = '$senha'");

// Verifica se o usu�rio existe
if(verifica_resultado($usuario)){
	// Joga o resultado em um array associativo
	$us = retorna_linha($usuario);
	
	// Libera o resultado da consulta
	libera_consulta($usuario);
	
	// Atribui o nome e a id de usu�rio � vari�veis de sess�o
	$_SESSION["sidusuario"] = $us["idusuario"];
	$_SESSION["snomeusuario"] = $us["email"];
	$_SESSION["snome"] = $us["nomeusuario"];
}
// Se n�o recarrega a p�gina com erro de usu�rio ou senha incorretos.
else{
	header("Location: ../index.html?erro=0");

	exit;
}

// Redireciona para a p�gina de confirma��o de Login (Dashboard)
echo "<META HTTP-EQUIV=REFRESH CONTENT='0;URL=../html/dashboard.html'>
            <script type=\"text/javascript\">
                alert(\"Login Efetuado com Sucesso!\");
            </script>"; 

?>