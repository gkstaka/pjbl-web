<html lang="pt-br">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Gerenciador de tarefas</title>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/create-account.css" />


    </head>

    <body>
        <header>
            <h1>Gerenciador de tarefas</h1>
            <nav>
                <ul id="nav-list">
                    <li class="nav-list-item"><a href="create-account.php" class="nav-link">Criar conta</a></li>
                    <li class="nav-list-item"><a href="login.php" class="nav-link">Login</a></li>
                </ul>
            </nav>
        </header>

        <main>
            <h2 id="create-account-header">Criar conta</h2>
            <form action="" method="post" name="create-account" id="create-account">
                <div class="input-text">
                    <label for="email">E-mail: </label>
                    <input type="email" name="email" id="email" placeholder="seu.email@aqui.com" autocomplete="off" required oninput="maskEmail(this)">
                </div>
                <br>
                <div class="input-text">
                    <label for="username">Usuário: </label>
                    <input type="text" name="username" id="username" autocomplete="off" required oninput="maskUser(this)">
                </div>
                <br>
                <div class="input-text">
                    <label for="password">Senha: </label>
                    <input type="password" name="password" id="password" autocomplete="off" required oninput="maskPassword(this)">
                    <br>
                </div>
                <span id="password-info">Sua senha deve conter no minimo 8 digitos, um numero, uma letra maiuscula, uma
                    letra minuscula e um caracter especial</span>
                <br>
                <br>
                <input type="submit" id="submit-button" value="Cadastrar" name="register">
                <br>
                <div id="error-message"></div>
            </form>
            <?php
            include_once "connection.php";

            if (isset($_POST["register"])) {
                try {

                    $userName = mysqli_real_escape_string($connection, $_POST["username"]);
                    $email = mysqli_real_escape_string($connection, $_POST["email"]);
                    $password = mysqli_real_escape_string($connection, $_POST["password"]);

                    $sql = "INSERT INTO user (id, user_name, email, password) VALUES (NULL, '$userName', '$email', '$password');";

                    if (mysqli_query($connection, $sql)) {
                        // echo "<script> alert('Conta criada com sucesso')</script>";
                        echo "<h2 style='
                        text-align: center;
                        align-items: center;'
                        >Conta criada com sucesso!</h2>";
                    } else {
                        echo "<script> alert('Não foi possivel criar o usuário')</script>";
                    }

                    mysqli_close($connection);
                } catch (mysqli_sql_exception $e) {
                    if ($e->getCode() == 1062) {
                        echo "<script>alert('Usuario ou e-mail já existentes')</script>";
                    }
                }
            }
            ?>
        </main>
        <footer>&copy; 2023 Gerenciador de Tarefas</footer>
    </body>
    <!-- <script src="js/create-account.js"></script> -->
    <script src="js/create-account.js"></script>
</html>