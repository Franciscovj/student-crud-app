<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" integrity="sha384-4LISF5TTJX/fLmGSxO53rV4miRxdg84mZsxmO8Rx5jGtp/LbrixFETvWa5a6sESd" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="login-container">
        <div class="header">
            <img src="image/estudante.png" alt="Logo" class="logo">
            <h4>Reg. App Control Student</h4>
        </div>
        <br>
        <form action="authenticate.php" method="POST">
            <input type="text" name="username" placeholder="Usuario" class="form-control" required>
            <br>
            <input type="password" name="password" placeholder="Senha" class="form-control" required>
            <br>
            <input type="submit" name="register" value="Enviar" class="inputSubmit">
        </form>
        <a href="login.php">Voltar para login</a>
        <footer class="bg-primary-color text-dark py-4">
            <div class="container text-center">
                <p>&copy; 2024 App Control Student.</p>
            </div>
        </footer>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

</body>

</html>