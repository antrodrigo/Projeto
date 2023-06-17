<?php
require_once "connections/connection.php";

$link = new_db_connection();

// Consulta para obter a lista de peças
$query = "SELECT * FROM pecas";
$resultado = mysqli_query($link, $query);

$pecas = array(); // Array para armazenar as peças
while ($row = mysqli_fetch_assoc($resultado)) {
    $pecas[] = $row;
}
?>

<h1 class="titulos">PECAS</h1>
<p class="texto_grande">QUANTO MELHOR AS TUAS PEÇAS, MAIS PESSOAS CONSEGUIRÁS SALVAR</p>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        $active = true; // Variável para determinar a classe 'active' para o primeiro item do carrossel

        foreach ($pecas as $peca) {
            // Verifica se a chave "estado_fase" existe e se a fase da peça está concluída
            $faseConcluida = isset($peca['estado_fase']) && $peca['estado_fase'] === '1';

            $imgAtiva = 'images/' . $peca['img_ativa']; // Caminho completo da imagem ativa
            $imgBloq = 'images/' . $peca['img_bloq']; // Caminho completo da imagem bloqueada
            $cadeado_bloq = 'images/cadeado_bloqueado.png';
            $cadeado_desbloq= 'images/cadeado_desbloc.png';



            echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
            echo '<div class="center-image-container">';
            echo '<img class="d-block center_image" src="' . ($faseConcluida ? $imgAtiva : $imgBloq) . '" alt="' . $peca['nome'] . '">';
            echo '<p class="texto_grande">' . $peca['nome'] . '</p>';
            echo '</div>';
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
    });
</script>




