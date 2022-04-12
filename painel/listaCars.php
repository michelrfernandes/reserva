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
              <h6 class="m-0 font-weight-bold text-primary">LISTA DE VEÍCULOS</h6>
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


  $sql = "SELECT * FROM cars LIMIT ".$inicio. ", ". $limite; 

try {
    
    $query = $conexao->prepare($sql);
    $query->execute();
 
    } catch (PDOexception $error_sql){
 
        echo 'Erro ao retornar os Dados.'.$error_sql->getMessage();
  
}?>

 <div class="row"> 
    <div class="col text-center bordas pt-3 pb-3"><strong>NOME</strong></div>
    <div class="col text-center bordas pt-3 pb-3"><strong>MARCA</strong></div>
    <div class="col text-center bordas pt-3 pb-3"><strong>MOTORIZAÇÃO</strong></div>
    <div class="col text-center bordas pt-3 pb-3"><strong>ANO/MODELO</strong></div>
    <div class="col text-center bordas pt-3 pb-3"><strong>PLACA</strong></div>
    <div class="col-md-1 bordas pt-3 pb-3" style="text-align:center"><strong>OPÇÕES</strong></div>
<?php 

while($linha = $query->fetch(PDO::FETCH_OBJ)){ ?>

    <div class="col-xl-12 bordasFont pl-0 px-0 pt-0 pb-0">
      <div class="row"> 
        <div class="col text-center bordas pt-3 pb-3"><?php echo strtoupper($linha->nome); ?></div>
        <div class="col text-center bordas pt-3 pb-3"><?php echo strtoupper($linha->marca);?></div>
        <div class="col text-center bordas pt-3 pb-3"><?php echo $linha->motorizacao;?></div>
        <div class="col text-center bordas pt-3 pb-3"><?php echo $linha->anomodelo;?></div>
        <div class="col text-center bordas pt-3 pb-3"><?php echo strtoupper($linha->placa);?></div>
        
        <div class="col-md-1 icons bordas pt-3 pb-3" style="display: flex; align-items: center; justify-content: center;">       
          <a href="#" alt="Editar" data-toggle="modal" data-target="#logoutModal<?php echo $linha->id_cars;?>"> <i class="fas fa-edit"></i></a>                      
          <a href="?del&id=<?php echo $linha->id_cars;?>"  alt="Excluir"> <i class="fas fa-trash-alt"></i></a>
        </div>

      </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal<?php echo $linha->id_cars;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">EDITAR VEÍCULOS</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

            <form class="user" action="updateCars.php" name="informs" method="post" enctype="multipart/form-data">
            <div class="form-group row">

                <!-- COLUNA 01 -->
                <div class="col-sm-12 mb-0 mb-sm-0" style="border-right:0px solid #ccc !important; border:1px solid #ccc; padding: 20px; background: #ededed;">
                    <div class="row">

                        <div class="col-sm-4 mb-2 mb-sm-3">
                        <label for="">Nome do veículo</label>
                            <input type="text" class="form-control" id="exampleFirstName" name="nome" value="<?php echo strtoupper($linha->nome);?>">
                        </div>

                        <div class="col-sm-4 mb-2 mb-sm-3">
                        <label for="">Marcas do Veículo</label>
                            <div class="form-group">
                                <select class="form-control" name="marca">
                                <option value="" selected="">---</option>
                                <option value="Aston Martin" <?php if($linha->marca =='Aston Martin'){echo "selected='selected'";}?>> Aston Martin</option>
                                <option value="Audi" <?php if($linha->marca =='Audi'){echo "selected='selected'";}?>> Audi</option>
                                <option value="Bentley" <?php if($linha->marca =='Bentley'){echo "selected='selected'";}?>> Bentley</option>
                                <option value="BMW" <?php if($linha->marca =='BMW'){echo "selected='selected'";}?>> BMW</option>
                                <option value="Caoa Chery" <?php if($linha->marca =='Caoa Chery'){echo "selected='selected'";}?>>Caoa Chery </option>
                                <option value="Chevrolet" <?php if($linha->marca =='Chevrolet'){echo "selected='selected'";}?>>Chevrolet </option>
                                <option value="Chrysler" <?php if($linha->marca =='Chrysler'){echo "selected='selected'";}?>>Chrysler </option>
                                <option value="Citroën" <?php if($linha->marca =='Citroën'){echo "selected='selected'";}?>> Citroën</option>
                                <option value="Dodge" <?php if($linha->marca =='Dodge'){echo "selected='selected'";}?>> Dodge</option>
                                <option value="Ferrari" <?php if($linha->marca =='Ferrari'){echo "selected='selected'";}?>>Ferrari </option>
                                <option value="Fiat" <?php if($linha->marca =='Fiat'){echo "selected='selected'";}?>> Fiat</option>
                                <option value="Ford" <?php if($linha->marca =='Ford'){echo "selected='selected'";}?>>Ford </option>
                                <option value="Honda" <?php if($linha->marca =='Honda'){echo "selected='selected'";}?>>Honda </option>
                                <option value="Husqvarna" <?php if($linha->marca =='Husqvarna'){echo "selected='selected'";}?>>Husqvarna </option>
                                <option value="Hyundai" <?php if($linha->marca =='Hyundai'){echo "selected='selected'";}?>>Hyundai </option>
                                <option value="JAC" <?php if($linha->marca =='JAC'){echo "selected='selected'";}?>> JAC</option>
                                <option value="Jaguar" <?php if($linha->marca =='Jaguar'){echo "selected='selected'";}?>>Jaguar </option>
                                <option value="Jeep" <?php if($linha->marca =='Jeep'){echo "selected='selected'";}?>>Jeep </option>
                                <option value="Kia" <?php if($linha->marca =='Kia'){echo "selected='selected'";}?>>Kia </option>
                                <option value="Lamborghini" <?php if($linha->marca =='Lamborghini'){echo "selected='selected'";}?>>Lamborghini </option>
                                <option value="Land Rover" <?php if($linha->marca =='Land Rover'){echo "selected='selected'";}?>>Land Rover </option>
                                <option value="Lexus" <?php if($linha->marca =='Lexus'){echo "selected='selected'";}?>> Lexus</option>
                                <option value="Lifan" <?php if($linha->marca =='Lifan'){echo "selected='selected'";}?>>Lifan </option>
                                <option value="Maserati" <?php if($linha->marca =='Maserati'){echo "selected='selected'";}?>> Maserati</option>
                                <option value="McLaren" <?php if($linha->marca =='McLaren'){echo "selected='selected'";}?>> McLaren</option>
                                <option value="Mercedes-Benz" <?php if($linha->marca =='Mercedes-Benz'){echo "selected='selected'";}?>> Mercedes-Benz</option>
                                <option value="Mini" <?php if($linha->marca =='Mini'){echo "selected='selected'";}?>> Mini</option>
                                <option value="Mitsubishi" <?php if($linha->marca =='Mitsubishi'){echo "selected='selected'";}?>> Mitsubishi</option>
                                <option value="Nissan" <?php if($linha->marca =='Nissan'){echo "selected='selected'";}?>>Nissan </option>
                                <option value="Peugeot" <?php if($linha->marca =='Peugeot'){echo "selected='selected'";}?>>Peugeot </option>
                                <option value="Porsche" <?php if($linha->marca =='Porsche'){echo "selected='selected'";}?>>Porsche </option>
                                <option value="Ram" <?php if($linha->marca =='Ram'){echo "selected='selected'";}?>>Ram </option>
                                <option value="Renault" <?php if($linha->marca =='Renault'){echo "selected='selected'";}?>>Renault </option>
                                <option value="Rolls Royce" <?php if($linha->marca =='Rolls Royce'){echo "selected='selected'";}?>>Rolls Royce </option>
                                <option value="Royal Enfield" <?php if($linha->marca =='Royal Enfield'){echo "selected='selected'";}?>> Royal Enfield</option>
                                <option value="Smart" <?php if($linha->marca =='Smart'){echo "selected='selected'";}?>>Smart </option>
                                <option value="Subaru" <?php if($linha->marca =='Subaru'){echo "selected='selected'";}?>> Subaru</option>
                                <option value="Suzuki" <?php if($linha->marca =='Suzuki'){echo "selected='selected'";}?>>Subaru </option>
                                <option value="Toyota" <?php if($linha->marca =='Toyota'){echo "selected='selected'";}?>>Toyota </option>
                                <option value="Triumph" <?php if($linha->marca =='Triumph'){echo "selected='selected'";}?>>Triumph </option>
                                <option value="Troller" <?php if($linha->marca =='Troller'){echo "selected='selected'";}?>>Troller </option>
                                <option value="Volkswagen" <?php if($linha->marca =='Volkswagen'){echo "selected='selected'";}?>> Volkswagen</option>
                                <option value="Volvo" <?php if($linha->marca =='Volvo'){echo "selected='selected'";}?>> Volvo</option>
                                <option value="Yamaha" <?php if($linha->marca =='Yamaha'){echo "selected='selected'";}?>> Yamaha</option>                                                        
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
                                        $pont = $i .'.'. $y;
                                        ?>
                                        <option value="<?php echo $pont;?>" <?php if($linha->motorizacao == $pont){echo "selected='selected'";}?>><?php echo $pont;?></option>                                                            
                                   <?php }?>                                                                                                            
                               <?php }
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
                                  for($i=2000; $i <=2030; $i++){?>
                                    <option value="<?=$i;?>" <?php if(substr($linha->anomodelo, 0, -5)== $i){echo "selected='selected'";} ?>><?=$i;?></option>                                                                                                          
                                <?php }
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
                                  for($i=2000; $i <=2030; $i++){?>
                                    <option value="<?=$i;?>" <?php if(substr($linha->anomodelo, 5, 4)== $i){echo "selected='selected'";} ?>><?=$i;?></option>                                                                                                          
                                <?php }
                                  ?>  
                                </select>
                            </div>
                        </div>    


                        <div class="col-sm-4 mb-2 mb-sm-3">
                            <label for="">Placa do veículo</label>
                            <input type="text" class="form-control" name="placa" value="<?=$linha->placa;?>"  placeholder="---">
                        </div>                                           
                        

                    </div>
                </div>
                <!-- COLUNA 02 -->                                                                       

            </div>  


            <div class="col-sm-4 mb-2 mb-sm-3">
                <button type="submit" class="btn btn-primary"> Editar </button>
            </div>       

            <input type="hidden" name="editar">
            <input type="hidden" name="id" value="<?=$linha->id_cars;?>">
        </form>
          </div>

        </div>
      </div>
    </div>
 
<?php } ?>

</div>
<?php
 
# seleciona o total de registros  
$sql_Total = 'SELECT * FROM cars';
  
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
    echo '<li><a class="anterior" href="listaCars.php">Anterior</a></li>';
    }

    if($qtdPag > 1 && $pg <= $qtdPag){
        
        for($i = 1; $i <= $qtdPag; $i++){
 
            if($i == $pg){
 
                echo "<li><a class='ativo'>".$i."</a></li>";
 
            } else {
 
                echo "<li><a href='listaCars.php?busca&pg=$i'>".$i."</a></li>";
                
            }
  
        }
 
    }

    if($qtdPag > 1 && $pg <= $qtdPag){ 
    echo "<li><a class='proxima' href='listaCars.php?busca&pg=$qtdPag'>Próxima</a></li>";
    }
    echo "</div></div>";
 
?>


<!-- MODAL -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
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
      include_once('./delUser.php'); 
      include_once('./delCars.php'); 
      ?>
