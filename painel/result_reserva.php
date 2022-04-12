<?php 
ob_start();
session_start();

if(!isset($_SESSION['senha'])){
  header("Location:../index.php?aviso=error");
}

include("../conexao/conecta.php");
include("./logout.php");


  // $sql = "SELECT r.id_reservas, r.id_users, r.veiculo, r.data_start, r.repeticao, r.data_end, 
  // r.duracao, r.km_entrada, r.km_saida, r.comentario, r.situacao, r.color, u.id_users, u.nome
  //  FROM reservas as r  INNER JOIN usuarios as u on r.id_users = u.id_users"; 


  // $sql = "SELECT * FROM reservas WHERE situacao = 'Reservado'"; 
  $sql = "SELECT * FROM reservas"; 

try {
    
    $query = $conexao->prepare($sql);
    $query->execute();

    $reservas = [];

    while($dados = $query->fetch(PDO::FETCH_OBJ)){

      
      $id = $dados->id_reservas;
      $id_users = $dados->id_users;
      $veiculo = $dados->veiculo;
      $color = $dados->color;
      $start = $dados->data_start;          
      $end = $dados->data_end;
      $nome = $dados->nome;
      //$nome = $_SESSION['username'];
      $duracao = $dados->duracao;
      $repeticao = $dados->repeticao;
      $situacao = $dados->situacao;
      $kmInicial = $dados->km_entrada;
      $kmFinal = $dados->km_saida;
      $comentario = $dados->comentario;

            
        $reservas[] = [
            'id' => $id, 
            'title' => $veiculo, 
            'color' => $color, 
            'start' => $start, 
            'end' => $end, 
            'extendedProps' => [
              'id_users' => $id_users,              
              'nome' => $nome,
              'duracao' => $duracao." horas",
              'repeticao' => $repeticao,
              'kmInicial' => $kmInicial,
              'kmFinal' => $kmFinal,
              'comentario' => $comentario,
              'situacao' => $situacao,              
              'colors' => $color             
            ]  
        ];
        
    }

    echo json_encode($reservas);
 
    } 
    catch (PDOexception $error_sql){ 
        echo 'Erro ao retornar os Dados.'.$error_sql->getMessage();
    }

?>
    

