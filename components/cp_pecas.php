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

<h1>Carrossel de Peças</h1>

<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        $active = true; // Variável para determinar a classe 'active' para o primeiro item do carrossel

        foreach ($pecas as $peca) {
            // Verifica se a chave "estado_fase" existe e se a fase da peça está concluída
            $faseConcluida = isset($peca['estado_fase']) && $peca['estado_fase'] === '1';

            echo '<div class="carousel-item' . ($active ? ' active' : '') . '">';
            echo '<img class="d-block w-100" src="' . ($faseConcluida ? $peca['img_ativa'] : $peca['img_bloq']) . '" alt="' . $peca['nome'] . '">';
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

<script src="https://code.jquery

