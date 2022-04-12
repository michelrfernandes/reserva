<?php 
include("../conexao/conecta.php");

if (isset($_GET['del'])) {

    $ids = $_GET['id'];

    $deletaDoc = "DELETE FROM reservas WHERE id_reservas=:ids";

        try {
            $deletar = $conexao->prepare($deletaDoc);
            $deletar->bindParam(':ids', $ids, PDO::PARAM_INT);
            $deletar->execute();
            $rows = $deletar->rowCount();

            if($rows > 0){
                echo'<script type="text/javascript">window.location.href = "listaReservas.php"</script>';
            }

        }catch (PDOException $e) {}
}


if (isset($_POST['del_res'])) {

    $uuid = $_POST['uuid'];
    $id_session = $_POST['id_session'];
    $id = $_POST['id_res'];

    if($uuid != $id_session){
        echo'<script type="text/javascript">window.location.href = "res_veiculos.php?aviso=res"</script>';
    } else {

        $id = $_POST['id_res'];
    
        $deletaDoc = "DELETE FROM reservas WHERE id_reservas=:cod";
    
            try {
                $deletar = $conexao->prepare($deletaDoc);
                $deletar->bindParam(':cod', $id, PDO::PARAM_INT);
                $deletar->execute();
                $rows = $deletar->rowCount();
    
                if($rows > 0){
                    echo'<script type="text/javascript">window.location.href = "res_veiculos.php"</script>';
                }
    
            }catch (PDOException $e) {}       
        
    }
}

//DELETAR SALAS
if (isset($_POST['del_res_salas'])) {

    $uuid = $_POST['uuid'];
    $id_session = $_POST['id_session'];
    $id = $_POST['id_res'];

    if($uuid != $id_session){
        echo'<script type="text/javascript">window.location.href = "salas.php?aviso=res"</script>';
    } else {

        $id = $_POST['id_res'];
    
        $deletaDoc = "DELETE FROM reservas_salas WHERE id_reservas=:cod";
    
            try {
                $deletar = $conexao->prepare($deletaDoc);
                $deletar->bindParam(':cod', $id, PDO::PARAM_INT);
                $deletar->execute();
                $rows = $deletar->rowCount();
    
                if($rows > 0){
                    echo'<script type="text/javascript">window.location.href = "salas.php"</script>';
                }
    
            }catch (PDOException $e) {}       
        
    }
}

//DELETAR SALAS GET
if (isset($_GET['del_res_salas'])) {    

    $id = $_GET['id_res'];
    
    $deletaDoc = "DELETE FROM reservas_salas WHERE id_reservas=:cod";

        try {
            $deletar = $conexao->prepare($deletaDoc);
            $deletar->bindParam(':cod', $id, PDO::PARAM_INT);
            $deletar->execute();
            $rows = $deletar->rowCount();

            if($rows > 0){
                echo'<script type="text/javascript">window.location.href = "listaReservasSalas.php"</script>';
            }

        }catch (PDOException $e) {} 
}