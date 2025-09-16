<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro</title>
    <link rel="stylesheet" href="../style/cadastro1.css">
</head>
<body>

    <form class="container" id="tela1" action="process.php" method="post">
        <h1>Cadastro</h1>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" placeholder="Digite aqui...">
        <label for="nascimento">Data de nascimento:</label>
        <input type="date" id="nascimento" name="nascimento">
        <div class="nav">
            <button type="button" onclick="proximaTela(1)">➜</button>
        </div>
    </form>

    <form class="container hidden" id="tela2" action="process.php" method="post">
        <h1>Cadastro</h1>
        <label for="localizacao">Sua localização:</label>
        <select id="localizacao" name="localizacao">
            <option value="">Clique aqui</option>
            <option value="SP">São Paulo</option>
            <option value="RJ">Rio de Janeiro</option>
            <option value="MG">Minas Gerais</option>
        </select>
        <div class="nav">
            <button type="button" onclick="voltarTela(1)">⬅</button>
            <button type="button" onclick="proximaTela(2)">➜</button>
        </div>
    </form>

    <form class="container hidden" id="tela3" action="process.php" method="post" enctype="multipart/form-data">
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