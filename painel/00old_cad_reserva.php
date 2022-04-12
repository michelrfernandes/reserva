<?php 
ob_start();
session_start();

if(!isset($_SESSION['senha'])){
  header("Location:../res_veiculos.php?aviso=error");
}

include("../conexao/conecta.php");
include("./logout.php");

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);  

$uuid = $post['idUser'];
$comentario = $post['comentario'];
$veiculo = $post['veiculo'];
$nome = $post['nome'];
$rodagem = $post['rodagem'];
$repeticao = $post['repeticao'];

$data_start = $post['data_start'];
$data_start = date('Y-m-d H:i:s', strtotime($data_start));

$duracao = $post['duracao'];
$data_end = '00-00-00';
$km_saida = '00000';
$situacao = 'Reservado';
$color = '#FF0000';

date_default_timezone_set('America/Manaus'); // CDT
$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];

if($date <= 9){
    $date = '0'.$date;
}

$current_date = "$year-$month-$date";
$current_hours = "$hour:$min:$sec";

$newDate = explode(' ', $data_start);
$newDateStart = $newDate[0];

if($newDateStart < $current_date){
    header("Location:res_veiculos.php?aviso=error");
    exit;
    die;
}

$placa = explode('-', $veiculo);
$placaVet = trim(@$placaVet = $placa[4]);

$timestamp2 = strtotime($data_start.'+'.$duracao.'hours');
$data_end = date('Y-m-d H:i:s', $timestamp2); 


// $listar = "SELECT * FROM reservas";
//  $queryUser = $conexao->prepare($listar);
//  $queryUser->execute();
//  while($linha = $queryUser->FETCH(PDO::FETCH_OBJ)){ 

//     $placa1 = explode('-', $linha->veiculo);
//     $placaCar1 = $placa1[4];
 
//     if($placaCar1 == $placaVet && $data_start == $linha->data_start || $placaCar1 == $placaVet && $data_start < $linha->data_end){
//         header("Location:res_veiculos.php?aviso=alerta");
//         exit;        
//     }    

// }

$horaMin = date('H:i:s', strtotime($data_start));
if($horaMin < '08:00:00'){
    header("Location:res_veiculos.php?aviso=s_horas");
    exit;
    die;
}

$listar = "SELECT * FROM reservas WHERE placa = '".$placaVet."'
AND :data_start BETWEEN data_start AND data_end
OR placa = '".$placaVet."' AND :data_end BETWEEN data_start AND data_end
OR placa = '".$placaVet."' AND (
    placa = '".$placaVet."' AND :data_start <= data_start 
    AND :data_end >= data_end
)";

$queryUser = $conexao->prepare($listar);
$queryUser->bindParam(':data_start', $data_start, PDO::PARAM_STR);
$queryUser->bindParam(':data_end', $data_end, PDO::PARAM_STR);
$queryUser->execute();
$contar = $queryUser->rowCount();
if($contar){
    header("Location:res_veiculos.php?aviso=alerta");
    exit;
    die;
}

(empty($rodagem) ? "000000" : $rodagem);



$incluir = "INSERT INTO reservas (id_users, veiculo, nome, placa, data_start, data_end, repeticao, duracao, km_entrada, km_saida, comentario, situacao, color) 
        VALUES (:idUser, :veiculo, :nome, :placa, :data_start, :data_end, :repeticao, :duracao, :rodagem, :km_saida, :comentario, :situacao, :color)";

try {

$query_inserir = $conexao->prepare($incluir);
$query_inserir->bindParam(':idUser', $uuid, PDO::PARAM_STR);
$query_inserir->bindParam(':veiculo', $veiculo, PDO::PARAM_STR);
$query_inserir->bindParam(':nome', $nome, PDO::PARAM_STR);
$query_inserir->bindParam(':placa', $placaVet, PDO::PARAM_STR);
$query_inserir->bindParam(':data_start', $data_start, PDO::PARAM_STR);
$query_inserir->bindParam(':data_end', $data_end, PDO::PARAM_STR);
$query_inserir->bindParam(':repeticao', $repeticao, PDO::PARAM_STR);
$query_inserir->bindParam(':duracao', $duracao, PDO::PARAM_STR);
$query_inserir->bindParam(':rodagem', $rodagem, PDO::PARAM_STR);
$query_inserir->bindParam(':km_saida', $km_saida, PDO::PARAM_STR);
$query_inserir->bindParam(':comentario', $comentario, PDO::PARAM_STR);
$query_inserir->bindParam(':situacao', $situacao, PDO::PARAM_STR);
$query_inserir->bindParam(':color', $color, PDO::PARAM_STR);
$query_inserir->execute();
$contar = $query_inserir->rowCount();

    if ($contar > 0) {

    header("Location:res_veiculos.php");

    } else {
        header("Location:res_veiculos.php?aviso=error");
    }

} catch (PDOException $e) {
    $e->getMessage();
}





