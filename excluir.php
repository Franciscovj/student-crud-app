<?php

include_once('config.php');

if (isset($_GET['iduser'])) {
    
    $id = $_GET['iduser'];

    $sql = "DELETE FROM user_two WHERE iduser = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: index.php");
        exit();
    } else {
        echo "Erro ao excluir o aluno: " . $conn->error;
    }
} else {
    echo "ID do aluno não fornecido";
}


$conn->close();
?>
