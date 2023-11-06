<?php
session_start();
include_once "connection.php";
$id = $_SESSION["id"];
$query = "SELECT COUNT(*) AS `count` FROM task WHERE user_id = $id AND status = true";
$queryResult = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($queryResult);
$completedTasks = $row["count"];

$query = "SELECT COUNT(*) AS `count` FROM task WHERE user_id = $id;";
$queryResult = mysqli_query($connection, $query);
$row = mysqli_fetch_assoc($queryResult);
$totalTasks = $row["count"];
$percentTaskComplete = number_format(($completedTasks / $totalTasks) * 100, 2);

$ongoingTasks = $totalTasks - $completedTasks;
$percentOngoingTask = number_format(($ongoingTasks / $totalTasks) * 100, 2);

$query = "SELECT COUNT(*) AS `count` FROM task WHERE user_id = $id GROUP BY priority ASC";
$queryResult = mysqli_query($conneytion, $query);

$row = mysqli_fetch_assoc($queryResult);
$lowPriority = $row["count"];
$percentLowPriority = number_format(($lowPriority / $totalTasks) * 100, 2);

$row = mysqli_fetch_assoc($queryResult);
$mediumPriority = $row["count"];
$percentMediumPriority = number_format(($mediumPriority / $totalTasks) * 100, 2);

$row = mysqli_fetch_assoc($queryResult);
$highPriority = $row["count"];
$percentHighPriority = number_format(($highPriority / $totalTasks) * 100, 2);

?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Estatísticas - Gerenciador de Tarefas</title>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/statistics.css" />
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
            <section class="statistics">
                <h2>Estatísticas</h2>
                <div class="statistics-box">
                    <div class="stat-item">
                        <h3>Tarefas Completadas</h3>
                        <?php
                        echo "<span>Total: $completedTasks</span>";
                        ?>
                        <br>
                        <?php
                        echo "<span>Percentual: $percentTaskComplete%</span>";
                        ?>
                    </div>
                    <div class="stat-item">
                        <h3>Tarefas em Andamento</h3>
                        <?php
                        echo "<span>Total: $ongoingTasks</span>";
                        ?>
                        <br>
                        <?php
                        echo "<span>Percentual: $percentOngoingTask%</span>";
                        ?>
                    </div>
                    <div class="stat-item">
                        <h3>Prioridade das Tarefas</h3>
                        <ul>
                            <?php
                            echo "<li>Alta: $highPriority tarefas ($percentLowPriority%)</li>";
                            echo "<li>Média: $mediumPriority tarefas ($percentMediumPriority%)</li>";
                            echo "<li>Baixa: $lowPriority tarefas ($percentHighPriority%)</li>";
                            ?>
                            <!-- <li>Alta: 10 tarefas (20%)</li> -->
                            <!-- <li>Média: 20 tarefas (40%)</li>
                            <li>Baixa: 20 tarefas (40%)</li> -->
                        </ul>
                    </div>
                </div>
            </section>
        </main>
        <footer>&copy; 2023 Gerenciador de Tarefas</footer>
        <script src="assets/js/header-template-tasks.js"></script>
    </body>
</html>