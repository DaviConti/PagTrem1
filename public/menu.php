<?php
session_start(); 
include '../config/db.php'; 
?>

<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Principal</title>
    <link rel="stylesheet" href="../style/menu.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="app-container">
        <div class="header">
            <div class="icon-left">
                <i class="fas fa-train"></i> </div>
            <div class="header-title">MENU</div>
        </div>

        <div class="menu-items-container">
            <a href="dashboard.php" class="menu-item">
                Dashboard
            </a>
            <a href="gestaoderotas.php" class="menu-item">
                Gestão de Rotas
            </a>
            <a href="relatorios.php" class="menu-item">
                Relatórios e análises
            </a>
            <a href="notificacoes.php" class="menu-item notification-item">
                Notificações
                <span class="badge"></span> </a>
            <a href="monitoramento.php" class="menu-item">
                Monitoramento de manutenções
            </a>
        </div>

        <div class="navbar">
            <div class="nav-icon" id="nav-back">
                <i class="fas fa-arrow-left"></i> </div>
            <div class="nav-icon active" id="nav-home">
                <i class="fas fa-home"></i> </div>
            <div class="nav-icon" id="nav-forward">
                <i class="fas fa-arrow-right"></i> </div>
        </div>
    </div>

    <script src="../script/menu_script.js"></script>
</body>
</html>
