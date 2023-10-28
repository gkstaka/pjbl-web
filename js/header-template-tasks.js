function getHeaderTemplate() {
    return `
            <h1>Gerenciador de tarefas</h1>
            <nav>
                <ul id="nav-list">
                    <li class="nav-list-item"><a href="dashboard.html" class="nav-link">Página inicial</a></li>
                    <li class="nav-list-item"><a href="task-list.html" class="nav-link">Lista de tarefas</a></li>
                    <li class="nav-list-item"><a href="add-task.html" class="nav-link">Adicionar tarefa</a></li>
                    <li class="nav-list-item"><a href="statistics.html" class="nav-link">Estatísticas</a></li>
                    <li class="nav-list-item"><a href="profile.html" class="nav-link">Perfil</a></li>
                    <li class="nav-list-item"><a href="login.html" class="nav-link">Logout</a></li>
                </ul>
            </nav>
    `;
}

document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('header-container');
    if (container) {
        container.innerHTML = getHeaderTemplate();
    }
});
