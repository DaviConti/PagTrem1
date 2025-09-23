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
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $localizacao = $_POST['localizacao'];
    $foto = $_FILES['foto'];

    
    if (empty($nome) || empty($nascimento) || empty($localizacao) || $foto['error'] != 0) {
        $error_message = "Por favor, preencha todos os campos e selecione uma foto.";
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
               
                $sql = "INSERT INTO ususarios (nome, nascimento, localizacao, foto) VALUES (?, ?, ?, ?)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param("ssss", $nome, $nascimento, $localizacao, $target_file);

                if ($stmt->execute()) {
                    $success_message = "Cadastro realizado com sucesso!";
                } else {
                    $error_message = "Erro ao cadastrar: " . $conn->error;
                }
                $stmt->close();
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
    <title>Cadastro</title>
    <link rel="stylesheet" href="../style/cadastro1.css">
</head>
<body>
    <?php if ($success_message): ?>
        <div style="color: green;"><?php echo $success_message; ?></div>
    <?php endif; ?>
    <?php if ($error_message): ?>
        <div style="color: red;"><?php echo $error_message; ?></div>
    <?php endif; ?>

    <form class="container" id="tela1" action="" method="post" enctype="multipart/form-data">
        <h1>Cadastro</h1>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite aqui..." value="<?php echo isset($_POST['nome']) ? $_POST['nome'] : ''; ?>">
        <label for="nascimento">Data de nascimento:</label>
        <input type="date" id="nascimento" name="nascimento" value="<?php echo isset($_POST['nascimento']) ? $_POST['nascimento'] : ''; ?>">
        <div class="nav">
            <button type="button" onclick="proximaTela(1)">➜</button>
        </div>
    </form>

    <form class="container hidden" id="tela2" action="" method="post" enctype="multipart/form-data">
        <h1>Cadastro</h1>
        <label for="localizacao">Sua localização:</label>
        <select id="localizacao" name="localizacao">
            <option value="">Clique aqui</option>
            <option value="SP" <?php echo (isset($_POST['localizacao']) && $_POST['localizacao'] == 'SP') ? 'selected' : ''; ?>>São Paulo</option>
            <option value="RJ" <?php echo (isset($_POST['localizacao']) && $_POST['localizacao'] == 'RJ') ? 'selected' : ''; ?>>Rio de Janeiro</option>
            <option value="MG" <?php echo (isset($_POST['localizacao']) && $_POST['localizacao'] == 'MG') ? 'selected' : ''; ?>>Minas Gerais</option>
        </select>
        <div class="nav">
            <button type="button" onclick="voltarTela(1)">⬅</button>
            <button type="button" onclick="proximaTela(2)">➜</button>
        </div>
    </form>

    <form class="container hidden" id="tela3" action="" method="post" enctype="multipart/form-data">
        <h1>Cadastro</h1>
        <label for="foto">Foto de perfil uniformizado:</label>
        <input type="file" id="foto" name="foto" accept="image/*">
        <div class="nav">
            <button type="button" onclick="voltarTela(2)">⬅</button>
            <input type="submit" value="Continuar">
        </div>
    </form>

    <script src="../script/script.js"></script>
</body>
</html>
