<?php

$title = "Email Não Encontrado";
$message = "E-mail não encontrada, verifique se preencheu os dados corretamente.";
$logoPath = "../img/icone pagtrem-Photoroom.png";
$cssPath = "../style/emailnaoencontrado.css";


session_start();
if (isset($_SESSION['error'])) {
    $message = $_SESSION['error'];
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($title); ?></title>
    <link rel="stylesheet" href="<?php echo htmlspecialchars($cssPath); ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="<?php echo htmlspecialchars($logoPath); ?>" alt="Logo">
        </div>
        <div class="content">
            <div class="message-icons">
                <i class="far fa-envelope"></i>
                <i class="fas fa-times-circle error-icon"></i>
            </div>
            <p><?php echo htmlspecialchars($message); ?></p>
            <a href="login.php" class="try-again-btn">Tentar Novamente</a>
        </div>
        <div class="footer-navigation">
            <a href="javascript:history.back()" class="nav-link"><i class="fas fa-arrow-left"></i></a>
            <a href="telaInicial.php" class="nav-link"><i class="fas fa-home"></i></a>
            <a href="recuperaçãodesenha.php" class="nav-link"><i class="fas fa-arrow-right"></i></a>
        </div>
    </div>
</body>
</html>
