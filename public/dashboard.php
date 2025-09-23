<?php
session_start();

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Include database connection
include '../config/db.php';

// Fetch categories from database (assuming a 'categories' table)
$sql = "SELECT name FROM categories ORDER BY name";
$result = $conn->query($sql);

$categories = [];
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $categories[] = htmlspecialchars($row['name']);
    }
} else {
    $categories = ["Monotrilhos", "De passageiros", "Trens militarizados"]; // Fallback if no data
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/dashboard.css">
</head>
<body>
    <div class="container">
        <?php include '../public/menu.php'; ?>
        <header class="header">
            <div class="logo">
                <img src="../img/icone pagtrem-Photoroom.png" alt="Trem Icone">
            </div>
            <h1>Dashboard</h1>
        </header>
        <main class="main-content">
            <?php foreach ($categories as $category): ?>
                <button class="button" onclick="alert('Categoria: <?php echo $category; ?>')"><?php echo $category; ?></button>
            <?php endforeach; ?>
        </main>
        <footer class="footer">
            <a href="telaInicial.php" class="nav-icon">&leftarrow;</a>
            <a href="relatorios.php" class="nav-icon">&rightarrow;</a>
        </footer>
    </div>
</body>
</html>
