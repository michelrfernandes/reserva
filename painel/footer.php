     <style>
       .Finalizado{
         display: none;
       }
     </style>

        <!-- Footer 
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; Desenvolve MT 2021</span>
          </div>
        </div>
      </footer>
       End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Deseja realmente sair?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Selecione "Logout" para sair definitivamente do sistema.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="?sair">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
<div class="modal fade" id="modalCalendar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header">
        <h5  class="modal-title" style="flex:1; margin:auto" id="exampleModalLabel">DETALHES DA RESERVA 
        <h5 id="situacao" style="color: #fff; border-radius: 5px; margin:auto; padding: 10px 30px; text-transform: uppercase"></h5>
      </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">

        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Reservador por :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="nome"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Veículo :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="titulo"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Data da Reserva :  <p style="margin-left: 10px; text-transform: uppercase; color: red" class="font-weight-bold" id="reserva_start"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Data Prévia da Liberação da Reserva : <p style="margin-left: 10px; text-transform: uppercase; color: #198754" class="font-weight-bold" id="reserva_end"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Duração :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="duracao"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Repetição :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="repeticao"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">KM Inicial :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="kmInicial"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">KM Final :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="kmFinal"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Comentário :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="comentario"></p></div>
        </div>

        <div class="col-sm-12">
            <form action="delReservas.php" method="post" enctype="multipart/form-data">
                <input id="uuid" type="hidden" value="" name="uuid"/>
                <input id="cod" type="hidden" value="" name="id_res"/>
                <input type="hidden" value="<?php echo $_SESSION['id_users']?>" name="id_session"/>
                <input type="hidden" name="del_res"/>
                <button type="submit" id="btnDel" class="btn btn-danger"> Clique aqui para "CANCELAR A RESERVA" ! </button>
            </form>
        </div>

      </div>
      </div>      
    </div>
  </div>
</div>

<!-- MODAL VIEW RESERVAS SALAS -->
<div class="modal fade" id="modalCalendarSalas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" style="flex:1; margin:auto" id="exampleModalLabel">DETALHES DA RESERVA SALA 
        <h5 id="situacao" style="color: #fff; border-radius: 5px; margin:auto; background: red; padding: 10px 30px; text-transform: uppercase"></h5>
      </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">

        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Reservador por :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="titulo"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Ambiente :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="sala"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Departamento :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="departamento"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Data da Reserva :  <p style="margin-left: 10px; text-transform: uppercase; color: red" class="font-weight-bold" id="reserva_start"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Data Prévia da Liberação da Reserva : <p style="margin-left: 10px; text-transform: uppercase; color: #198754" class="font-weight-bold" id="reserva_end"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Duração :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="duracao"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Repetição :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="repeticao"></p></div>
        </div>
        <div class="col-sm-12">
            <div class="col-xl-12 text-left" style="display: flex">Comentário :  <p style="margin-left: 10px; text-transform: uppercase" class="font-weight-bold" id="comentario"></p></div>
        </div>

        <div class="col-sm-12">
            <form action="delReservas.php" method="post" enctype="multipart/form-data">
                <input id="uuid" type="hidden" value="" name="uuid"/>
                <input id="cod" type="hidden" value="" name="id_res"/>
                <input type="hidden" value="<?php echo $_SESSION['id_users']?>" name="id_session"/>
                <input type="hidden" name="del_res_salas"/>
                <button type="submit" class="btn btn-danger"> Clique aqui para "CANCELAR A RESERVA" ! </button>
            </form>
        </div>

      </div>
      </div>      
    </div>
  </div>
</div>
<!-- MODAL VIEW RESERVAS SALAS -->


<?php

    $listCars = "SELECT * FROM cars";  
    $query = $conexao->prepare($listCars);
    $query->execute();


    $listRes = "SELECT id_reservas, km_entrada FROM reservas ORDER BY id_reservas DESC LIMIT 1";  
    $query1 = $conexao->prepare($listRes);
    $query1->execute();
    
?>


