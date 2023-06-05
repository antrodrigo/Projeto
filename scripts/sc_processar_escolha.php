

// Conexão com o banco de dados
<?php
// conexão à base de dados
require_once "./connections/connection.php";
$link = new_db_connection();
?>

<?php


// Verifica a conexão
if ($link->connect_error) {
    die("Falha na conexão com o banco de dados: " . $link->connect_error);
}

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtém a escolha do usuário
    $avatarEscolhido = $_POST["avatar"];

    // Insere a escolha no banco de dados
    $escolha_avatar = "INSERT INTO usuarios (avatar_id) VALUES ('$avatarEscolhido')";
    if ($link->query($escolha_avatar) === TRUE) {
        echo "Escolha registrada com sucesso.";
    } else {
        echo "Erro ao registrar a escolha: " . $link->error;
    }
}

$link->close();

