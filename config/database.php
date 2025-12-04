<?php
// Configurações do banco de dados
$host = "localhost";
$username = "root";
// Substitua pelo usuário do seu servidor
$password = "";
// Substitua pela senha do seu servidor
$database = "meubanco";
// Substitua pelo nome do seu banco
// Criar conexão
$conn = new mysqli($host, $username, $password, $database);
// Verificar conexão
if ($conn->connect_error) {
die("Conexão falhou: " . $conn->connect_error);
}
//// Criar tabela se não existir
$sql = "CREATE TABLE IF NOT EXISTS contribuicao (
id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(100) NOT NULL,
email VARCHAR(100) NOT NULL,
valor DECIMAL NOT NULL,
instituicao VARCHAR(150),
data_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";
if (!$conn->query($sql)) {
echo "Erro ao criar tabela: " . $conn->error;
}
?>