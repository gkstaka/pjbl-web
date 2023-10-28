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
        <link rel="stylesheet" href="css/index.css" />
    </head>
    <header>
        <h1>Gerenciador de tarefas</h1>
        <nav>
            <ul id="nav-list">
                <li class="nav-list-item"><a href="create-account.php" class="nav-link">Criar conta</a></li>
                <li class="nav-list-item"><a href="login.php" class="nav-link">Login</a></li>
            </ul>
        </nav>
    </header>
    <body>
        <form action="" method="post">         <!-- action - insert.php.route -->
            <span>E-mail: </span>
            <input type="email" name="email" id="email" placeholder="seu.email@aqui.com">
            <br>
            <span>Senha: </span>
            <input type="password" name="password" id="password">
            <br>
            <button type="submit">Entrar</button>
        </form>
        <?php
        $query = "SELECT * FROM user WHERE email = $email OR user_name = $email";
        ?>

    </body>
    
    <footer>&copy; 2023 Gerenciador de Tarefas</footer>
</html>