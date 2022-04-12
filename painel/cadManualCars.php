<?php 
ob_start();
session_start();

if(!isset($_SESSION['senha'])){
  header("Location:../index.php?aviso=error");
}

include("../conexao/conecta.php");
include("./logout.php");

$listarCars = "SELECT * FROM cars";
$queryCars = $conexao->prepare($listarCars);
$queryCars->execute();
//$contRow = $queryCars->rowCount();
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
                            <h6 class="m-0 font-weight-bold text-primary">CADASTRO DE VEÍCULOS MANUAL</h6>
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
                                            <label for="">Nome do Requerente</label>
                                                <input type="text" class="form-control" id="exampleFirstName" name="requerente" placeholder="---">
                                            </div>

                                            <div class="col-sm-4 mb-2 mb-sm-3">
                                            <label for="">Veículo</label>
                                                <div class="form-group">
                                                    <select class="form-control" name="veiculo">
                                                    <option value="" selected="">---</option>  

                                                    <?php while($rowCars = $queryCars->FETCH(PDO::FETCH_OBJ)) {?>                                                  
                                                    <option value="<?=$rowCars->nome.' - '.$rowCars->marca.' - '.$rowCars->motorizacao.' - '.$rowCars->anomodelo.' - '.$rowCars->placa?>"><?=$rowCars->nome.' - '.$rowCars->marca.' - '.$rowCars->motorizacao.' - '.$rowCars->anomodelo.' - '.$rowCars->placa?></option>  
                                                    <?php } ?>             

                                                    </select>
                                                </div>
                                            </div>                                           
                                            

                                            <div class="col-sm-2 mb-2 mb-sm-3">
                                            <label for="">Último KM do Veículo</label>
                                                <div class="form-group">
                                                <input type="text" class="form-control"  name="km_entrada"  placeholder="---">
                                                </div>
                                            </div>   

                                            <div class="col-sm-2 mb-2 mb-sm-3">
                                            <label for="">KM Atual</label>
                                                <div class="form-group">
                                                <input type="text" class="form-control"  name="km_saida"  placeholder="---">
                                                </div>
                                            </div>    

                                            <div class="col-sm-2 mb-2 mb-sm-3">
                                            <label for="">Repetição</label>
                                                <div class="form-group">
                                                <input type="text" class="form-control"  name="repeticao"  placeholder="---">
                                                </div>
                                            </div>       
                                            
                                            
                                            <div class="col-sm-2 mb-2 mb-sm-3">
                                            <label for="">Duração</label>
                                                <div class="form-group">
                                                    <select class="form-control" name="duracao">
                                                    <option value="" selected="">---</option>
                                                    <?php 
                                                     for($i=1; $i <=24; $i++){ 
                                                        echo '<option value="'.$i.'">'.$i.'h'.'</option>';                                                                                                          
                                                     }
                                                     ?> 
                                                    </select>
                                                </div>
                                            </div>     

                                            <div class="col-sm-3 mb-2 mb-sm-3">
                                            <label for="">Data</label>
                                                <div class="form-group">
                                                <input type="datetime-local" class="form-control" value="" name="data_start" placeholder="---">
                                                </div>
                                            </div>    

                                            <div class="col-sm-3 mb-2 mb-sm-3">
                                            <label for="">Data Final</label>
                                                <div class="form-group">
                                                <input type="datetime-local" class="form-control" value="" name="data_end" placeholder="---">
                                                </div>
                                            </div>  

                                            <div class="col-sm-2 mb-2 mb-sm-3">
                                            <label for="">Situação</label>
                                                <div class="form-group">
                                                    <select class="form-control" name="situacao">
                                                        <option value="" selected="">---</option>
                                                        <option value="Reservado">Reservado</option>
                                                        <option value="Finalizado">Finalizado</option>
                                                    </select>
                                                </div>
                                            </div>    


                                            <div class="col-sm-12 mb-2 mb-sm-3">
                                                <label for="">Comentário</label>
                                                <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" rows="3"></textarea>                                            </div>                                           
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

        $uuid = $_SESSION['id_users'];
        $comentario = $post['comentario'];
        $informacao = 'Nada Consta!';
        $veiculo = $post['veiculo'];

        $nome = $post['requerente'];

        $placa = explode(' - ', $veiculo);
        $placa = $placa[4];
        
        $data_start = $post['data_start'];
        $data_start = date('Y-m-d H:i:s', strtotime($data_start));

        $data_end = $post['data_end'];
        $data_end = date('Y-m-d H:i:s', strtotime($data_end));
        
        $repeticao = $post['repeticao'];

        $duracao = $post['duracao'];

        $km_entrada = $post['km_entrada'];
        $km_saida = $post['km_saida'];

        $situacao = $post['situacao'];

        if($situacao == "Fechado"){
            $color = '#FF0000';
        } else {
            $color = '#36b9cc';
        }
        

        $incluir = "INSERT INTO reservas (id_users, veiculo, nome, placa, data_start, data_end, repeticao, duracao, km_entrada, km_saida, comentario, informacao, situacao, color) 
                VALUES (:idUser, :veiculo, :nome, :placa, :data_start, :data_end, :repeticao, :duracao, :km_entrada, :km_saida, :comentario, :informacao, :situacao, :color)";

        try {

        $query_inserir = $conexao->prepare($incluir);
        $query_inserir->bindParam(':idUser', $uuid, PDO::PARAM_STR);
        $query_inserir->bindParam(':veiculo', $veiculo, PDO::PARAM_STR);
        $query_inserir->bindParam(':nome', $nome, PDO::PARAM_STR);
        $query_inserir->bindParam(':placa', $placa, PDO::PARAM_STR);
        $query_inserir->bindParam(':data_start', $data_start, PDO::PARAM_STR);
        $query_inserir->bindParam(':data_end', $data_end, PDO::PARAM_STR);
        $query_inserir->bindParam(':repeticao', $repeticao, PDO::PARAM_STR);
        $query_inserir->bindParam(':duracao', $duracao, PDO::PARAM_STR);

        $query_inserir->bindParam(':km_entrada', $km_entrada, PDO::PARAM_STR);

        $query_inserir->bindParam(':km_saida', $km_saida, PDO::PARAM_STR);
        $query_inserir->bindParam(':comentario', $comentario, PDO::PARAM_STR);
        $query_inserir->bindParam(':informacao', $informacao, PDO::PARAM_STR);
        $query_inserir->bindParam(':situacao', $situacao, PDO::PARAM_STR);
        $query_inserir->bindParam(':color', $color, PDO::PARAM_STR);
        $query_inserir->execute();
        $contar = $query_inserir->rowCount();

            if ($contar > 0) {

            header("Location:res_veiculos.php");

            } else {
                header("Location:res_veiculos.php?aviso=error");
            }

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }?>



            <?php include_once('./footer.php'); ?>
            <?php


?>