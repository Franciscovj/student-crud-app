<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Alunos</title>
    <link rel="shortcut icon" href="estudante.png" type="image/x-icon" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <style>
        .navbar-text p {
            display: inline-block;
            margin: 0;
            margin-left: 0.5rem;
        }
        .navbar-nav .nav-item {
            display: flex;
            align-items: center;
        }
        .navbar-nav .nav-item + .nav-item {
            margin-left: 1rem;
        }
    </style>
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
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <span class="navbar-text me-3">
                            <i class="bi bi-person"></i>
                            <p>Bem-vindo, <?php echo $_SESSION['username']; ?>!</p>
                        </span>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="bi bi-box-arrow-right"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <div class="row justify-content-center">
            <?php
            // Incluir o arquivo de configuração
            include_once('config.php');

            // Consulta SQL para obter os cursos e o total de alunos em cada curso
            $sql = "SELECT curso, COUNT(*) AS total_alunos FROM user_two GROUP BY curso";
            $result = $conn->query($sql);

            // Verificar se existem resultados
            if ($result->num_rows > 0) {
                // Loop através dos resultados e exibir um card para cada curso
                while ($row = $result->fetch_assoc()) {
            ?>
                    <div class="col-md-3">
                        <div class="card text-center mb-3 bg-primary">
                            <div class="card-header font-weight-bold"><?php echo $row["curso"]; ?></div>
                            <div class="card-body">
                                <h5 class="card-title font-weight-bold">Total de Alunos</h5>
                                <p class="card-text fs-2"><?php echo $row["total_alunos"]; ?></p>
                            </div>
                        </div>
                    </div>

            <?php
                }
            } else {
                // Se não houver cursos cadastrados, exibir uma mensagem
                echo "<div class='col-md-12'><p class='text-center'>Nenhum curso cadastrado.</p></div>";
            }
            ?>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row">
            <div class="col-md-4 d-flex align-items-center">
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#cadastroModal">
                    <i class="bi bi-plus"></i>
                </button>
                <button class="btn btn-primary" id="btnSearch" onclick="filterTable()">
                    <i class="bi bi-search"></i>
                </button>
                <button class="btn btn-warning" id="btnClean" onclick="limparFiltros()">
                    <i class="bi bi-backspace"></i>
                </button>
                <select class="form-select" id="filtroCurso">
                    <option value="">Todos os Cursos</option>
                    <option value="ADS">ADS</option>
                    <option value="Gastronomia">Gastronomia</option>
                    <option value="ADM">ADM. DE EMP.</option>
                    <option value="Biologia">Biologia</option>
                </select>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="cadastroModal" tabindex="-1" aria-labelledby="cadastroModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <img src="image/estudante.png" alt="Seu Logo" style="max-height: 40px;">
                    <h5 class="modal-title" id="cadastroModalLabel">Cadastro de Alunos</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="cadastroForm" action="cadastro.php" method="post">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nome" class="form-label">Nome:</label>
                                    <input type="text" id="nome" name="nome" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="idade" class="form-label">Idade:</label>
                                    <input type="number" id="idade" name="idade" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="curso" class="form-label">Curso:</label>
                                    <select id="curso" name="curso" required class="form-select">
                                        <option value="">Selecione o curso</option>
                                        <option value="ADS">ADS</option>
                                        <option value="Gastronomia">Gastronomia</option>
                                        <option value="ADM">ADM. DE EMP.</option>
                                        <option value="Biologia">Biologia</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email:</label>
                                    <input type="text" id="email" name="email" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="telefone" class="form-label">Telefone:</label>
                                    <input type="text" id="telefone" name="telefone" required class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="cidade" class="form-label">Cidade:</label>
                                    <input type="text" id="cidade" name="cidade" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="turma" class="form-label">Turma:</label>
                                    <input type="text" id="turma" name="turma" required class="form-control">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                        <button type="button" class="btn btn-warning" data-bs-dismiss="modal">Sair</button>
                    </form>
                    <div id="mensagem"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Tabela de Alunos -->
    <div class="container mt-4">
        <h2>Lista de Alunos</h2>
        <div style="max-height: 400px; overflow-y: auto;">
            <table class="table" id="tabelaAlunos">
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Idade</th>
                        <th scope="col">Curso</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefone</th>
                        <th scope="col">Cidade</th>
                        <th scope="col">Turma</th>
                        <th scope="col">Editar/Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Incluir o arquivo de configuração
                    include_once('config.php');

                    // Consulta SQL para obter os alunos
                    $sql = "SELECT iduser,nome,idade,curso,email,telefone,cidade,turma FROM user_two";
                    $result = $conn->query($sql);

                    // Verificar se existem resultados
                    if ($result->num_rows > 0) {
                        // Loop através dos resultados e exibir cada aluno na tabela
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row["nome"] . "</td>";
                            echo "<td>" . $row["idade"] . "</td>";
                            echo "<td>" . $row["curso"] . "</td>";
                            echo "<td>" . $row["email"] . "</td>";
                            echo "<td>" . $row["telefone"] . "</td>";
                            echo "<td>" . $row["cidade"] . "</td>";
                            echo "<td>" . $row["turma"] . "</td>";
                            echo "<td>";
                            echo "<a href='editar.php?iduser=" . $row["iduser"] . "' class='btn btn-primary btn-sm'><i class='bi bi-pencil'></i></a>";
                            echo "<button onclick='confirmDelete(" . $row["iduser"] . ")' class='btn btn-danger btn-sm'><i class='bi bi-trash'></i></button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='8'>Nenhum aluno cadastrado</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>
    <script src="js/script.js"></script>

</body>

<footer class="bg-primary-color text-dark py-4">
    <div class="container text-center">
        <p>&copy; 2024 App Control Student. Todos os direitos reservados. <span class="fw-bold text-muted">By Grupo de Estudos ADS</span></p>
    </div>
</footer>

</html>