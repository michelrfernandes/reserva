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
    if (isset($_POST['close'])) 
    {    
        $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);     

        $id = $post['id'];
        $km_e = $post['km_entrada'];
        $km_s = $post['km_saida'];
        $info = $post['info'];

        
        // $updates = "UPDATE reservas SET km_entrada=:km_entrada, km_saida=:km_saida WHERE id_reservas=:id";
        $updates = "UPDATE km_veiculo SET reservas_id=:reservas_id, km_inicial=:km_inicial, 
        km_final=:km_final, informacao=:informacao WHERE id_km=:id";

        try {

                $edith = $conexao->prepare($updates);
                $edith->bindParam(':km_entrada', $km_e, PDO::PARAM_STR);
                $edith->bindParam(':km_saida', $km_s, PDO::PARAM_STR);
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

