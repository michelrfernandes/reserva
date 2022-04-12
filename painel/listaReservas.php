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
  
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  
  <script>
    var $jQuery = jQuery.noConflict();
    $jQuery(document).ready(function(){
      $jQuery(".box").hide();
      $jQuery('input[type="checkbox"]').click(function(){
        $jQuery(".box").toggle();
      });
    });
</script>

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
              <h6 class="m-0 font-weight-bold text-primary">LISTA DE RESERVA DE CARROS</h6>
            </div>
            <div class="card-body">
              <div class="table-responsive">

              <?php
 
# Limita o número de registros a serem mostrados por página
$limite = 15;
 
# Se pg não existe atribui 1 a variável pg
$pg = (isset($_GET['pg'])) ? (int)$_GET['pg'] : 1;
 
# Atribui a variável inicio o inicio de onde os registros vão ser
# mostrados por página, exemplo 0 à 10, 11 à 20 e assim por diante
$inicio = ($pg * $limite) - $limite;
 
# seleciona os registros do banco de dados pelo inicio e limitando pelo limite da variável limite


  $sql = "SELECT * FROM reservas LIMIT ".$inicio. ", ". $limite; 
  //$sql = "SELECT * FROM km_veiculo AS k INNER JOIN reservas AS r ON k.reservas_id=r.id_reservas LIMIT ".$inicio. ", ". $limite; 
  //$sql = "SELECT * FROM reservas LIMIT ".$inicio. ", ". $limite; 

try {
    
    $query = $conexao->prepare($sql);
    $query->execute();
 
    } catch (PDOexception $error_sql){
 
        echo 'Erro ao retornar os Dados.'.$error_sql->getMessage();
  
}?>

 <div class="row"> 

    <div class="col bordas pt-3 pb-3"><strong>NOME DO CONDUTOR</strong></div>
    <div class="col bordas pt-3 pb-3"><strong>VEÍCULOS</strong></div>
    <div class="col-md-1 bordas pt-3 pb-3"><strong>KM ATUAL</strong></div>
    <div class="col-md-2 bordas pt-3 pb-3"><strong>LIBERAÇÃO</strong></div>
    <div class="col-md-2 bordas pt-3 pb-3"><strong>STATUS</strong></div>
    <div class="col-md-1 bordas pt-3 pb-3" style="text-align:right"><strong>OPÇÕES</strong></div>

<?php 

while($linha = $query->fetch(PDO::FETCH_OBJ)){ ?>

    <div class="col-xl-12 bordasFont pl-0 px-0 pt-0 pb-0" style="border-top: 1px solid #ededed; padding: 10px 0; font-size: 12px">
      <div class="row"> 
        <div class="col bordas pt-3 pb-3"><?php echo strtoupper($linha->nome); ?></div>
        <div class="col bordas pt-3 pb-3"><?php echo strtoupper($linha->veiculo);?></div>
        <div class="col-md-1 bordas pt-3 pb-3"><?php echo $linha->km_saida;?></div>
        <div class="col-md-2 bordas pt-3 pb-3"><?php echo date('d/m/Y - H:i:s', strtotime($linha->data_end));?></div>
        <div class="col-md-2 bordas pt-3 pb-3 text-center" style="color:#fff; <?php echo $linha->situacao =='Reservado' ? 'background: #db6f6f' : 'background: #36b9cc';?>"><?php echo $linha->situacao;?></div>
        
        <div class="col-md-1 icons bordas pt-3 pb-3" style="text-align:right">        
          <a href="#" alt="Editar" data-toggle="modal" data-target="#modalKm<?php echo $linha->id_reservas;?>"> <i class="fas fa-edit"></i></a>                      
          <a href="?del&id=<?php echo $linha->id_reservas;?>"  alt="Excluir"> <i class="fas fa-trash-alt"></i></a>
        </div>

      </div>
    </div> 

  <!-- Logout Modal-->
  <div class="modal fade" id="modalKm<?php echo $linha->id_reservas;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">FINALIZAR RESERVA DO VEÍCULO</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

            <form class="user" action="updateReservas.php" name="informs" method="post" enctype="multipart/form-data">
            <div class="form-group row">

                <!-- COLUNA 01 -->
                <div class="col-sm-12 mb-0 mb-sm-0" style="border-right:0px solid #ccc !important; border:1px solid #ccc; padding: 20px; background: #ededed;">
                    <div class="row">

                    <div class="col-sm-12 mb-2 mb-sm-3">
                        <h5 style="color:#000; font-weight: bold"><?=$linha->veiculo;?></h5>
                    </div>

                        <div class="col-sm-4 mb-2 mb-sm-3">
                        <label for="">KM INICIAL</label>
                            <input type="text" class="form-control" id="exampleFirstName" name="km_entrada" value="<?php echo $linha->km_entrada;?>">
                        </div> 

                        <div class="col-sm-4 mb-2 mb-sm-3">
                        <label for="">KM FINAL</label>
                            <input type="text" class="form-control" id="exampleFirstName" name="km_saida" value="<?php echo $linha->km_saida;?>">
                        </div> 

                        <div class="col-sm-4 mb-2 mb-sm-3">
                        <label for="" style="display: block">STATUS</label>
                          <select class="form-control" name="situacao">
                            <option <?php if($linha->situacao == 'Reservado') {echo 'selected';}?> value="Reservado">Reservado</option>
                            <option <?php if($linha->situacao == 'Finalizado') {echo 'selected';}?> value="Finalizado">Finalizado</option>
                          </select>                        
                        </div> 
                        
                        <div class="col-sm-12 mb-2 mb-sm-3">
                            <!-- <label for="">HOVER AVARIA NO VEÍCULO? </label> -->

                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" value="" id="flexCheckIndeterminate">
                                <label class="form-check-label" for="flexCheckIndeterminate">
                                  Teve avaria no veículos? 
                                </label>
                            </div>

                            <div class="box">
                              <textarea class="form-control" rows="7" name="info" placeholder="Digite as informações da avarias do veículo, se caso houver!"><?php echo trim($linha->informacao);?></textarea>                         
                            </div>

                        </div> 
                        

                    </div>
                </div>
                <!-- COLUNA 02 -->                                                                       

            </div>  


            <div class="col-sm-4 mb-2 mb-sm-3">
                <button type="submit" class="btn btn-info"> SALVAR</button>
            </div>       

            <input type="hidden" name="editar">
            <input type="hidden" name="id" value="<?=$linha->id_reservas;?>">
        </form>
          </div>

        </div>
      </div>
    </div>   
 
<?php } ?>

</div>
<?php
 
# seleciona o total de registros  
$sql_Total = 'SELECT * FROM reservas';
  
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
    echo '<li><a class="anterior" href="listaReservas.php">Anterior</a></li>';
    }

    if($qtdPag > 1 && $pg <= $qtdPag){
        
        for($i = 1; $i <= $qtdPag; $i++){
 
            if($i == $pg){
 
                echo "<li><a class='ativo'>".$i."</a></li>";
 
            } else {
 
                echo "<li><a href='listaReservas.php?busca&pg=$i'>".$i."</a></li>";
                
            }
  
        }
 
    }

    if($qtdPag > 1 && $pg <= $qtdPag){ 
    echo "<li><a class='proxima' href='listaReservas.php?busca&pg=$qtdPag'>Próxima</a></li>";
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
      include_once('./delReservas.php'); 
      ?>
