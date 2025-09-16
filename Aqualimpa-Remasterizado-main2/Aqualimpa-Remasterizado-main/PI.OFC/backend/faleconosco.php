<?php
include_once("conexao.php");

// Pega os dados do formulário
$nome = $_POST['nome']; // Corrigido de nome_completo para nome
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$mensagem = $_POST['mensagem'];

// Corrige o nome da coluna na query
$sql = "INSERT INTO mensagens (nome, email, telefone, mensagem)
        VALUES ('$nome', '$email', '$telefone', '$mensagem')";

// Executa a query
if (mysqli_query($conexao, $sql)) {
    // Redireciona após sucesso
    header("Location: http://localhost/Aqualimpa-Remasterizado-main2/Aqualimpa-Remasterizado-main/PI.OFC/");
    exit();
} else {  
    // Exibe erro em caso de falha
    echo "Erro ao cadastrar: " . mysqli_error($conexao);
}

// Fecha a conexão
mysqli_close($conexao);
?>
