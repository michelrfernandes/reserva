<?php 
ob_start();
session_start();

if(!isset($_SESSION['senha'])){
  header("Location:../index.php?aviso=error");
}

include("../conexao/conecta.php");
include("./logout.php");


  // $sql = "SELECT r.id_reservas, r.id_users, r.sala, r.departamento, r.data_start, r.repeticao, r.data_end, 
  // r.duracao, r.comentario, r.situacao, r.color, u.id_users, u.nome
  //  FROM reservas_salas as r  INNER JOIN usuarios as u on r.id_users = u.id_users"; 

  $sql = "SELECT * FROM reservas_salas"; 

try {
    
    $query = $conexao->prepare($sql);
    $query->execute();

    $reservas = [];

    while($dados = $query->fetch(PDO::FETCH_OBJ)){

      
      $id = $dados->id_reservas;
      $id_users = $dados->id_users;
      $sala = $dados->sala;
      $color = $dados->color;
      $start = $dados->data_start;          
      $end = $dados->data_end;
      $nome = $dados->nome;
      $departamento = $dados->departamento;
      $duracao = $dados->duracao;
      $repeticao = $dados->repeticao;
      $situacao = $dados->situacao;
      $comentario = $dados->comentario;

      $sala = ($sala == 'G' ? 'Sala de Reunião Grande' : 'Sala de Reunião Pequena');
     
        $reservas[] = [
            'id' => $id, 
            'title' => $nome, 
            'color' => $color, 
            'start' => $start, 
            'end' => $end, 
            'extendedProps' => [
              'id_users' => $id_users,              
              'sala' => $sala,
              'departamento' => $departamento,
              'duracao' => $duracao." horas",
              'repeticao' => $repeticao,
              'comentario' => $comentario,
              'situacao' => $situacao,              
              'colors' => $color,              
            ]  
        ];
        
    }

    echo json_encode($reservas);
 
    } 
    catch (PDOexception $error_sql){ 
        echo 'Erro ao retornar os Dados.'.$error_sql->getMessage();
    }

?>
    

