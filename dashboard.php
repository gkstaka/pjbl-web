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
        <title>Gerenciador de tarefas</title>
        <link rel="stylesheet" href="css/styles.css" />
        <link rel="stylesheet" href="css/dashboard.css" />
    </head>
    <body>

        <?php
        $login = $_SESSION["id"];
        
        echo "<h1>id sessao: $login</h1>";
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
                        <span><?php echo $tarefashoje ?></span>
                        
                        
                    </div>
                    <div class="summary-item">
                        <h3>Vencimento para essa semana</h3>
                        <span></span>
                    </div>
                    <div class="summary-item">
                        <h3>Total de tarefas</h3>
                        <span></span>
                    </div>
                </div>
            </section>
        </main>
        <footer>
            &copy; 2023 Gerenciador de tarefas
        </footer>
    </body>
    <?php

        //TAREFAS PARA HOJE
        $currentDate = date('Y-m-d');
        $vencimentohoje = "SELECT * FROM task WHERE user_id = '$login' AND due_date = '$currentDate'";
        $runquery = mysqli_query($connection, $vencimentohoje);
        $tarefashoje = mysqli_num_rows($runquery);
      

        //TAREFAS PARA SEMANA
        $semana = date('Y-m-d', strtotime($currentDate .'+ 7 days'));
        $vencimentosemana= "SELECT * FROM task WHERE user_id = '$login' AND due_date <= '$semana'";
        $runquery1 = mysqli_query($connection, $vencimentosemana);
        $tarefassemana = mysqli_num_rows($runquery1);




        //TOTAL DE TAREFAS
        $querytotaltarefas = "SELECT * FROM task WHERE user_id = '$login'";
        $runquery2 = mysqli_query($connection, $querytotaltarefas);
        $totaltarefas = mysqli_num_rows($runquery2);


        echo $tarefashoje;
        echo " ";
        echo " ";
        echo $tarefassemana;
        echo " ";
        echo " ";
        echo $totaltarefas;

    ?> 
</html>