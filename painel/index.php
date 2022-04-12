<?php 
ob_start();
session_start();

if(!isset($_SESSION['senha'])){
		header("Location:../index.php?aviso=error");
}

include("../conexao/conecta.php");
include("./logout.php");

$listar = "SELECT * FROM usuarios WHERE id_users='".$_SESSION['id_users']."'";
$queryUser = $conexao->prepare($listar);
$queryUser->execute();
$contRow = $queryUser->rowCount();
$rowNivel = $queryUser->FETCH(PDO::FETCH_OBJ);
?>
                

<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <style>
    .center{ text-align:center;}
    button.btn{ width: 100%;}
  </style>

  <title>Sistema de Reserva</title>

  <link href='../calendario/css/core/main.min.css' rel='stylesheet' />
  <link href='../calendario/css/daygrid/main.min.css' rel='stylesheet' />
  <link rel="icon" href="../img/icon_dmt.png" />
  <script src='../calendario/js/core/main.min.js'></script>
  <script src='../calendario/js/interaction/main.min.js'></script>
  <script src='../calendario/js/daygrid/main.min.js'></script>
  <script src='../calendario/js/core/locales/pt-br.js'></script> 

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
  <script src="./calendarioJs.js"></script>
  <!-- <script src="./acao_script.js"></script> -->
  <script src="./bPlaca.js"></script>

</head>
<body id="page-top">
  <!-- Page Wrapper -->
  <div id="wrapper">
    <?php include_once('./sidebar.php'); ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <?php //include_once('header.php');?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800"></h1>


          <div class="row">            
            <div class="col-xl-12 col-md-6 py-3 px-5">
              <div class="card shadow hor-v">
                <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    
                <h1>
                    <?php 

                    function saudacao(){
                        date_default_timezone_set('America/Manaus');
                        $newDate = date('H:i');
                        switch ($newDate) {
                            case ($newDate >= 6 && $newDate <= 12):
                                echo "BOM DIA";
                                break;
    
                            case ($newDate > 12 && $newDate <= 18):
                                echo "BOA TARDE";
                                break;  
                                                     
                            case ($newDate > 18 && $newDate <= 24):
                                echo "BOA NOITE";
                                break;                        
                            
                            default:
                                echo "BOA MADRUGADA";
                                break;
                        }                
                    }
                    
                    saudacao(); 
                    echo ', '. mb_strtoupper($_SESSION['username']);

                ?></h1>

                <p class="text-center m-5" style="font-size: 20px">
                Esse espaço foi desenvolvido para abrir solicitações <br>
                de reservas para <strong>veículos e salas de reuniões</strong>.
                </p>

                <div class="text-center py-4" style="font-size: 13px">
                    Copyright © 2021
                </div>

                </div>
              </div>
            </div>

          </div>

        </div>
        <!-- /.container-fluid -->
        

      </div>
      <!-- End of Main Content -->

      

      <?php 
      include_once('./footer.php'); 
      ?>
