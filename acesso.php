<?php
ob_start(); // Ativa o buffer de saída
session_start();

$host = "localhost";
$database = "hospedagens";
$user = "root";
$password = "";

// Conectando ao banco de dados
$conn = new mysqli($host, $user, $password, $database);

// Verificando a conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

$email = $_POST['email'];
$password = $_POST['password'];

// Preparando a consulta SQL
$sql = "SELECT * FROM usuarios WHERE email=? and password=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $email, $password);
$stmt->execute();

// Obtendo os resultados
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    // Autenticação bem-sucedida
    $data = mysqli_fetch_assoc($result);

    // Armazenando informações na sessão
    $_SESSION["id"] = $data['id'];
    $_SESSION["name"] = $data['name'];
    $_SESSION["email"] = $data['email'];
    $_SESSION["type"] = $data['type'];
    $_SESSION["cpf"] = $data['cpf'];
    $_SESSION["tel"] = $data['tel'];
    $_SESSION["url_foto"] = $data['url_foto'];

    // Redirecionando para a página de índice
    header('Location: index.php');
    exit;
} else {
    // Autenticação falhou
    echo "Login falhou!";
    header('Location: login.php?error=true');
    exit;
}

$stmt->close();
$conn->close();
