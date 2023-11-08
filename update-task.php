<?php
include_once "connection.php";
session_start();
$userId = intval(mysqli_real_escape_string($connection, $_SESSION['id']));
$id = intval(mysqli_real_escape_string($connection, $_GET['id']));
$sql = "SELECT * FROM task WHERE id = $id AND user_id = $userId";
$result = mysqli_query($connection, $sql);
$row = mysqli_fetch_assoc($result);
// seguranca! verifica se a task existe e pertence ao usuário, se não for, redireciona para a task-list
if ($row["id"] == null) {
    echo "<script>alert('Não foi possível fazer essa requisição')</script>";
    header("Location: task-list.php");
}
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Adicionar Tarefa - Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/edit-task.css" />
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
            <form action="" method="post" name="edit-task" id="edit-task">
                <div id="edit-task-form">
                    <div class="form-group">
                        <label for="task-name">Nome da Tarefa:</label>
                        <?php
                        $title = $row['title'];
                        echo "<input type='text' id='task-name' name='task-name' required autocomplete='false' value='$title' oninput='maxTitleLength(this)'/>";
                        ?>
                    </div>
                    <div class="form-group">
                        <label for="due-date">Data de Vencimento:</label>
                        <?php
                        $date = $row['due_date'];
                        echo "<input type='date' id='due-date' name='due-date' required value='$date'/>";
                        ?>

                    </div>
                    <div class="form-group">
                        <label for="priority">Prioridade:</label>
                        <div class="radio-button-priority">
                            <div class="radio-button-box">
                                <?php
                                $priority = $row['priority'];
                                if ($priority == 1) {
                                    echo "<input type='radio' name='priority' id='priority-low' value='1' checked />";
                                } else {
                                    echo "<input type='radio' name='priority' id='priority-low' value='1' />";
                                }
                                ?>
                                <label for="priority-low">Baixa</label>
                            </div>
                            <div class="radio-button-box">
                                <?php
                                $priority = $row['priority'];
                                if ($priority == 2) {
                                    echo "<input type='radio' name='priority' id='priority-medium' value='2' checked />";
                                } else {
                                    echo "<input type='radio' name='priority' id='priority-medium' value='2' />";
                                }
                                ?>
                                <label for="priority-medium">Média</label>
                            </div>
                            <div class="radio-button-box">
                                <?php
                                $priority = $row['priority'];
                                if ($priority == 3) {
                                    echo "<input type='radio' name='priority' id='priority-high' value='3' checked />";
                                } else {
                                    echo "<input type='radio' name='priority' id='priority-high' value='3' />";
                                }
                                ?><label for="priority-high">Alta</label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="description">Descrição:</label>
                            <?php
                            $id = $_GET['id'];
                            $sql = "SELECT * FROM task WHERE id = $id";
                            $result = mysqli_query($connection, $sql);
                            $row = mysqli_fetch_assoc($result);
                            $description = $row['description'];
                            echo "<textarea id='description' name='description' rows='4' autocomplete='false' oninput='maxDescriptionLength(this)'>$description</textarea>"
                                ?>
                        </div>
                        <input type="submit" value="Editar" name="submit" id="submit">

                    </div>
                </div>
            </form>
            <?php
            if (isset($_POST["submit"])) {
                $task_name = mysqli_real_escape_string($connection, $_POST["task-name"]);
                $due_date = $_POST["due-date"];
                $priority = intval($_POST["priority"]);
                $description = mysqli_real_escape_string($connection, $_POST["description"]);
                $sql = "UPDATE task SET title = '$task_name', due_date = '$due_date', priority = $priority,
                        description = '$description' WHERE id = $id AND user_id = $userId";
                if (mysqli_query($connection, $sql)) {
                    header("Location: task-list.php");
                } else {
                    echo "<script>alert('Erro ao editar tarefa!')</script>";
                }
            }
            ?>
        </main>
        <footer>&copy; 2023 Gerenciador de Tarefas</footer>
            <script src="js/task.js"></script>

    </body>
</html>