<?php
require_once "../connections/connection.php";

if (isset($_POST["nome"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $username = $_POST ['username'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $link = new_db_connection();

    // Verifica se o usuário já existe na BD pelo email ou login
    $query = "SELECT * FROM utilizadores WHERE email = ? OR username = ?";
    $stmt = mysqli_stmt_init($link);
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'ss', $email, $username);
        if (mysqli_stmt_execute($stmt)) {
            $result = mysqli_stmt_get_result($stmt);
            if (mysqli_num_rows($result) > 0) {
                // Se o usuário já existir na BD, exibe uma mensagem de erro
                header("Location: ../registo.php?msg=2");
                exit;
            }
        } else {
            // Ação de erro
            echo "Erro:" . mysqli_stmt_error($stmt);
            exit;
        }
    } else {
        // Ação de erro
        echo "Erro:" . mysqli_error($link);
        exit;
    }
    mysqli_stmt_close($stmt);

    // Insere o novo usuário na BD
    $stmt = mysqli_stmt_init($link);
    $query = "INSERT INTO utilizadores (nome, email, username, password_hash) VALUES (?,?,?,?)";
    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'ssss', $nome, $email, $username, $password_hash);
        if (mysqli_stmt_execute($stmt)) {
            // Redireciona o usuário para a página de avatar se o registro foi bem-sucedido
            $userId = mysqli_insert_id($link); // Obtém o ID do usuário recém-inserido

            // Inicia a sessão
            session_start();

            // Define a chave 'id_utilizador' na variável $_SESSION
            $_SESSION['id_utilizador'] = $userId;

            header("Location:../avatar.php?msg=3");
            exit;
        } else {
            // Ação de erro
            echo "Erro:" . mysqli_stmt_error($stmt);
            exit;
        }
    } else {
        // Ação de erro
        echo "Erro:" . mysqli_error($link);
        exit;
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);

} else {
    echo "Campos do formulário por preencher";
}
?>





