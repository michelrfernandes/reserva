<?php 
ob_start();
session_start();

if(!isset($_SESSION['senha'])){
  header("Location:../index.php?aviso=error");
}

include("../conexao/conecta.php");
include("./logout.php");


//  $listar = "SELECT * FROM usuarios WHERE id_users='".$_SESSION['id_users']."'";
//  $queryUser = $conexao->prepare($listar);
//  $queryUser->execute();
//  $contRow = $queryUser->rowCount();
//  $rowNivel = $queryUser->FETCH(PDO::FETCH_OBJ); 
//  $rowNivel->nivel;

?>
                

<!DOCTYPE html>
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Sistema - Painel</title>

  <!-- Custom fonts for this template -->
  <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

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

          <?php if(@$_GET['aviso'] == "error") {?>
          <div class="col-xl-12 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ERROR</div>
                    <div class="h5 mb-0 font-weight-bold text-danger">Você não tem permissão para deletar! </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-question-circle  fa-2x text-danger"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } if(@$_GET['aviso'] == "error_ad") {?>
          <div class="col-xl-12 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
              <div class="card-body">
                <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">ERROR</div>
                    <div class="h5 mb-0 font-weight-bold text-danger">O Super Adm não pode ser deletado! </div>
                  </div>
                  <div class="col-auto">
                    <i class="fas fa-question-circle  fa-2x text-danger"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <?php } ?> 

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">LISTA DE USUÁRIO</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

              <?php
 
# Limita o número de registros a serem mostrados por página
$limite = 10;
 
# Se pg não existe atribui 1 a variável pg
$pg = (isset($_GET['pg'])) ? (int)$_GET['pg'] : 1;
 
# Atribui a variável inicio o inicio de onde os registros vão ser
# mostrados por página, exemplo 0 à 10, 11 à 20 e assim por diante
$inicio = ($pg * $limite) - $limite;
 
# seleciona os registros do banco de dados pelo inicio e limitando pelo limite da variável limite

// if($_SESSION['nivel'] == "SA"){
//   $sql = "SELECT * FROM usuarios LIMIT ".$inicio. ", ". $limite; 
// } else {
//   $sql = "SELECT * FROM usuarios WHERE id_users=".$_SESSION['id_users']. " LIMIT ".$inicio. ", ". $limite; 
// }

$sql = "SELECT * FROM usuarios WHERE id_users=".$_SESSION['id_users']. " LIMIT ".$inicio. ", ". $limite; 
try {
    
    $query = $conexao->prepare($sql);
    $query->execute();
 
    } catch (PDOexception $error_sql){
 
        echo 'Erro ao retornar os Dados.'.$error_sql->getMessage();
  
}?>

 <div class="row"> 

    <div class="col"><strong>NOME</strong></div>
    <div class="col"><strong>EMAIL</strong></div>
    <div class="col-md-1 mb-3"><strong>STATUS</strong></div>
    <div class="col-md-2 mb-3" style="text-align:right"><strong>OPÇÕES</strong></div>

<?php 

while($linha = $query->fetch(PDO::FETCH_OBJ)){ ?>
 

    <div class="col-xl-12" style="border-bottom: 1px solid #ededed; padding: 10px">
      <div class="row"> 

        <div class="col"><?php echo $linha->nome; ?></div>
        <div class="col"><?php echo $linha->email;?></div>
        <div class="col-md-1 mb-3" style="text-align:center">
        <span style=" width: 100px; display:block; color:#fff; font-size: 12px; background: <?php echo $linha->ativo == "Y" ? "green" : "red";?>; padding: 3px 7px; margin-right: 25px; border-radius: 5px">
        <?php echo $linha->ativo == "Y" ? "Ativado" : "Suspenso";?></span>
        </div>
        <div class="col-md-2 mb-3 icons" style="text-align:right">        
          <a href="./userUpdate.php?uuid=<?php echo $linha->id_users; ?>" alt="Editar"> <i class="fas fa-edit"></i></a>     
          
          <?php if($_SESSION['nivel'] == "A"){?>
          <a href="?del&id=<?php echo $linha->id_users;?>&n=A"  alt="Excluir"> <i class="fas fa-trash-alt"></i></a>
          <?php } if($_SESSION['nivel'] == "SA"){?>
          <a href="?del&id=<?php echo $linha->id_users;?>&n=SA"  alt="Excluir"> <i class="fas fa-trash-alt"></i></a>
          <?php } ?>
        </div>

      </div>
    </div>
 
<?php } ?>

</div>
<?php
 
# seleciona o total de registros  
$sql_Total = 'SELECT * FROM usuarios';
  
try {
    
    $query_Total = $conexao->prepare($sql_Total);
    $query_Total->execute();
  
    $query_result = $query_Total->fetchAll(PDO::FETCH_ASSOC);
  
    # conta quantos registros tem no banco de dados
    $query_count =  $query_Total->rowCount();
 
    # calcula o total de paginas a serem exibidas
    $qtdPag = ceil($query_count/$limite);
  
    } catch (PDOexception $error_Total){
    
        echo 'Erro ao retornar os Dados. '.$error_Total->getMessage();
  
    }
 
    echo '<div class="row"><div class="col-sm-12">';

    echo '<ul id="paginacao">';

    if($qtdPag > 1 && $pg <= $qtdPag){
    echo '<li><a class="anterior" href="listaUsuarios.php">Anterior</a></li>';
    }

    if($qtdPag > 1 && $pg <= $qtdPag){
        
        for($i = 1; $i <= $qtdPag; $i++){
 
            if($i == $pg){
 
                echo "<li><a class='ativo'>".$i."</a></li>";
 
            } else {
 
                echo "<li><a href='listaUsuarios.php?busca&pg=$i'>".$i."</a></li>";
                
            }
  
        }
 
    }

    if($qtdPag > 1 && $pg <= $qtdPag){ 
    echo "<li><a class='proxima' href='listaUsuarios.php?busca&pg=$qtdPag'>Próxima</a></li>";
    }
    echo "</div></div>";
 
?>
                



              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
      

      <?php 
      include_once('./footer.php'); 
      include_once('./delUser.php'); 
      ?>
