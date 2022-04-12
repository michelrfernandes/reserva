<?php 

if (isset($_GET['del'])) {

    $ids = $_GET['id'];
    $nivel =  $_GET['n'];

    if($nivel == "A"){
        echo'<script type="text/javascript">window.location.href = "listaUsuarios.php?aviso=error"</script>';
        exit;
        die;
    }

    if($ids == "1" && $nivel == "SA"){
        echo'<script type="text/javascript">window.location.href = "listaUsuarios.php?aviso=error_ad"</script>';
        exit;
        die;
    }


        $deletaDoc = "DELETE FROM usuarios WHERE id_users=:id";
        try {
            $deletar = $conexao->prepare($deletaDoc);
            $deletar->bindParam(':id', $ids, PDO::PARAM_INT);
            $deletar->execute();
            $rows = $deletar->rowCount();

            if($rows > 0){
                echo'<script type="text/javascript">window.location.href = "listaUsuarios.php"</script>';
            }

        }catch (PDOException $e) {}

}

    
