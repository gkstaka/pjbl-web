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
                    <img src="assets/images/avatar.png" alt="Minha Foto de Perfil" width="200px" />
                    <h3>Nome: João Costa</h3>
                    <span id="email">Email: joao.costa@example.com</span>
                    <br /><br />
                    <span id="location">Localização: Cidade, País</span>
                    <br /><br />
                    <span id="birth-date">Data de Nascimento: 1997-07-22</span>
                </div>
                <div class="profile-actions">
                    <button onclick="changeEmail()">Editar Email</button>
                    <!-- Password is defined as 1A2b3$4C -->
                    <button onclick="changePassword()">Mudar Senha</button>
                </div>
            </section>
        </main>
        <footer>&copy; 2023 Gerenciador de Tarefas</footer>
        <script src="assets/js/profile.js"></script>
        <script src="assets/js/header-template-tasks.js"></script>
    </body>
</html>