<!-- Modal CADASTRAR RESERVA -->
<div class="modal fade" id="modalCadastrar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Solicitar Reserva</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">

      <div id="message"></div>
          
        <form id="formCad"  action="cad_reserva.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <!-- COLUNA 01 -->
                <div class="col-sm-12 mb-0 mb-sm-0" style="padding: 20px;">
                    <div class="row">

                        <div class="col-lg-6 mb-2 mb-sm-3">
                        <label for="">Nome do requerente</label>
                            <input type="text" class="form-control" value="<?php echo mb_strtoupper($_SESSION['username']);?>" name="nome" placeholder="---" readonly> 
                        </div>

                        <div class="col-lg-6 mb-2 mb-sm-3">
                        <label for="">Veículo</label>
                            <div class="form-group">
                                <select class="form-control" name="veiculo" id="vplaca">
                                    <option value="0" selected="">---</option>
                                <?php
                                while($dataCars = $query->fetch(PDO::FETCH_OBJ)){
                                    $carComplete = $dataCars->nome.' - '.$dataCars->marca.' - '.$dataCars->motorizacao.' - '.$dataCars->anomodelo.' - '.$dataCars->placa;
                                ?>
                                    <option value="<?=$carComplete?>"><?=$carComplete?></option>
                               <?php } ?>  

                                </select>
                            </div>
                        </div>      

                        <div class="col-sm-2 mb-2 mb-sm-3">
                        <label for="">Último KM do Veículo</label>
                            <div class="form-group">                            
                                 <input type="text" class="form-control" id="kmdata" value="" name="rodagem" readonly>
                            </div>
                        </div>    


                        <div class="col-sm-3 mb-2 mb-sm-3">
                            <label for="">Repetição</label>
                            <input type="text" class="form-control" value="" name="repeticao"  placeholder="---">
                        </div>  

                        <div class="col-sm-3 mb-2 mb-sm-3">
                            <label for="">Data</label>
                            <!-- 2000-01-01T00:00:00 -->
                            <input type="datetime-local" class="form-control" value="" name="data_start"  placeholder="---">
                        </div>  

                        <div class="col mb-2 mb-sm-3">
                            <label for="">Duração</label>
                            <div class="form-group">
                                <select class="form-control" name="duracao">
                                  <option value="" selected="">---</option>
                                  <?php 
                                  for ($i=1; $i <=24 ; $i++) { ?>
                                      <option value="<?=$i;?>"><?=$i.'h';?></option>
                                  <?php } ?>
                                  
                                </select>
                            </div>
                        </div>  

                        <div class="col-sm-12 mb-2 mb-sm-3">
                            <label for="">Comentário</label>                            
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" rows="3"></textarea>
                        </div>  
                        
                        <!-- Alerta -->
                        <div class="col-12 mb-12 mb-sm-3" id="alertaV" style="display:none;">
                            <div class="form-group" style="background: #f6c23e; padding: 15px">
                              <span>O veículo <strong>Corolla</strong> não está disponível para viagens. Obrigado!</span>
                            </div>
                        </div>  
                        

                    </div>
                </div>
                <!-- COLUNA 02 -->                                                                       

            </div>  

            <div class="col-sm-4 mb-2 mb-sm-3">
                <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-primary"> Solicitar </button>
            </div>     
            <input type="hidden" name="idUser" value="<?php echo $_SESSION['id_users'];?>">

        </form>

      </div>

      </div>
    </div>
  </div>
</div>

<!-- CADASTRO DE RESERVA SALAS -->
<div class="modal fade" id="modalCadastrarSalas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SOLICITAR RESERVA</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <div class="row">

      <div id="message"></div>
          
        <form id="formCad"  action="cad_reserva_salas.php" method="post" enctype="multipart/form-data">
            <div class="form-group row">
                <div class="col-sm-12 mb-0 mb-sm-0" style="padding: 20px;">
                    <div class="row">

                        <div class="col-lg-6 mb-2 mb-sm-3">
                        <label for="">Nome do requerente</label>
                            <input type="text" class="form-control" value="<?php echo mb_strtoupper($_SESSION['username']);?>" name="nome" placeholder="---" readonly> 
                        </div>

                        <div class="col-lg-6 mb-2 mb-sm-3">
                        <label for="">Departamento</label>
                            <div class="form-group">
                                <select class="form-control" name="departamento">
                                    <option value="0" selected="">---</option> 
                                    <option value="CGB - Chefia de Gabinete">CGB - Chefia de Gabinete</option> 
                                    <option value="GAD - Gerencia Administrativa">GAD - Gerencia Administrativa</option> 
                                    <option value="GGP - Gerencia de Gestão de Pessoas">GGP - Gerencia de Gestão de Pessoas</option> 
                                    <option value="GIT - Gerencia de Infraestrutura Tecnológica">GIT - Gerencia de Infraestrutura Tecnológica</option> 
                                    <option value="UAJ - Unidade de Assessoria Jurídica">UAJ - Unidade de Assessoria Jurídica</option> 
                                </select>
                            </div>
                        </div>      

                        <div class="col-sm-4 mb-2 mb-sm-3">
                        <label for="">Ambiente</label>
                          <div class="form-group">
                                <select class="form-control" name="ambiente">
                                    <option value="0" selected="">---</option> 
                                    <option value="G">Sala de Reunião 1</option> 
                                    <option value="P">Sala de Reunião 2</option>
                                </select>
                            </div>
                        </div>    


                        <div class="col-sm-1 mb-2 mb-sm-3">
                            <label for="">Repetição</label>
                            <input type="text" class="form-control" value="" name="repeticao"  placeholder="---">
                        </div>  

                        <div class="col-sm-3 mb-2 mb-sm-3">
                            <label for="">Data</label>
                            <!-- 2000-01-01T00:00:00 -->
                            <input type="datetime-local" id="datime" class="form-control" value="" name="data_start"  placeholder="---">
                        </div>  

                        <div class="col mb-2 mb-sm-3">
                            <label for="">Duração</label>
                            <div class="form-group">
                                <select class="form-control" name="duracao">
                                  <option value="" selected="">---</option>
                                  <?php 
                                  for ($i=1; $i <=24 ; $i++) { ?>
                                      <option value="<?=$i;?>"><?=$i.'h';?></option>
                                  <?php } ?>
                                  
                                </select>
                            </div>
                        </div>  

                        <div class="col-sm-12 mb-2 mb-sm-3">
                            <label for="">Comentário</label>                            
                            <textarea class="form-control" id="exampleFormControlTextarea1" name="comentario" rows="3"></textarea>
                        </div>                                           
                        

                    </div>
                </div>

            </div>  

            <div class="col-sm-4 mb-2 mb-sm-3">
                <button type="submit" name="CadEvent" id="CadEvent" value="CadEvent" class="btn btn-primary"> Reservar </button>
            </div>     
            <input type="hidden" name="idUser" value="<?php echo $_SESSION['id_users'];?>">

        </form>

      </div>

      </div>
    </div>
  </div>
