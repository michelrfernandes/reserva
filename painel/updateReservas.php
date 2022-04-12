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
        $km_e = $post['km_entrada'];
        $km_s = $post['km_saida'];
        $situacao = $post['situacao'];
        $info = $post['info'];

        if($situacao == 'Reservador'){
            $color = '#FF0000';
        } else{
             $color = '#36b9cc';
        } 
        
        $updates = "UPDATE reservas SET km_entrada=:km_entrada, km_saida=:km_saida, 
        informacao=:informacao, situacao=:situacao, color=:color WHERE id_reservas=:id";

        try {

                $edith = $conexao->prepare($updates);
                $edith->bindParam(':km_entrada', $km_e, PDO::PARAM_STR);
                $edith->bindParam(':km_saida', $km_s, PDO::PARAM_STR);
                $edith->bindParam(':informacao', $info, PDO::PARAM_STR);
                $edith->bindParam(':situacao', $situacao, PDO::PARAM_STR);
                $edith->bindParam(':color', $color, PDO::PARAM_STR);
                $edith->bindParam(':id', $id, PDO::PARAM_STR);
                $edith->execute();
                $contar = $edith->rowCount();

                if ($contar > 0) {
                header("Location:listaReservas.php");
                } else {
                    header("Location:listaReservas.php.php?aviso=error");
                }

            } 
        catch (PDOException $e) {  $e->getMessage(); }
    }
?>

