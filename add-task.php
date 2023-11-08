<?php
session_start();
include_once "connection.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Adicionar Tarefa - Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/add-task.css" />
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
            <section class="add-task">
                <h2>Adicionar Nova Tarefa</h2>

                <form action="add-task.php" method="post" name="add-task" id="add-task" >
                    <div id="add-task-form">
                        <div class="form-group">
                            <label for="task-name">Nome da Tarefa:</label>
                            <input type="text" id="task-name" name="task-name" required autocomplete="false" oninput="maxTitleLength(this)"/>
                        </div>
                        <div class="form-group">
                            <label for="due-date">Data de Vencimento:</label>
                            <input type="date" id="due-date" name="due-date" required />
                        </div>
                        <div class="form-group">
                            <label for="priority">Prioridade:</label>
                            <div class="radio-button-priority">
                                <div class="radio-button-box">
                                    <input type="radio" name="priority" id="priority-low" value="1" />
                                    <label for="priority-low">Baixa</label>
                                </div>
                                <div class="radio-button-box">
                                    <input type="radio" name="priority" id="priority-medium" value="2" />
                                    <label for="priority-medium">Média</label>
                                </div>
                                <div class="radio-button-box">
                                    <input type="radio" name="priority" id="priority-high" value="3" />
                                    <label for="priority-high">Alta</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="description">Descrição:</label>
                                <textarea id="description" name="description" rows="4" autocomplete="false" oninput="maxDescriptionLength(this)"></textarea>
                            </div>
                        </div>
                        <input type="submit" value="Criar nova tarefa" name="submit" id="submit">
                    </div>
                </form>

                <?php
                if (isset($_POST["submit"])) {
                    $user_id = $_SESSION["id"];
                    $task_name = mysqli_real_escape_string($connection, $_POST["task-name"]);
                    $due_date = $_POST["due-date"];
                    $priority = intval($_POST["priority"]);
                    $description = mysqli_real_escape_string($connection, $_POST["description"]);
                    $status = false;
                    $sql = "INSERT INTO task(user_id, title, due_date, priority, `description`, `status`)
                    VALUES ('$user_id', '$task_name', '$due_date', $priority, '$description', '$status');";

                    if (mysqli_query($connection, $sql)) {
                        echo "<h2>Tarefa adicionada com sucesso!</h2>";
                    } else {
                        echo "<h2>Erro ao adicionar tarefa</h2>";
                    }

                }
                ?>
            </section>
        </main>
        <footer>&copy; 2023 Gerenciador de Tarefas</footer>
        <script src="js/task.js"></script>
    </body>
</html>