</div>
<!-- CADASTRO DE RESERVA SALAS -->

<!-- Modal ALERTA -->
<div class="modal fade" id="errorModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-times-circle"></i> Erro!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">
         Você tentou selecionar uma data retroativa! Por favor tente uma data mais recente /ou futura.
        </div>
      </div>
    </div>
  </div>
</div>

<!-- ERRO DE DELETAR RESERVA USUARIO DIFERENTE -->
<div class="modal fade" id="errorModaluser" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content alert-danger">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-times-circle"></i> Erro!</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" role="alert">
                    Você não tem permissão para fazer essa operação. Por favor entre em contato com administrador.
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ERRO DE DELETAR RESERVA USUARIO DIFERENTE -->


<div class="modal fade" id="errorModal2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert-danger">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-times-circle"></i> Erro!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-danger" role="alert">
         Você tentou selecionar uma horário retroativa! Por favor tente um horário igual ou maior.
        </div>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="errorModal3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert-warning">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> Ops!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning text-center" role="alert">
         Este veículo já estar reservado /ou nesta data /ou horário. Tente outros!
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL ERROR SALA -->
<div class="modal fade" id="errorModalSala" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert-warning">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> Ops!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning text-center" role="alert">
         Esta "SALA DE REUNIÃO" já estar reservada. Tente outra!
        </div>
      </div>
    </div>
  </div>
</div>

<!-- MODAL ERROR SALA HORAS-->
<div class="modal fade" id="errorModalSalaHoras" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content alert-warning">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-exclamation-triangle"></i> Ops!</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="alert alert-warning text-center" role="alert">
         Horário disponível apartir das 08:00 horas.
        </div>
      </div>
    </div>
  </div>
</div>

<?php if(@$_GET['aviso']=='error'){?>
        <script>
          $(document).ready(function(){
              $("#errorModal").modal('show');
          });
      </script>       
      <?php } else if(@$_GET['aviso']=='alerta'){?>
        <script>
          $(document).ready(function(){
              $("#errorModal3").modal('show');
          });
      </script>       
      <?php } else if(@$_GET['aviso']=='res'){?>
        <script>
          $(document).ready(function(){
              $("#errorModaluser").modal('show');
          });
      </script>       
      <?php } else if(@$_GET['aviso']=='s_error'){?>
        <script>
          $(document).ready(function(){
              $("#errorModalSala").modal('show');
          });
      </script>       
      <?php } else if(@$_GET['aviso']=='s_horas'){?>
        <script>
          $(document).ready(function(){
              $("#errorModalSalaHoras").modal('show');
          });
      </script>       
      <?php }?>

  <!-- Bootstrap core JavaScript-->

  <script>
    (function () {

      var select = document.getElementById('vplaca');

      select.addEventListener('change', function(){
      var valor = select.value.split('-');
      var valor1 = valor[0];
      var str = valor1.replace(/\s/g, '');

        if(str == 'Corolla'){
          var box = document.getElementById('alertaV').style.display = 'block'
        } else {
          var box = document.getElementById('alertaV').style.display = 'none'
        }

      })

    })()
  </script>

  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="../vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="../js/demo/datatables-demo.js"></script>

</body>

</html>
