<?php
include_once("conexao.php");

$email = $_POST['email'];
$senha = $_POST['senha'];

// Prepara consulta apenas pelo email
$stmt = $conexao->prepare("SELECT * FROM usuarios WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    // Verifica a senha usando password_verify
    if (password_verify($senha, $user['senha'])) {
        // Login bem-sucedido
        header("Location: http://localhost/Aqualimpa-Remasterizado-main/PI.OFC/index.html");
        exit();
    } else {
        // Senha incorreta
        header("Location: erro_login.php");
        exit();
    }
} else {
    // Email não encontrado
    header("Location: erro_login.php");
    exit();
}

$stmt->close();
$conexao->close();
?>
 