<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$success_message = "";
$error_message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $foto = $_FILES['foto'];

    if ($foto['error'] != 0) {
        $error_message = "Por favor, selecione uma foto.";
    } else {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        $check = getimagesize($foto["tmp_name"]);
        if ($check === false) {
            $error_message = "O arquivo não é uma imagem.";
        } elseif ($foto["size"] > 5000000) {
            $error_message = "O arquivo é muito grande.";
        } elseif (!in_array($imageFileType, ["jpg", "png", "jpeg", "gif"])) {
            $error_message = "Apenas arquivos JPG, JPEG, PNG e GIF são permitidos.";
        } else {
            if (move_uploaded_file($foto["tmp_name"], $target_file)) {
                $success_message = "Foto enviada com sucesso! Cadastro concluído.";
                header("Location: dashboard.php");
                exit();
            } else {
                $error_message = "Erro ao fazer upload da foto.";
            }
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Foto de Perfil</title>
    <link rel="stylesheet" href="../style/cadastro4.css">
</head>
<body>
    <div>
        <img src="../img/unnamed.png" alt="Logo" width="420" height="250">
    </div>
    <div>
        <h1>Cadastro</h1>
    </div>
    <div>
        <img src="../img/icone.png" alt="Icone" width="200" height="205">
    </div>
    <div>
        <h2>Selecione uma foto de perfil uniformizado.</h2>
        <?php if ($success_message): ?>
            <div style="color: green;"><?php echo $success_message; ?></div>
        <?php endif; ?>
        <?php if ($error_message): ?>
            <div style="color: red;"><?php echo $error_message; ?></div>
        <?php endif; ?>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="foto">Foto de perfil:</label>
            <input type="file" id="foto" name="foto" accept="image/*" required>
            <div class="nav">
                <a href="cadastro3.php" style="text-decoration: none; padding: 10px; background-color: #ccc;">Voltar</a>
                <input type="submit" value="Concluir Cadastro">
            </div>
        </form>
    </div>
    <script src="../script/script.js"></script>
</body>
</html>
