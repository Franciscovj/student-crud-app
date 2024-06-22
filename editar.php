<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Aluno</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="#">
                <img src="image/estudante.png" alt="Seu Logo" style="max-height: 40px;">
                App Control Student
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <div class="container mt-4">
        <h2>Editar Aluno</h2>
        <?php
        // Incluir o arquivo de configuração
        include_once('config.php');

        // Verificar se o ID do aluno foi fornecido via GET
        if (isset($_GET['iduser'])) {
            $id = $_GET['iduser'];

            // Consultar o banco de dados para obter os detalhes do aluno com o ID fornecido
            $sql = "SELECT nome, idade, curso, email, telefone, cidade, turma FROM user_two WHERE iduser = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $nome = $row['nome'];
                $idade = $row['idade'];
                $curso = $row['curso'];
                $email = $row['email'];
                $telefone = $row['telefone'];
                $cidade = $row['cidade'];
                $turma = $row['turma'];
            } else {
                echo "Aluno não encontrado.";
                exit();
            }
        } else {
            echo "ID do aluno não fornecido.";
            exit();
        }
        ?>

        <form action="atualizar.php" method="post">
            <input type="hidden" name="iduser" value="<?php echo $id; ?>">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="nome" class="form-label">Nome:</label>
                        <input type="text" id="nome" name="nome" class="form-control" value="<?php echo $nome; ?>" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="idade" class="form-label">Idade:</label>
                        <input type="number" id="idade" name="idade" class="form-control" value="<?php echo $idade; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="curso" class="form-label">Curso:</label>
                        <select id="curso" name="curso" class="form-select" required>
                            <option value="">Selecione o curso</option>
                            <option value="ADS" <?php if ($curso == 'ADS') echo 'selected'; ?>>ADS</option>
                            <option value="Gastronomia" <?php if ($curso == 'Gastronomia') echo 'selected'; ?>>Gastronomia</option>
                            <option value="ADM" <?php if ($curso == 'ADM') echo 'selected'; ?>>ADM. DE EMP.</option>
                            <option value="Biologia" <?php if ($curso == 'Biologia') echo 'selected'; ?>>Biologia</option>
                        </select>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="text" id="email" name="email" class="form-control" value="<?php echo $email; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="telefone" class="form-label">Telefone:</label>
                        <input type="text" id="telefone" name="telefone" class="form-control" value="<?php echo $telefone; ?>" required>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="cidade" class="form-label">Cidade:</label>
                        <input type="text" id="cidade" name="cidade" class="form-control" value="<?php echo $cidade; ?>" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="turma" class="form-label">Turma:</label>
                        <input type="text" id="turma" name="turma" class="form-control" value="<?php echo $turma; ?>" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="index.php" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
</body>
<footer class="bg-primary-color text-dark py-4">
    <div class="container text-center">
        <p>&copy; 2024 App Control Student. Todos os direitos reservados. <span class="fw-bold text-muted">By Grupo de Estudos ADS</span></p>
    </div>
</footer>

</html>