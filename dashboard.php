<?php
session_start();
include_once "connection.php";
$userId = $_SESSION["id"];
//TAREFAS PARA HOJE
$currentDate = date('Y-m-d');
$vencimentohoje = "SELECT * FROM task WHERE user_id = '$userId' AND due_date = '$currentDate' AND status = false";
$runquery = mysqli_query($connection, $vencimentohoje);
$tarefashoje = mysqli_num_rows($runquery);


//TAREFAS PARA SEMANA
// $semana = date('Y-m-d', strtotime($currentDate . '+ 7 days'));
$vencimentosemana = "SELECT * FROM task WHERE user_id = '$userId' AND WEEKOFYEAR(due_date) = WEEKOFYEAR('$currentDate') AND status = false";
$runquery1 = mysqli_query($connection, $vencimentosemana);
$tarefassemana = mysqli_num_rows($runquery1);




//TOTAL DE TAREFAS
$querytotaltarefas = "SELECT * FROM task WHERE user_id = '$userId' AND status = false";
$runquery2 = mysqli_query($connection, $querytotaltarefas);
$totaltarefas = mysqli_num_rows($runquery2);
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Gerenciador de tarefas</title>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/dashboard.css" />
    </head>
    <body>

        <?php
        ?>
        <header id="header-container">
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
            <section class="dashboard">
                <h2>Painel</h2>
                <div class="summary">
                    <div class="summary-item">
                        <h3>Vencimento para hoje</h3>
                        <?php
                        echo "<span>$tarefashoje</span>"
                            ?>
                    </div>
                    <div class="summary-item">
                        <h3>Vencimento para essa semana</h3>
                        <?php
                        echo "<span>$tarefassemana</span>"
                        ?>
                    </div>
                    <div class="summary-item">
                        <h3>Total de tarefas</h3>
                        <br>
                        <?php
                        echo "<span>$totaltarefas</span>"
                        ?>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            &copy; 2023 Gerenciador de tarefas
        </footer>
    </body>

</html>