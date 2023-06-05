<?php
require_once "../connections/connection.php";
var_dump($_POST);
if (isset($_POST["name"]) && isset($_POST["email"]) && isset($_POST["login"]) && isset($_POST["password"])) {
    $nome = $_POST['name'];
    $email = $_POST['email'];
    $login = $_POST['login'];
    $password_hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);
    // Antes de inserir deve fazer-se uma consulta à BD para verificar se o username ou email já existem na BD

    $query = "INSERT INTO utilizadores (nome, login, email, password_hash) VALUES (?,?,?,?)";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 'ssss', $nome, $login, $email, $password_hash);

        // Devemos validar também o resultado do execute!
        if (mysqli_stmt_execute($stmt)) {
            // Ação de sucesso
            header("Location: ../index.php");
            exit();
        } else {
            // Ação de erro
            echo "Error:" . mysqli_stmt_error($stmt);
        }
    } else {
        // Ação de erro
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    echo "Campos do formulário por preencher";
}
?>
