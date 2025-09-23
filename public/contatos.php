<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit();
}


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_db";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$sql = "SELECT username, nome, cargo FROM ususarios ORDER BY username";
$result = $conn->query($sql);
$contacts = $result->fetch_all(MYSQLI_ASSOC);
$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contatos</title>
  <link rel="stylesheet" href="../style/contatos.css">
</head>

<body>
  <div class="logo">
    <img src="../img/unnamed.png" alt="Logo" width="420" height="250">
  </div>
  <div class="info">
    <h1>Contatos</h1>
    <p>Clique para conversar com o suporte</p>
    <ul>
      <?php foreach ($contacts as $contact): ?>
        <li><?php echo htmlspecialchars($contact['nome'] ?: $contact['username']) . ' (' . $contact['cargo'] . ')'; ?></li>
      <?php endforeach; ?>
    </ul>
    <a href="chat.php">Ir para o Chat</a>
  </div>
</body>

</html>
