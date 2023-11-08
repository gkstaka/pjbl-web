<?php
session_start();
include_once "connection.php";
$id = $_SESSION["id"];
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
                    <form action="" method="post" name="change-password" id="change-password">
                        <div class="input-text">
                            <label for="current-password">Senha atual: </label>
                            <input type="password" name="current-password" id="current-password"
                                oninput="maskPassword(this)" autocomplete="off" required>
                            <br>
                        </div>
                        <div class="input-text">
                            <label for="new-password">Nova senha: </label>
                            <input type="password" name="new-password" id="new-password" oninput="maskPassword(this)"
                                autocomplete="off" required>
                            <br>
                        </div>
                        <div class="input-text">
                            <label for="confirmation-password">Confirmação da nova senha: </label>
                            <input type="password" name="confirmation-password" id="confirmation-password"
                                oninput="maskPassword(this)" autocomplete="off" required>
                        </div>
                        <span id="password-info">Sua senha deve conter no minimo 8 digitos, um numero, uma letra
                            maiuscula, uma letra minuscula e um caracter especial</span>
                        <div class="profile-actions">
                            <input type="submit" value="Alterar senha" name="submit">
                        </div>
                        <div id="error-message">
                        </div>
                    </form>
                    <?php
                    if (isset($_POST["submit"])) {
                        try {
                            $query = "SELECT password FROM user WHERE id = $id;";
                            $result = mysqli_query($connection, $query);
                            $row = mysqli_fetch_assoc($result);
                            $password = $row["password"];
                            $newPassword = $_POST["new-password"];
                            if ($_POST["current-password"] != $password) {
                                echo "<p>Senha atual incorreta</p>";
                            } else {
                                $query = "UPDATE user SET password = '$newPassword' WHERE id = $id;";
                                if (mysqli_query($connection, $query)) {
                                    header("Location: profile.php");
                                }
                            }
                        } catch (Exception $e) {
                            echo $e->getMessage();
                        }
                    }
                    ?>
                </div>
            </section>
        </main>
        <footer>&copy; 2023 Gerenciador de Tarefas</footer>
        <script src="js/change-password.js"></script>
    </body>
</html>