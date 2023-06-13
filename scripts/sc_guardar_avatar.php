<?php
// Verifique se o campo "id_avatar" existe no formulário
if (isset($_POST["id_avatar"])) {
    $ID = $_POST["id_avatar"];
    $IMAGEM = $_POST["imagem"];

    // Crie uma nova conexão com o banco de dados
    $link = new_db_connection();

    // Crie uma declaração preparada
    $stmt = mysqli_stmt_init($link);

    // Defina a consulta SQL para atualizar o ID do avatar escolhido na tabela usuarios
    $query = "UPDATE usuarios SET id_avatar = ? WHERE id = ?";

    if (mysqli_stmt_prepare($stmt, $query)) {
        // Vincule os parâmetros
        mysqli_stmt_bind_param($stmt, "ii", $ID, $ID_USUARIO);

        // Execute a declaração preparada
        if (!mysqli_stmt_execute($stmt)) {
            echo "Error: " . mysqli_stmt_error($stmt);
        }

        // Feche a declaração
        mysqli_stmt_close($stmt);
    } else {
        echo "Error description: " . mysqli_error($link);
    }

    // Feche a conexão com o banco de dados
    mysqli_close($link);

    // Redirecione o usuário para a página index.php
    header("Location: ../index.php");
    exit(); // Certifique-se de incluir exit() para interromper a execução do script após o redirecionamento
}
?>





