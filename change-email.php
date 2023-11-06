<?php
session_start();
include_once "connection.php";
$id = $_SESSION["id"];
$query = "SELECT email, password FROM user WHERE id = $id;";
if ($result = mysqli_query($connection, $query)) {
    $row = mysqli_fetch_assoc($result);
    $email = $row["email"];
} else {
    echo mysqli_error($connection);
    exit();
}
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
                        <p>E-mail atual: $email</p>";
                    ?>
                    <form action="" method="post" name="update-email" id="update-email">
                        <label for='email'>Novo e-mail: </label>
                        <input type='email' name='email' id='email' required>

                        <div class="profile-actions">
                            <input type="submit" value="Confirmar alteração" name="submit" id="submit">
                        </div>
                        <div id="error-message"></div>
                    </form>
                    <?php
                    if (isset($_POST["submit"])) {
                        $id = intval(mysqli_real_escape_string($connection, $_SESSION["id"]));
                        $email = mysqli_real_escape_string($connection, $_POST["email"]);
                        $query = "UPDATE user SET email = '$email' WHERE id = $id;";
                        try {
                            if (mysqli_query($connection, $query)) {
                                header("Location: profile.php");
                            }
                        } catch (mysqli_sql_exception $e) {
                            if ($e->getCode() == 1062) {
                                echo "O e-mail já está em uso";
                            } else {
                                echo $e->getMessage();
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
        <script>
            function verifyEmail(email) {
                // primeiro caracter deve ser uma letra, deve ter pelo menos 3 caracteres antes do @,
                // o ultimo caracter nao deve ser especial, deve haver um @ e um . seguido de dois a quatro caracteres para o domínio
                emailRegex = /^[a-zA-Z][a-zA-Z0-9._-]+[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/
                return emailRegex.test(email)
            }

            function maskEmail(input) {
                let emailValue = input.value
                const emailMaskRegex = /^[a-zA-Z0-9._@-]/
                // testa se o novo caracter inserido está dentro dos caracteres validos
                if (!emailMaskRegex.test(emailValue[emailValue.length - 1])) {
                    input.value = emailValue.substring(0, emailValue.length - 1)
                }
            }
            
            document.addEventListener("DOMContentLoaded", function () {
                const submit = document.getElementById("submit")
                const form = document.getElementById("update-email")
                const email = document.getElementById("email")


                email.addEventListener("input", function () {
                    maskEmail(this)
                })


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

                    if (validateInput) {
                        console.log("submit")
                        form.submit()
                    }
                    else {
                        console.log("nao valido")
                    }
                })
            })
        </script>
    </body>
</html>