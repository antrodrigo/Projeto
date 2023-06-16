<?php
require_once "../connections/connection.php";
session_start(); // Iniciar a sessão

if (isset($_POST["id_avatar"])) {
    $avatarId = $_POST["id_avatar"];

    $link = new_db_connection();

    // Verificar se o avatar existe
    $query_avatar = "SELECT id_avatar FROM avatar WHERE id_avatar = ?";
    $stmt_avatar = mysqli_stmt_init($link);

    if (mysqli_stmt_prepare($stmt_avatar, $query_avatar)) {
        mysqli_stmt_bind_param($stmt_avatar, 'i', $avatarId);
        mysqli_stmt_execute($stmt_avatar);
        mysqli_stmt_store_result($stmt_avatar);
        $avatarExists = mysqli_stmt_num_rows($stmt_avatar) > 0;
        mysqli_stmt_close($stmt_avatar);

        if ($avatarExists) {
            // Avatar existe, atualizar o ID do avatar para o usuário recém-registrado
            $userId = $_SESSION['id_utilizador']; // Obtenha o ID do usuário recém-registrado

            $query_update = "UPDATE utilizadores SET avatar_id_avatar = ? WHERE id_utilizador = ?";
            $stmt_update = mysqli_stmt_init($link);

            if (mysqli_stmt_prepare($stmt_update, $query_update)) {
                mysqli_stmt_bind_param($stmt_update, 'ii', $avatarId, $userId);

                if (mysqli_stmt_execute($stmt_update)) {
                    header("Location: ../login.php");

                } else {
                    echo "Erro ao associar o avatar ao usuário: " . mysqli_stmt_error($stmt_update);
                }

                mysqli_stmt_close($stmt_update);
            } else {
                echo "Erro na preparação da declaração: " . mysqli_error($link);
            }
        } else {
            echo "O avatar selecionado não existe.";
        }
    } else {
        echo "Erro na consulta do avatar: " . mysqli_error($link);
    }

    mysqli_close($link);
} else {
    echo "ID do avatar não foi fornecido.";
}
?>


