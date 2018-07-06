<?php
    include 'cabecalho.php';
?>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Menu
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="formulario_enviar_email.php">Enviar E-Mail</a>
                    <a class="dropdown-item" href="formulario_listar_estatisticas.php">Estatísticas</a>
                    <a class="dropdown-item" href="formulario_listar_bounces.php">Devolvidos</a>
                </div>
            </div>
</nav>