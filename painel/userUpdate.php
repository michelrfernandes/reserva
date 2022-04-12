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

//Update

$listUsers = "SELECT * FROM usuarios WHERE id_users='".$_GET['uuid']."'";
$qUsers = $conexao->prepare($listUsers);
$qUsers->execute();
$UsersRow = $qUsers->rowCount();
$rowUsers = $qUsers->FETCH(PDO::FETCH_OBJ);
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

            <?php if(@$_GET['aviso'] == "vazio") {?>

            <div class="col-xl-12 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ERROR</div>
                    <div class="h5 mb-0 font-weight-bold text-danger">Os campos Nome ou CPF está vázio!</div>
                    </div>
                    <div class="col-auto">
                    <i class="fas fa-question-circle  fa-2x text-danger"></i>
                    </div>
                </div>
                </div>
            </div>
            </div>

            <?php } ?>

            <?php if(@$_GET['aviso'] == "vazio_exist") {?>

            <div class="col-xl-12 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ERROR</div>
                    <div class="h5 mb-0 font-weight-bold text-danger">Está senha já está sendo usada, tente outra!</div>
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
              <h6 class="m-0 font-weight-bold text-primary">EDITAR USUÁRIOS</h6>
            </div>
            <div class="card-body">          

            <form class="user" action="" method="post">
                <div class="form-group row">
                  <div class="col-sm-3 mb-3 mb-sm-0">
                    <input type="text" class="form-control" id="exampleFirstName" required name="nome" placeholder="Nome Completo" value="<?php echo $rowUsers->nome; ?>">
                  </div>

                 <div class="col-sm-3">
                    <input type="email" class="form-control" required id="email" name="email" value="<?php echo $rowUsers->email; ?>" placeholder="Digite o email">
                  </div>
                 

                 <div class="col-sm-2">
                    <input type="password" class="form-control" required id="senha" name="senha" value="<?php echo $rowUsers->senha;?>" placeholder="Digite o senha">
                  </div>

                
                  <?php if($_SESSION['nivel']  == "SA"){?>                  

                 <div class="col-sm-2">                  
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="ativo" value="Y" <?php echo $rowUsers->ativo == "Y" ? "checked" : ""; ?> id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">Ativo</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="ativo" value="N" <?php echo $rowUsers->ativo == "N" ? "checked" : ""; ?> id="flexRadioDefault2">
                      <label class="form-check-label" for="flexRadioDefault2">Suspenso</label>
                    </div>
                  </div>

                  <?php } else {?>
                    <input type="hidden" name="ativo" value="<?php echo $rowUsers->ativo; ?>">
                  <?php }?>

                  <?php if($_SESSION['nivel']  == "SA"){?>                  

                  <div class="col-sm-2">                  
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nivel" value="SA" <?php echo $rowUsers->nivel == "SA" ? "checked" : ""; ?> id="flexRadioDefault1">
                      <label class="form-check-label" for="flexRadioDefault1">Super Adm</label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="nivel" value="A" <?php echo $rowUsers->nivel == "A" ? "checked" : ""; ?> id="flexRadioDefault2">
                      <label class="form-check-label" for="flexRadioDefault2">Adm</label>
                    </div>
                  </div>

                  <?php } else { ?>
                    <input type="hidden" name="nivel" value="A">
                  <?php }?> 

                  <div class="col-sm-2">
                    <button type="submit" class="btn btn-primary btn-block"> Cadastrar </button>
                  </div>
                </div>

                <input type="hidden" name="cadastro">
                <input type="hidden" name="uuid" value="<?php echo $rowUsers->id_users; ?>">
                <!--<input type="hidden" name="nivel" value="<?php //echo $rowUsers->nivel; ?>">-->
              </form>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <?php
        if (isset($_POST['cadastro'])) {

        $nome = trim(strip_tags($_POST["nome"]));      
        $email = trim($_POST["email"]);      
        $password = md5(trim(strip_tags($_POST['senha'])));
        $password_n = (trim(strip_tags($_POST['senha'])));
        $nivel = $_POST['nivel'];
        $ativo = $_POST['ativo'];
        $uuid = $_POST['uuid'];
        


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


        $updates = "UPDATE usuarios SET nome=:nome, email=:email, nivel=:nivel, ativo=:ativo, senha=:senha WHERE id_users = :uuid";

        try {

            $query_update = $conexao->prepare($updates);
            $query_update->bindParam(':nome', $nome, PDO::PARAM_STR);
            $query_update->bindParam(':email', $email, PDO::PARAM_STR);
            $query_update->bindParam(':nivel', $nivel, PDO::PARAM_STR);
            $query_update->bindParam(':ativo', $ativo, PDO::PARAM_STR);
            $query_update->bindParam(':senha', $password, PDO::PARAM_STR);
            $query_update->bindParam(':uuid', $uuid, PDO::PARAM_STR);
            $query_update->execute();
            $cont = $query_update->rowCount();
            //$idVeiculos = $conexao->lastInsertId();
            if ($cont > 0) {
                  header("Location:listaUsuarios.php");

            } else {
                header("Location:userUpdate.php?aviso=error");
            }

        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    ?>

      <?php include_once('./footer.php'); ?>
