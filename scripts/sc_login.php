<?php
require_once "../connections/connection.php";
//var_dump($_POST);
if (isset($_POST["user"]) && isset($_POST["password"])) {
    $login = $_POST['user'];
    $password = $_POST['password'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT user, password_hash, ref_perfis, id_utilizadores FROM utilizadores WHERE user LIKE ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $user);

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $user, $password_hash, $perfil, $id_utilizadores);

            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $password_hash)) {
                    // Guardar sessão de utilizador
                    session_start();
                    $_SESSION["user"] = $user;
                    $_SESSION["ref_perfil"] = $perfil;
                    $_SESSION["id_utilizadores"] = $id_utilizadores;

                    // Feedback de sucesso
                    header("Location: ../index.php");
                } else {
                    // Password está errada
                    echo "Incorrect credentials!";
                    echo "<a href='../login.php'>Try again</a>";
                }
            } else {
                // Username não existe
                echo "Incorrect credentials!";
                echo "<a href='../login.php'>Try again</a>";
            }
        } else {
            // Acção de erro
            echo "Error:" . mysqli_stmt_error($stmt);
        }
    } else {
        // Acção de erro
        echo "Error:" . mysqli_error($link);
    }
    mysqli_stmt_close($stmt);
    mysqli_close($link);
} else {
    echo "Campos do formulário por preencher";
}
