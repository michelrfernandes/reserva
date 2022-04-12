<?php 
ob_start();
session_start();

if(!isset($_SESSION['senha'])){
  header("Location:../index.php?aviso=error");
}

include("../conexao/conecta.php");
include("./logout.php");


$placa = trim(@$_GET['placa']);
  
$sql = "SELECT * FROM reservas WHERE placa = '".$placa."' ORDER BY km_saida DESC LIMIT 1";     
$query = $conexao->prepare($sql);
$query->execute();
$dados = $query->fetch(PDO::FETCH_OBJ);  
$cont = $query->rowCount(); 

if($cont > 0){
    $km = $dados->km_saida;
} else {
    $km = '0000';
}    
    echo json_encode($km); 

// ?>
    

