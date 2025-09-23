<?php

$erro = "";
$nome = "";
$nascimento = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nome = trim($_POST["nome"]);
    $nascimento = trim($_POST["nascimento"]);


    if (empty($nome) || empty($nascimento)) {
        $erro = "Preencha todos os campos!";
    } elseif (!preg_match("/^\d{2}\/\d{2}\/\d{4}$/", $nascimento)) {
        $erro = "Data de nascimento inválida. Use o formato dd/mm/aaaa.";
    } else {

        header("Location: sucesso.php");
        exit();
      }

    }

echo '<!DOCTYPE html>';
echo '<html lang="pt-BR">';
echo '<head>';
echo '  <meta charset="UTF-8">';
echo '  <meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '  <title>Cadastro - PagTrem</title>';
echo '  <link rel="stylesheet" href="../style/cadastro2.css">';
echo '</head>';
echo '<body>';
echo '  <div class="container">';
echo '    <div class="top-logo">';
echo '      <img src="https://img.icons8.com/ios-filled/50/train.png" alt="Trem">';
echo '    </div>';
echo '    <h2>Cadastro</h2>';
echo '    <form id="cadastroForm" method="POST" action="">';
echo '      <label for="nome">Nome:</label>';
echo '      <input type="text" id="nome" name="nome" placeholder="Digite aqui..." value="' . htmlspecialchars($nome) . '" required>';
echo '      <label for="nascimento">Data de nascimento:</label>';
echo '      <input type="text" id="nascimento" name="nascimento" placeholder="dd / mm / aaaa" value="' . htmlspecialchars($nascimento) . '" required>';
echo '      <div id="mensagemErro" class="erro">';
if (!empty($erro)) {
    echo $erro;
}
echo '      </div>';
echo '      <button type="submit">Próximo</button>';
echo '    </form>';
echo '    <div class="indicadores">';
echo '      <div class="ativo"></div>';
echo '      <div></div>';
echo '      <div></div>';
echo '    </div>';
echo '    <div class="navegacao">';
echo '      <button>&larr;</button>';
echo '      <button>&#8962;</button>';
echo '      <button>&rarr;</button>';
echo '    </div>';
echo '  </div>';
echo '  <script src="../script/script.js"></script>';
echo '</body>';
echo '</html>';
?>
