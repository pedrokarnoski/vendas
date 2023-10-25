<?php
// Configurações do banco de dados
$servername = "localhost";
$username = "pedro";
$password = "1234";

// Conecte-se ao servidor de banco de dados
$conexao = mysqli_connect($servername, $username, $password);

if (!$conexao) {
    die("Erro na conexão: " . mysqli_connect_error());
}

// Leia o arquivo SQL de criação de banco de dados e tabelas
$sql = file_get_contents('../createtables.sql');

// Feche a conexão com o servidor de banco de dados
mysqli_close($conexao);
?>
