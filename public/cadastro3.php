<?php
session_start(); 

/
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "atvmath"; 

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


$message = "";
$address = $city = $state = $zip_code = "";


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $zip_code = $_POST['zip_code'];


    if (empty($address) || empty($city) || empty($state) || empty($zip_code)) {
        $message = "Todos os campos são obrigatórios.";
    } else {

        $address = $conn->real_escape_string($address);
        $city = $conn->real_escape_string($city);
        $state = $conn->real_escape_string($state);
        $zip_code = $conn->real_escape_string($zip_code);

       
        $sql = "INSERT INTO locations (address, city, state, zip_code) VALUES ('$address', '$city', '$state', '$zip_code')";
        if ($conn->query($sql) === TRUE) {
            $message = "Localização salva com sucesso! Prosseguindo para o próximo passo.";
            
            header("Location: cadastro4.php");
            exit();
        } else {
            $message = "Erro ao salvar: " . $conn->error;
        }
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro - Localização</title>
    <link rel="stylesheet" href="../style/cadastro3.css">
    <script src="../script/script.js"></script>
</head>

<body>

    <div>
        <img src="../img/unnamed.png" alt="Logo" width="420" height="250">
    </div>
    <div>
        <h1>Cadastro</h1>
    </div>
    <div>
        <h2>Sua Localização</h2>
        <?php if ($message): ?>
            <p style="color: red;"><?php echo $message; ?></p>
        <?php endif; ?>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="address">Endereço:</label>
            <input type="text" id="address" name="address" value="<?php echo $address; ?>" required><br><br>
            <label for="city">Cidade:</label>
            <input type="text" id="city" name="city" value="<?php echo $city; ?>" required><br><br>
            <label for="state">Estado:</label>
            <input type="text" id="state" name="state" value="<?php echo $state; ?>" required><br><br>
            <label for="zip_code">CEP:</label>
            <input type="text" id="zip_code" name="zip_code" value="<?php echo $zip_code; ?>" required><br><br>
            <button type="submit">Salvar Localização</button>
        </form>
        <div style="margin-top: 20px;">
            <a href="cadastro2.php" style="text-decoration: none; padding: 10px; background-color: #ccc;">Voltar</a>
            <a href="cadastro4.php" style="text-decoration: none; padding: 10px; background-color: #4CAF50; color: white;">Próximo</a>
        </div>
    </div>
    <div>
        <img src="../img/baradeCarregamento.png" alt="Loading Bar">
    </div>
</body>

</html>
