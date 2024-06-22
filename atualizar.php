<?php
include_once('config.php');

if (isset($_POST['iduser'])) {
    $id = $_POST['iduser'];
    
    $nome = $_POST['nome'];
    $idade = $_POST['idade'];
    $curso = $_POST['curso'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $cidade = $_POST['cidade'];
    $turma = $_POST['turma'];
    
    $sql = "UPDATE user_two SET nome='$nome', idade='$idade',curso='$curso', email='$email',telefone='$telefone', cidade='$cidade',turma='$turma' WHERE iduser=$id";
    
    // Executar a consulta SQL
    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao atualizar o aluno: " . $conn->error;
    }
} else {
    echo "ID do aluno não fornecido";
}

$conn->close();
?>
