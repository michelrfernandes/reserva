<?php 
ob_start();
session_start();

if(!isset($_SESSION['senha'])){
  header("Location:../index.php?aviso=error");
}

include("../conexao/conecta.php");
include("./logout.php");
?>


<?php 
    if (isset($_POST['editar'])) 
    {    
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);     

        $id = $post['id'];
        $nome = $post['nome'];
        $marca = $post['marca'];
        $motorizacao = $post['motor'];
        $ano = $post['ano'];       
        $modelo = $post['modelo'];       
        $placa = $post['placa'];       

        $anoModelo = $ano.'/'.$modelo;

        
        $updates = "UPDATE cars SET nome=:nome, marca=:marca, motorizacao=:motor, anomodelo=:ano, placa=:placa WHERE id_cars=:id";

        try {

                $edith = $conexao->prepare($updates);
                $edith->bindParam(':nome', $nome, PDO::PARAM_STR);
                $edith->bindParam(':marca', $marca, PDO::PARAM_STR);
                $edith->bindParam(':motor', $motorizacao, PDO::PARAM_STR);
                $edith->bindParam(':ano', $anoModelo, PDO::PARAM_STR);
                $edith->bindParam(':placa', $placa, PDO::PARAM_STR);
                $edith->bindParam(':id', $id, PDO::PARAM_STR);
                $edith->execute();
                $contar = $edith->rowCount();

                if ($contar > 0) {
                header("Location:listaCars.php");
                } else {
                    header("Location:listaCars.php.php?aviso=error");
                }

            } 
        catch (PDOException $e) {  $e->getMessage(); }
    }
?>

