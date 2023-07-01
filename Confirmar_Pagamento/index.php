<div style="width:100vw; height: 100vh; display: flex;justify-content: center; align-items: center;">
    <img style="width: 10%;" src="https://i.gifer.com/origin/34/34338d26023e5515f6cc8969aa027bca_w200.gif" alt="" srcset="">
</div>
<?php
$url_id = 'http://127.0.0.1:8000/order'; // Substitua isso pela URL correta da API
$data_Status = array(
    "status" => 0,
    "id_dono" => 4,
    "id_user" => $_POST['id_user']
);
$ch = curl_init($url_id);

// Configurações da solicitação
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data_Status));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Envia a solicitação
$response = curl_exec($ch);

// Fecha a conexão
curl_close($ch);

if ($response === FALSE) {
    die('Error: ' . curl_error($ch));
}

$responseData = json_decode($response, true);
$id_order = 0;
if (isset($responseData['id'])) {
    $id_order = $responseData['id'];
    echo $id_order;
} else {
    echo 'ID not found in the response';
}

$url = 'http://127.0.0.1:8000/calendarPost'; // Substitua isso pela URL correta da API

$idStay = $_POST['id_stay'];
$id_user = $_POST['id_user'];
$datainicio = $_POST['date_entrada'];
$datasaida = $_POST['date_saida'];
$valorFinal = $_POST['price_total'];
$taxa = $_POST['taxa_servico'];
$price_day = $_POST['price_day'];
$limpeza = $_POST['taxa_limpeza'];

$data = array(
    'id_user' => $id_user, // Substitua por valores reais
    'id_stay' => $idStay, // Substitua por valores reais
    'date_entrada' => $datainicio, // Substitua por valores reais
    'date_saida' => $datasaida, // Substitua por valores reais
    'price_day' => $price_day, // Substitua por valores reais
    'price_total' => $valorFinal, // Substitua por valores reais
    'order_id' => $id_order, // Substitua por valores reais
    'taxa_limpeza' => $limpeza, // Substitua por valores reais
    'taxa_servico' => $taxa // Substitua por valores reais
);

$ch = curl_init($url);

// Configurações da solicitação
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));

// Envia a solicitação
$response = curl_exec($ch);

// Fecha a conexão
curl_close($ch);

if ($response === FALSE) {
    die('Error: ' . curl_error($ch));
} else {
    header("Location: ../minhas_reservas.php?comprovate_id=" . $id_order);
}
