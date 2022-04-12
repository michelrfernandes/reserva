<?php 
ob_start();
session_start();

if(!isset($_SESSION['senha'])){
  header("Location:../salas.php?aviso=error");
}

include("../conexao/conecta.php");
include("./logout.php");

$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);  

$uuid = $post['idUser'];
$comentario = $post['comentario'];
$nome = $post['nome'];
$departamento = $post['departamento'];
$ambiente = $post['ambiente'];
$repeticao = $post['repeticao'];
$data_start = $post['data_start'];
// $data_start = date('Y-m-d H:i:s', strtotime($data_start));
// $duracao = $post['duracao'];
// $situacao = 'Reservado';
// $color = '#FF0000';

// $data_start = date('Y-m-d H:i:s', strtotime($data_start));
// $horasDate = date('H:i:s', strtotime($data_start));


$duracao = $post['duracao'];
$data_end = '00-00-00';
$situacao = 'Reservado';
$color = '#FF0000';

(empty($repeticao)? "1" : $repeticao);


//FORMATACAO DATA
date_default_timezone_set('America/Manaus'); // CDT
$info = getdate();
$date = $info['mday'];
$month = $info['mon'];
$year = $info['year'];
$hour = $info['hours'];
$min = $info['minutes'];
$sec = $info['seconds'];

// if($date <= 9){
//     $date = '0'.$date;
// }

// $current_date = "$year-$month-$date";
// $current_hours = "$hour:$min:$sec";

// $newDate = explode(' ', $data_start);
// $newDateStart = $newDate[0];

// if($newDateStart < $current_date){
//     header("Location:res_veiculos.php?aviso=error");
//     exit;
//     die;
// }

$Nzero = intval("0");
$date < 10 ? $date = $Nzero.$date : $date;

$month < 10 ? $month = $Nzero.$month : $month;

$current_date = "$year-$month-$date";
$current_hours = "$hour:$min:$sec";

$newDate = explode(' ', $data_start);
$newDateStart = $newDate[0];


if($newDateStart < $current_date){
    header("Location:res_veiculos.php?aviso=error");
    exit;
    die;
}

$timestamp2 = strtotime($data_start.'+'.$duracao.'hours');
$data_end = date('Y-m-d H:i:s', $timestamp2); 

$horaMin = date('H:i:s', strtotime($data_start));
//exit;

if($horaMin < '08:00:00'){
    header("Location:salas.php?aviso=s_horas");
    exit;
    die;
}


$listar = "SELECT * FROM reservas_salas WHERE sala = '".$ambiente."'
AND :data_start BETWEEN data_start AND data_end
OR sala = '".$ambiente."' AND :data_end BETWEEN data_start AND data_end
OR sala = '".$ambiente."' AND (
    sala = '".$ambiente."' AND :data_start <= data_start 
    AND :data_end >= data_end
)";

$queryUser = $conexao->prepare($listar);
$queryUser->bindParam(':data_start', $data_start, PDO::PARAM_STR);
$queryUser->bindParam(':data_end', $data_end, PDO::PARAM_STR);
$queryUser->execute();
$contar = $queryUser->rowCount();
if($contar){
    header("Location:salas.php?aviso=s_error");
    exit;
    die;
}

$incluir = "INSERT INTO reservas_salas (id_users, nome, sala, departamento, data_start, data_end, repeticao, duracao, comentario, situacao, color) 
        VALUES (:idUser, :nome, :sala, :departamento, :data_start, :data_end, :repeticao, :duracao, :comentario, :situacao, :color)";

try {

$query_inserir = $conexao->prepare($incluir);
$query_inserir->bindParam(':idUser', $uuid, PDO::PARAM_STR);
$query_inserir->bindParam(':nome', $nome, PDO::PARAM_STR);
$query_inserir->bindParam(':sala', $ambiente, PDO::PARAM_STR);
$query_inserir->bindParam(':departamento', $departamento, PDO::PARAM_STR);
$query_inserir->bindParam(':data_start', $data_start, PDO::PARAM_STR);
$query_inserir->bindParam(':data_end', $data_end, PDO::PARAM_STR);
$query_inserir->bindParam(':repeticao', $repeticao, PDO::PARAM_STR);
$query_inserir->bindParam(':duracao', $duracao, PDO::PARAM_STR);
$query_inserir->bindParam(':comentario', $comentario, PDO::PARAM_STR);
$query_inserir->bindParam(':situacao', $situacao, PDO::PARAM_STR);
$query_inserir->bindParam(':color', $color, PDO::PARAM_STR);
$query_inserir->execute();
$contar = $query_inserir->rowCount();

    if ($contar > 0) {

    header("Location:salas.php");

    } else {
        header("Location:salas.php?aviso=error");
    }

} catch (PDOException $e) {
    $e->getMessage();
}





