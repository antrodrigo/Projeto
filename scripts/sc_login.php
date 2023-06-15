<?php
require_once "../connections/connection.php";
//var_dump($_POST);
if (isset($_POST["username"]) && isset($_POST["password"])) {
    $login = $_POST['username'];
    $password = $_POST['password'];

    $link = new_db_connection();

    $stmt = mysqli_stmt_init($link);

    $query = "SELECT username, hash, ref_id_perfil, ref_id_avatar FROM utilizadores WHERE username LIKE ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        mysqli_stmt_bind_param($stmt, 's', $username);

        if (mysqli_stmt_execute($stmt)) {

            mysqli_stmt_bind_result($stmt, $username, $hash, $ref_id_perfil, $ref_id_avatar);

            if (mysqli_stmt_fetch($stmt)) {
                if (password_verify($password, $hash)) {
                    // Guardar sessão de utilizador
                    session_start();
                    $_SESSION["user"] = $username;
                    $_SESSION["ref_id_perfil"] = $ref_id_perfil;
                    $_SESSION["ref_id_avatar"] = $ref_id_avatar;

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
