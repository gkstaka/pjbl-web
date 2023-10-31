<?php
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Gerenciador de tarefas</title>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/login.css" />
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
            <h2 id="login-header">Login</h2>
            <form action="dashboard.php" method="post">
                <div class="input-text">
                    <label for="login">Usuário ou e-mail: </label>
                    <input type="text" name="login" id="login" placeholder="Usuário ou e-mail">
                </div>
                <br>
                <div class="input-text">
                    <label for="password">Senha: </label>
                    <input type="password" name="password" id="password">
                </div>
                <br>
                <input type="submit" value="Entrar" name="submit">
            </form>
        </main>
        <?php
        if (isset($_POST["submit"])) {
            $query = "SELECT id FROM user"
        }
         // $query = "SELECT * FROM user WHERE email = $email OR user_name = $email";
        ?>

    </body>
    
    <footer>&copy; 2023 Gerenciador de Tarefas</footer>
</html>