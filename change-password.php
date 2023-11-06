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
                            <input type="password" name="current-password" id="current-password">
                            <br>
                        </div>
                        <div class="input-text">
                            <label for="new-password">Nova senha: </label>
                            <input type="password" name="new-password" id="new-password">
                            <br>
                        </div>
                        <div class="input-text">
                            <label for="confirmation-password">Confirmação da nova senha: </label>
                            <input type="password" name="confirmation-password" id="confirmation-password">
                        </div>
                        <span id="password-info">Sua senha deve conter no minimo 8 digitos, um numero, uma letra
                            maiuscula, uma letra minuscula e um caracter especial</span>
                        <div class="profile-actions">
                            <input type="submit" value="Alterar senha">
                        </div>
                    </form>

                </div>
            </section>
        </main>
        <footer>&copy; 2023 Gerenciador de Tarefas</footer>
        <script>
            function verifyPassword(password) {
                const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-=+_{}\[\]|;:.,<>?/])[A-Za-z\d!@#$%^&*()\-=+_{}\[\]|;:.,<>?/]{8,}$/
                return passwordRegex.test(password)
            }

            document.addEventListener("DOMContentLoaded", function () {
                const submit = document.getElementById("submit")
                const form = document.getElementById("change-password")
                const currentPassword = document.getElementById("current-password")
                const newPassword = document.getElementById("new-password")
                const confirmationPassword = document.getElementById("confirmation-password")

                form.addEventListener("submit", function (event) {
                    let validateInput = true

                    if (!verifyEmail(email.value)) {
                        console.log("email invalido: " + email.value)
                        document.getElementById("error-message").innerHTML = "Os campos em vermelho devem ser válidos"
                        email.style.transition = "ease-in-out 0.3s"
                        email.style.border = "solid 1px #f07560"
                        validateInput = false
                        event.preventDefault()
                    }
                    else {
                        console.log(email.value)
                        email.style.border = "solid 1px #cccccc"
                    }
                    if (!verifyUserName(userName.value)) {
                        console.log("username invalido: " + userName.value)
                        document.getElementById("error-message").innerHTML = "Os campos em vermelho devem ser válidos"
                        userName.style.transition = "ease-in-out 0.3s"
                        userName.style.border = "solid 1px #f07560"
                        validateInput = false
                        event.preventDefault()
                    }
                    else {
                        console.log(userName.value)
                        userName.style.border = "solid 1px #cccccc"
                    }
                    if (!verifyPassword(password.value)) {
                        console.log("password invalido: " + password.value)
                        document.getElementById("error-message").innerHTML = "Os campos em vermelho devem ser válidos"
                        password.style.transition = "ease-in-out 0.3s"
                        password.style.border = "solid 1px #f07560"
                        validateInput = false
                        event.preventDefault()
                    }
                    else {
                        console.log(password.value)
                        password.style.border = "solid 1px #cccccc"
                    }

                    if (validateInput) {
                        console.log("submit")
                        form.submit()
                    }
                    else {
                        console.log("nao valido")
                    }
                })
            })
        </script>6
    </body>
</html>