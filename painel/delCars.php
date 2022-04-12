<?php 
include("../conexao/conecta.php");

if (isset($_GET['del'])) {

    $ids = $_GET['id'];

    $deletaDoc = "DELETE FROM cars WHERE id_cars=:ids";

        try {
            $deletar = $conexao->prepare($deletaDoc);
            $deletar->bindParam(':ids', $ids, PDO::PARAM_INT);
            $deletar->execute();
            $rows = $deletar->rowCount();

            if($rows > 0){
                echo'<script type="text/javascript">window.location.href = "listaCars.php"</script>';
            }

        }catch (PDOException $e) {}
}