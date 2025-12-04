<?php
// Incluir configuração do banco
include 'config/database.php';
// Verificar se o formulário foi submetido
if ($_SERVER["REQUEST_METHOD"] == "POST") {
// Coletar e sanitizar dados do formulário
$nome = $conn->real_escape_string($_POST['nome']);
$email = $conn->real_escape_string($_POST['email']);
$valor = $conn->real_escape_string($_POST['valor']);
$instituicao = $conn->real_escape_string($_POST['instituicao']);
// Validar dados
if (empty($nome) || empty($email) || empty($valor)) {
    header("Location: index.php?error-emptyfields");
    exit();
}
// Inserir no banco de dados
$sql = "INSERT INTO contribuicao (nome, email, valor, instituicao)
VALUES ('$nome', '$email', '$valor', '$instituicao')";
if ($conn->query($sql) === TRUE) {
    header("Location: index.php?success=1") ;
    exit();
} else {
    header("Location: index.php?error=dberror");
    exit();
}
$conn->close();
} else {
    header("Location: index.php");
    exit();
}
?>