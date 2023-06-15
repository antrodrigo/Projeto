<?php
// conexão à base de dados
require_once "./connections/connection.php";
$link = new_db_connection();

// Função para calcular o custo da peça
function calcularCustoPeca($numeroPeca) {
    // Cálculo do custo com base no número da peça
    $custo = $numeroPeca * 100;
    return $custo;
}

// Verifica se foi recebido um ID de peça via requisição GET
if (isset($_GET['id_peca'])) {
    $idPeca = $_GET['id_peca'];


    // Por exemplo, pode ser uma resposta em formato JSON indicando o sucesso ou falha da operação
    $response = array('success' => true, 'message' => 'Peça interagida com sucesso!');
    echo json_encode($response);
} else {
    // Responda com um erro se nenhum ID de peça foi recebido
    $response = array('success' => false, 'message' => 'ID de peça não fornecido!');
    echo json_encode($response);
}
?>



