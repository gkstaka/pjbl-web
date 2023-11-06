<?php
session_start();
include_once "connection.php";
$id = $_SESSION["id"];
$query = "SELECT user_name, email, password FROM user WHERE id = $id;";
$result = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($result);
$userName = $row["user_name"];
$email = $row["email"];
$password = $row["password"];
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Perfil - Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/profile.css" />
    </head>
    <body>
        <header>
            <h1>Gerenciador de tarefas</h1>
            <nav>
                <ul id="nav-list">
                    <li class="nav-list-item"><a href="dashboard.php" class="nav-link">Página inicial</a></li>
                    <li class="nav-list-item"><a href="task-list.php" class="nav-link">Lista de tarefas</a></li>
                    <li class="nav-list-item"><a href="add-task.php" class="nav-link">Adicionar tarefa</a></li>
                    <li class="nav-list-item"><a href="statistics.php" class="nav-link">Estatísticas</a></li>
                    <li class="nav-list-item"><a href="profile.php" class="nav-link">Perfil</a></li>
                    <li class="nav-list-item"><a href="logout.php" class="nav-link">Logout</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <section class="profile">
                <h2>Meu Perfil</h2>
                <div class="profile-info">
                    <?php
                    echo "
                        <h3>Usuário: $userName</h3>
                        <h3 id='email'>Email: $email</h3>
                        ";
                    ?>
                    <br />
                </div>
                <div class="profile-actions">
                    <a href="change-email.php">Alterar e-mail</a>
                    <a href="change-password.php">Alterar senha</a>
                </div>
            </section>
        </main>
        <footer>&copy; 2023 Gerenciador de Tarefas</footer>
    </body>
</html>