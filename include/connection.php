<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "TellaJogos";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}