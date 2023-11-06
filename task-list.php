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
        <title>Lista de Tarefas - Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/task-list.css" />
    </head>
    <style>
        .task-link {
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin: 15px;
            background-color: #003b7a;
            padding: 5px;
            transition: ease-in-out 0.15s;
        }

        .task-link:hover,
        .task-link:focus {
            transition: ease-in-out 0.15s;
            background-color: #051c35;
        }
    </style>
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
            <section class="task-list">
                <h2>Lista de Tarefas</h2>
                <ul class="unsorted-list">
                    <?php
                    $id = $_SESSION["id"];
                    $sql = "SELECT * FROM task WHERE user_id = $id ORDER BY status, due_date, priority DESC;";
                    $result = mysqli_query($connection, $sql);
                    if (mysqli_num_rows($result) > 0) {

                        while ($row = mysqli_fetch_assoc($result)) {
                            $status = "";
                            if ($row["status"] == 1) {
                                $status = " - Concluído";
                            }
                            $priority = "";
                            switch ($row["priority"]) {
                                case 1:
                                    $priority = "Baixa";
                                    break;
                                case 2:
                                    $priority = "Média";
                                    break;
                                case 3:
                                    $priority = "Alta";
                                    break;
                            }
                            echo "<li class='task-list-item'>
                            <div class='left-column-items'>
                                <h3 class='task-title'>" . $row['title'] . $status . "</h3>
                                <span class='date'>Data de Vencimento: " . $row["due_date"] . "</span>
                                <br /><br />
                                <span class='priority'>Prioridade: " . $priority . "</span>
                                <p class='description'>
                                    Descrição: " . $row['description'] . "
                                </p>
                            </div>

                            <div class='right-column-items'>
                                <a href='finish-task.php?id=" . $row['id'] . "' class='task-link'>Concluir</a><br /><br />
                                <a href='update-task.php?id=" . $row['id'] . "' class='task-link'>Editar</a><br /> <br />
                                <a href='delete-task.php?id=" . $row['id'] . "' class='task-link'>Deletar</a><br />
                                </div>";
                        }

                    } else {
                        echo "<p>Nenhuma tarefa registrada</p>";
                    }
                    ?>
                </ul>
            </section>
        </main>
        <footer>&copy; 2023 Gerenciador de Tarefas</footer>
    </body>
</html>