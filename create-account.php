<?php
    include_once "connection.php";
?>

<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Gerenciador de tarefas</title>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/create-account.css" />
    </head>
    <header>
        <h1>Gerenciador de tarefas</h1>
        <nav>
            <ul id="nav-list">
                <li class="nav-list-item"><a href="create-account.html" class="nav-link">Criar conta</a></li>
                <li class="nav-list-item"><a href="login.html" class="nav-link">Login</a></li>
            </ul>
        </nav>
    </header>
    <body>
        <form action="create-account.php" method="post" name = > 
            <span>E-mail: </span>
            <input type="email" name="email" id="email" placeholder="seu.email@aqui.com">
            <br>
            <span>Usuário: </span>
            <input type="text" name="username" id="username">
            <br>
            <span>Senha: </span>
            <input type="password" name="password" id="password">
            <br>
            <span>"embaixo da senha" Sua senha deve conter no minimo 8 digitos, um numero, uma letra maiuscula, uma letra minuscula e um caracter especial</span>
            <br>
            <button type="submit" id="submit">Cadastrar</button>
        </form>
        <?php
        ?>
    </body>
    <footer>&copy; 2023 Gerenciador de Tarefas</footer>
    <script src="js/create-account.js"></script>
</html>