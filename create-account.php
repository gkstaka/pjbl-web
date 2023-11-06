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
                    <input type="email" name="email" id="email" placeholder="seu.email@aqui.com" autocomplete="off"
                        required>
                </div>
                <br>
                <div class="input-text">
                    <label for="username">Usuário: </label>
                    <input type="text" name="username" id="username" autocomplete="off" required>
                </div>
                <br>
                <div class="input-text">
                    <label for="password">Senha: </label>
                    <input type="password" name="password" id="password" autocomplete="off" required>
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
    <script>
        function verifyEmail(email) {
            // primeiro caracter deve ser uma letra, deve ter pelo menos 3 caracteres antes do @,
            // o ultimo caracter nao deve ser especial, deve haver um @ e um . seguido de dois a quatro caracteres para o domínio
            emailRegex = /^[a-zA-Z][a-zA-Z0-9._-]+[a-zA-Z0-9]+@[a-zA-Z]+\.[a-zA-Z]{2,4}$/
            return emailRegex.test(email)
        }

        function verifyUserName(userName) {
            // usuário deve ter duas letras e e números podem ser opcionais. Deve começar com uma letra. Caracteres especiais nao inclusos
            userNameRegex = /^[a-zA-Z][a-zA-Z0-9]{3,9}$/
            return userNameRegex.test(userName)
        }

        function verifyPassword(password) {
            const passwordRegex = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*()\-=+_{}\[\]|;:.,<>?/])[A-Za-z\d!@#$%^&*()\-=+_{}\[\]|;:.,<>?/]{8,}$/
            return passwordRegex.test(password)
        }

        function maskEmail(input) {
            let emailValue = input.value
            const emailMaskRegex = /^[a-zA-Z0-9._@-]/
            // testa se o novo caracter inserido está dentro dos caracteres validos
            if (!emailMaskRegex.test(emailValue[emailValue.length - 1])) {
                input.value = emailValue.substring(0, emailValue.length - 1)
            }

        }

        function maskUser(input) {
            let userValue = input.value
            const userMaskRegex = /^[a-zA-Z0-9]/
            // testa se o novo caracter inserido está dentro dos caracteres validos
            if (!userMaskRegex.test(userValue[userValue.length - 1]) || input.value.length > 10) {
                input.value = userValue.substring(0, userValue.length - 1)
            }
        }
        document.addEventListener("DOMContentLoaded", function () {
            const submitButton = document.getElementById("submit-button")
            const form = document.getElementById("create-account")
            const email = document.getElementById("email")
            const userName = document.getElementById("username")
            const password = document.getElementById("password")


            email.addEventListener("input", function () {
                maskEmail(this)
            })

            userName.addEventListener("input", function () {
                maskUser(this)
            })

            submitButton.addEventListener("click", function () {
                console.log("botao clicado")
            })

            form.addEventListener("submit", function (event) {
                let validateInput = true

                console.log("botao clicado")
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
    </script>
</html>