<?php
// conexão à base de dados
require_once "connections/connection.php";
$link = new_db_connection();
?>

<section class="sec-filmes pb-5" id="lista-filmes">
    <div class="container px-lg-5 pt-3">


        <form class="col-6" action="./scripts/sc_registo.php" method="post" class="was-validated">
            <div class="mb-3 mt-3">
                <label for="uname" class="form-label">Nome:</label>
                <input type="text" class="form-control" id="nome"
                       placeholder="Enter name" name="nome" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="mb-3 mt-3">
                <label for="uname" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email"
                       placeholder="Enter email" name="email" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="mb-3 mt-3">
                <label for="uname" class="form-label">Username:</label>
                <input type="text" class="form-control" id="username"
                       placeholder="Enter username" name="username" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <div class="mb-3">
                <label for="pwd" class="form-label">Password:</label>
                <input type="password" class="form-control" id="password"
                       placeholder="Enter password" name="password" required>
                <div class="valid-feedback">Valid.</div>
                <div class="invalid-feedback">Please fill out this field.</div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
        <?php
        if (isset($_GET["msg"])) {
            $msg = $_GET["msg"];
            switch ($msg) {
                case 1:
                    header('Location: avatar.php');
                    $feedback_msg = "Registo efetuado com sucesso, agora podes escolher o teu avatar!";
                    break;
                case 2:
                    $feedback_msg = "Ocorreu um erro durante o registo";
                    break;
                default:
                    $feedback_msg = "";
                    break;
            }
        } else {
            $feedback_msg = "";
        }
        ?>
        <br>
        <?php
        if (!empty($feedback_msg)) {
            echo "<p>$feedback_msg</p>";
        }
        ?>
