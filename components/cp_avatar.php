<?php
// conexão à base de dados
require_once "./connections/connection.php";
$link = new_db_connection();
?>


<h1 class="titulos">AVATAR</h1>
<p class="texto_grande">ESCOLHE O TEU AVATAR!</p>

<?php
// Consulta para buscar os avatares
$query = "SELECT * FROM avatar";
$result = $link->query($query);

// Verifica se há avatares disponíveis
if ($result->num_rows > 0) {
    $avatares = $result->fetch_all(MYSQLI_ASSOC);
    $totalAvatares = count($avatares);

    // Verifica se a requisição foi feita pelo usuário para atualizar o avatar
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $avatarIndex = $_POST["avatarIndex"];
    } else {
        // Define o índice inicial do avatar
        $avatarIndex = 0;
    }

    // Exibe o avatar atual
    $avatarAtual = $avatares[$avatarIndex];
    $avatarId = $avatarAtual['ID'];
    $avatarImagem = $avatarAtual['imagem'];

    echo "<img src='$avatarImagem'  width='100' height='100'><br>";

    // Exibe as setas para navegar entre os avatares
    echo "<form action='../scripts/sc_selecionar_avatar.php' method='post'>";
    echo "<input type='hidden' name='avatarIndex' value='$avatarIndex'>";
    echo "<input type='submit' name='anterior' value='&#8592;'>";
    echo "<input type='submit' name='proximo' value='&#8594;'>";
    echo "</form>";

    // Exibe o botão "Continuar" para enviar a escolha do usuário
    echo "<form action='../scripts/sc_processar_escolha.php' method='post'>";
    echo "<input type='hidden' name='avatar' value='$avatarId'>";
    echo "<input class='botão' type='submit' value='Continuar ->'>";
    echo "</form>";
} else {
    echo "Nenhum avatar encontrado.";
}

$link->close();
?>

