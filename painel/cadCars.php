<?php 
ob_start();
session_start();

if(!isset($_SESSION['senha'])){
  header("Location:../index.php?aviso=error");
}

include("../conexao/conecta.php");
include("./logout.php");

// $listar = "SELECT * FROM usuarios WHERE id_users='".$_SESSION['id_users']."'";
// $queryUser = $conexao->prepare($listar);
// $queryUser->execute();
// $contRow = $queryUser->rowCount();
// $rowNivel = $queryUser->FETCH(PDO::FETCH_OBJ);
// $rowNivel->nivel;
?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Desenvolve MT</title>

    <!-- Custom fonts for this template -->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

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

                <?php include_once('header.php');?>

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"></h1>             


                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">CADASTRO DE VEÍCULOS</h6>
                        </div>
                        <div class="card-body">

                        <div class="row">

                        <?php if (@$_GET['aviso']=="error") {?>

                            <div class="col-xl-12 col-md-12 mb-12 mb-sm-3">
                                 <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                                <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ERROR</div>
                                                <div class="h5 mb-0 font-weight-bold text-danger">Ocorreu um erro ao cadastrar!</div>
                                            </div>
                                            <div class="col-auto"><i class="fas fa-question-circle  fa-2x text-danger"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } else if (@$_GET['aviso']=="cpf") {?>

                            <div class="col-xl-12 col-md-12 mb-12 mb-sm-3">
                                 <div class="card border-left-danger shadow h-100 py-2">
                                    <div class="card-body">
                                        <div class="row no-gutters align-items-center">
                                            <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ERROR</div>
                                            <div class="h5 mb-0 font-weight-bold text-danger">Esse CPF já foi cadastrado! Tente outro.</div>
                                            </div>
                                            <div class="col-auto">
                                            <i class="fas fa-question-circle  fa-2x text-danger"></i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>

                        </div><!--row -->

                            <form class="user" action="" name="informs" method="post" enctype="multipart/form-data">
                                <div class="form-group row">

                                    <!-- COLUNA 01 -->
                                    <div class="col-sm-12 mb-0 mb-sm-0" style="border-right:0px solid #ccc !important; border:1px solid #ccc; padding: 20px; background: #ededed;">
                                        <div class="row">

                                            <div class="col-sm-4 mb-2 mb-sm-3">
                                            <label for="">Nome do veículo</label>
                                                <input type="text" class="form-control" id="exampleFirstName" name="nome" placeholder="---">
                                            </div>

                                            <div class="col-sm-4 mb-2 mb-sm-3">
                                            <label for="">Marcas do Veículo</label>
                                                <div class="form-group">
                                                    <select class="form-control" name="marca">
                                                    <option value="" selected="">---</option>
                                                    <option value="Aston Martin"> Aston Martin</option>
                                                    <option value="Audi"> Audi</option>
                                                    <option value="Bentley"> Bentley</option>
                                                    <option value="BMW"> BMW</option>
                                                    <option value="Caoa Chery">Caoa Chery </option>
                                                    <option value="Chevrolet">Chevrolet </option>
                                                    <option value="Chrysler">Chrysler </option>
                                                    <option value="Citroën"> Citroën</option>
                                                    <option value="Dodge"> Dodge</option>
                                                    <option value="Ferrari">Ferrari </option>
                                                    <option value="Fiat"> Fiat</option>
                                                    <option value="Ford">Ford </option>
                                                    <option value="Honda">Honda </option>
                                                    <option value="Husqvarna">Husqvarna </option>
                                                    <option value="Hyundai">Hyundai </option>
                                                    <option value="JAC"> JAC</option>
                                                    <option value="Jaguar">Jaguar </option>
                                                    <option value="Jeep">Jeep </option>
                                                    <option value="Kia">Kia </option>
                                                    <option value="Lamborghini">Lamborghini </option>
                                                    <option value="Land Rover">Land Rover </option>
                                                    <option value="Lexus"> Lexus</option>
                                                    <option value="Lifan">Lifan </option>
                                                    <option value="Maserati"> Maserati</option>
                                                    <option value="McLaren"> McLaren</option>
                                                    <option value="Mercedes-Benz"> Mercedes-Benz</option>
                                                    <option value="Mini"> Mini</option>
                                                    <option value="Mitsubishi"> Mitsubishi</option>
                                                    <option value="Nissan">Nissan </option>
                                                    <option value="Peugeot">Peugeot </option>
                                                    <option value="Porsche">Porsche </option>
                                                    <option value="Ram">Ram </option>
                                                    <option value="Renault">Renault </option>
                                                    <option value="Rolls Royce">Rolls Royce </option>
                                                    <option value="Royal Enfield"> Royal Enfield</option>
                                                    <option value="Smart">Smart </option>
                                                    <option value="Subaru"> Subaru</option>
                                                    <option value="Suzuki">Subaru </option>
                                                    <option value="Toyota">Toyota </option>
                                                    <option value="Triumph">Triumph </option>
                                                    <option value="Troller">Troller </option>
                                                    <option value="Volkswagen"> Volkswagen</option>
                                                    <option value="Volvo"> Volvo</option>
                                                    <option value="Yamaha"> Yamaha</option>                                                        
                                                    </select>
                                                </div>
                                            </div>                                           
                                            

                                            <div class="col-sm-4 mb-2 mb-sm-3">
                                            <label for="">Motorização</label>
                                                <div class="form-group">
                                                    <select class="form-control" name="motor">
                                                    <option value="" selected="">---</option>
                                                    <?php 
                                                    for($i=1; $i <=3; $i++){                                                                                                        
                                                        for($y=0; $y <=9; $y++){
                                                            echo '<option value="'.$i.'.'.$y.'">';
                                                            echo $i .'.'. $y;
                                                            echo '</option>';                                                            
                                                        }                                                                                                            
                                                    }
                                                    ?>  
                                                    </select>
                                                </div>
                                            </div>       
                                            
                                            
                                            <div class="col-sm-4 mb-2 mb-sm-3">
                                            <label for="">Ano</label>
                                                <div class="form-group">
                                                    <select class="form-control" name="ano">
                                                    <option value="" selected="">---</option>
                                                    <?php 
                                                     for($i=2000; $i <=2030; $i++){ 
                                                        echo '<option value="'.$i.'">'.$i.'</option>';                                                                                                          
                                                     }
                                                     ?> 
                                                    </select>
                                                </div>
                                            </div>     

                                            <div class="col-sm-4 mb-2 mb-sm-3">
                                            <label for="">Modelo</label>
                                                <div class="form-group">
                                                    <select class="form-control" name="modelo">
                                                    <option value="" selected="">---</option>
                                                    <?php 
                                                     for($i=2000; $i <=2030; $i++){ 
                                                        echo '<option value="'.$i.'">'.$i.'</option>';                                                                                                          
                                                     }
                                                     ?> 
                                                    </select>
                                                </div>
                                            </div>    


                                            <div class="col-sm-4 mb-2 mb-sm-3">
                                                <label for="">Placa do veículo</label>
                                                <input type="text" class="form-control"  name="placa"  placeholder="---">
                                            </div>                                           
                                            

                                        </div>
                                    </div>
                                    <!-- COLUNA 02 -->                                                                       

                                </div>  


                                <div class="col-sm-4 mb-2 mb-sm-3">
                                    <button type="submit" class="btn btn-primary btn-user btn-block"> Cadastrar </button>
                                </div>                                           
                                <input type="hidden" name="cadastro">
                            </form>


                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <?php     


        if (isset($_POST['cadastro'])) {
            
            
            $post = filter_input_array(INPUT_POST, FILTER_DEFAULT);  

            $nome = $post['nome'];
            $marca = $post['marca'];
            $motor = $post['motor'];
            $ano = $post['ano'];
            $modelo = $post['modelo'];
            $placa = $post['placa'];

            $anoModelo = $ano.'/'.$modelo;
      
        $incluir = "INSERT INTO cars (nome, marca, motorizacao, anomodelo, placa) 
                    VALUES (:nome, :marca, :motor, :ano, :placa)";
        try {

            $query_inserir = $conexao->prepare($incluir);
            $query_inserir->bindParam(':nome', $nome, PDO::PARAM_STR);
            $query_inserir->bindParam(':marca', $marca, PDO::PARAM_STR);
            $query_inserir->bindParam(':motor', $motor, PDO::PARAM_STR);
            $query_inserir->bindParam(':ano', $anoModelo, PDO::PARAM_STR);
            $query_inserir->bindParam(':placa', $placa, PDO::PARAM_STR);
            $query_inserir->execute();
            $contar = $query_inserir->rowCount();

            if ($contar > 0) {

              header("Location:listaCars.php");

            } else {
                header("Location:cadCars.php?aviso=error");
            }

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }?>

            <?php include_once('./footer.php'); ?>
            <?php


?>