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
                    <li class="nav-list-item"><a href="login.php" class="nav-link">Logout</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <section class="statistics">
                <h2>Estatísticas</h2>
                <div class="statistics-box">
                    <div class="stat-item">
                        <h3>Tarefas Completadas</h3>
                        <span>Total: 35</span>
                        <br>
                        <span>Percentual: 70%</span>
                    </div>
                    <div class="stat-item">
                        <h3>Tarefas em Andamento</h3>
                        <span>Total: 15</span>
                        <br>
                        <span>Percentual: 30%</span>
                    </div>
                    <div class="stat-item">
                        <h3>Prioridade das Tarefas</h3>
                        <ul>
                            <li>Alta: 10 tarefas (20%)</li>
                            <li>Média: 20 tarefas (40%)</li>
                            <li>Baixa: 20 tarefas (40%)</li>
                        </ul>
                    </div>
                </div>
            </section>
        </main>
        <footer>&copy; 2023 Gerenciador de Tarefas</footer>
        <script src="assets/js/header-template-tasks.js"></script>
    </body>
</html>
