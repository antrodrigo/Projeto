<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém o índice do avatar atual
    $avatarIndex = $_POST["avatarIndex"];

    if (isset($_POST['anterior'])) {
        // Se o usuário clicou na seta "anterior", decrementa o índice
        $avatarIndex--;
    } elseif (isset($_POST['proximo'])) {
        // Se o usuário clicou na seta "próximo", incrementa o índice
        $avatarIndex++;
    }

    // Redireciona o usuário de volta para o script principal com o índice atualizado
    header("Location: index.php?avatarIndex=$avatarIndex");
    exit();
} else {
    // Se não houver requisição POST, redireciona o usuário de volta para o script principal
    header("Location: index.php");
    exit();
}
?>

