<?php

$usuario = 'root';
$senha = '';
$database = 'login';
$host = 'localhost';

// Faz a conexão de fato
$mysqli = new mysqli($host, $usuario, $senha, $database);

// Verifica se houve algum erro na conexão
if ($mysqli->error) {
    die("Falha ao conectar com o banco de dados: " . $mysqli->error); // Mata a execução
}