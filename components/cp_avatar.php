<?php
// conexão à base de dados
require_once "./connections/connection.php";
$link = new_db_connection();
?>


<h1 class="titulos">AVATAR</h1>
<p class="texto_grande">ESCOLHE O TEU AVATAR!</p>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        // Consulta para obter a lista de avatares (substitua 'tabela_avatares' pelo nome correto da tabela)
        $query = "SELECT * FROM avatar";
        $resultado = mysqli_query($link, $query);

        $active = true; // Variável para determinar a classe 'active' para o primeiro item do carrossel
        while ($avatar = mysqli_fetch_assoc($resultado)) {
            $caminho_imagem = "images/avatar_" . $avatar['id_avatar'] . ".png";
            echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
            echo '<img class="d-block w-100" src="' . $caminho_imagem . '" alt="Avatar" data-avatar-id="' . $avatar['id_avatar'] . '">';
            echo '</div>';

            $active = false; // Define a classe 'active' para o primeiro item do carrossel apenas
        }
        ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<form action="scripts/sc_guardar_avatar.php" method="POST">
    <!-- Campos do formulário (nome, email, username, password, etc.) -->
    <input type="hidden" name="id_avatar" id="id_avatar" value="">
    <button type="submit" class="botão">Continuar -></button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function() {
        $('.carousel').carousel();

        $('.carousel-control-prev').click(function() {
            $('.carousel').carousel('prev');
        });

        $('.carousel-control-next').click(function() {
            $('.carousel').carousel('next');
        });

        // Capturar o ID do avatar selecionado quando o formulário for enviado
        $('form').submit(function() {
            var avatarId = $('.carousel-item.active img').data('avatar-id');
            $('#id_avatar').val(avatarId);
        });
    });
</script>











