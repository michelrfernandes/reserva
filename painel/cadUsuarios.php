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
$rowNivel->nivel;
?>
                

<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema Fonseca - Painel</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="../vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

<script src="../js/jquery-1.7.2.min.js"></script>

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

          <?php

            if($rowNivel->nivel == "A") {

                $listar_doc = "SELECT * FROM usuarios";

            } else {

                $listar_doc = "SELECT * FROM usuarios WHERE id_users='".$_SESSION['id_users']."'";

            }
            
            $query = $conexao->prepare($listar_doc);
            $query->execute();
            $count = $query->rowCount(); 
            ?>

          <div class="row">           
            <!-- Earnings (Monthly) Card Example -->
            <?php if(@$_GET['aviso'] == "error") {?>

            <div class="col-xl-12 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ERROR</div>
                      <div class="h5 mb-0 font-weight-bold text-danger">Ocorreu um erro ao cadastrar!</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-question-circle  fa-2x text-danger"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <?php } ?>

            <?php if(@$_GET['aviso'] == "outro") {?>

            <div class="col-xl-12 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">Atenção</div>
                    <div class="h5 mb-0 font-weight-bold text-danger">Já existe essa senha, tente outra.</div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-question-circle  fa-2x text-danger"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <?php } ?>
          </div>

                    <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">CADASTRO DE USUÁRIOS</h6>
            </div>
            <div class="card-body">          

            <form class="user" action="" method="post">
                <div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <input type="text" class="form-control" id="exampleFirstName" required name="nome" placeholder="Nome Completo">
                  </div>

                  <div class="col-sm-3">
                    <input type="email" class="form-control" required id="email" name="email" placeholder="Digite o email">
                  </div>

                  <div class="col-sm-2">
                    <input type="password" class="form-control" required id="senha" name="senha" placeholder="Digite o senha">
                  </div>

                  <?php if($_SESSION['nivel']  == "SA"){?>                  

                  <div class="col-sm-2">                  
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="ativo" value="Y" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">Ativo</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="ativo" value="N" checked id="flexRadioDefault2">
                      <label class="form-check-label" for="flexRadioDefault2">Suspenso</label>
                    </div>
                  </div>

                  <?php } ?>  

                  <?php if($_SESSION['nivel']  == "SA"){?>                  

                  <div class="col-sm-2">                  
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nivel" value="SA" id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">Super Adm</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nivel" value="A" checked id="flexRadioDefault2">
                      <label class="form-check-label" for="flexRadioDefault2">Adm</label>
                    </div>
                  </div>

                  <?php } else { ?>
                    <input type="hidden" name="nivel" value="A">
                  <?php }?>                

                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary btn-block">Cadastrar</button>
                  </div>

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

        $passy = md5(trim($_POST["senha"]));
        $email = trim($_POST["email"]);
        
        $qdados = "SELECT * FROM usuarios WHERE senha=:senha || email=:email";
        $query_dados = $conexao->prepare($qdados);
        $query_dados->bindParam(':senha', $passy, PDO::PARAM_STR);
        $query_dados->bindParam(':email', $email, PDO::PARAM_STR);
        $query_dados->execute();
        $rowData = $query_dados->FETCH(PDO::FETCH_OBJ);
        $contData = $query_dados->rowCount(); 
        
        if($contData > 0){
          header("Location:cadUsuarios.php?aviso=outro");
          exit; die;
        }  
        
        $qdados = "SELECT * FROM usuarios WHERE senha=:senha";
        $query_dados = $conexao->prepare($qdados);
        $query_dados->bindParam(':senha', $password, PDO::PARAM_STR);
        $query_dados->execute();
        $rowData = $query_dados->FETCH(PDO::FETCH_OBJ);
        $contData = $query_dados->rowCount(); 
        
        if($contData > 0){
          header("Location:userUpdate.php?aviso=vazio_exist&uuid=$uuid");
          exit; die;
        } 
        
        
        
        $password = md5(trim($_POST['senha']));
        $nome = trim($_POST['nome']);
        $email = trim($_POST['email']);
        $nivel = $_POST["nivel"];
        $ativo = $_POST["ativo"];
      
        $incluir = "INSERT INTO usuarios (nome, email, nivel, ativo, senha) 
                    VALUES (:nome, :email, :nivel, :ativo, :senha)";
        try {

            $query_inserir = $conexao->prepare($incluir);
            $query_inserir->bindParam(':nome', $nome, PDO::PARAM_STR);
            $query_inserir->bindParam(':email', $email, PDO::PARAM_STR);
            $query_inserir->bindParam(':nivel', $nivel, PDO::PARAM_STR);
            $query_inserir->bindParam(':ativo', $ativo, PDO::PARAM_STR);
            $query_inserir->bindParam(':senha', $password, PDO::PARAM_STR);
            $query_inserir->execute();
            $contar = $query_inserir->rowCount();

            if ($contar > 0) {

              header("Location:listaUsuarios.php");

            } else {
                header("Location:cadUsuarios.php.php?aviso=error");
            }

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    ?>

      <?php include_once('./footer.php'); ?>
