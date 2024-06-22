\\<?php

include_once('config.php');

if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

$nome = $_POST['nome'];
$idade = $_POST['idade'];
$curso = $_POST['curso'];
$email = $_POST['email'];
$telefone = $_POST['telefone'];
$cidade = $_POST['cidade'];
$turma = $_POST['turma'];
$sql = "INSERT INTO user_two (nome,idade,curso,email,telefone,cidade,turma) VALUES ('$nome', '$idade','$curso', '$email','$telefone', '$cidade','$turma')";

if ($conn->query($sql) === TRUE) {
    header("Location: index.php");
    exit(); 
} else {
    echo "Erro ao cadastrar o aluno: " . $conn->error;
}

$conn->close();
?>

