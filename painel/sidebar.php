    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center " href="#">
        <div class="sidebar-brand-icon">
          <i class="fas fa-user"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SISTEMA DE RESERVAS</div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="./">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Home</span></a>
      </li>

      <!-- Divider -->
      <!-- <hr class="sidebar-divider mb-4"> -->
      <li class="nav-item">
        <a class="nav-link" href="res_veiculos.php">
          <i class="fas fa-fw fa-car"></i>
          <span>Reservar Veículo</span></a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="salas.php">
         <i class="fas fa-chalkboard-teacher"></i>
          <span>Reservar Sala Reunião</span></a>
      </li>
      </li>


      <!-- Divider -->
      <hr class="sidebar-divider mb-4" style="display:none">

      <?php /*
      $useADM = [
        'michelfernandes@desenvolvemt.local',
        'joaocosta@desenvolvemt.local',
        'gilbertoalcantara@desenvolvemt.local',
        'elizandrasakamoto@desenvolvemt.local',
        'emilyoliveira@desenvolvemt.local',
      ];

      foreach($useADM AS $key => $value){
         $adm = $value;

         if($adm == $_SESSION['id_users']) {*/

          if($_SESSION['nivel'] == "SA"){
      ?>

      <!-- Heading -->
      <div class="sidebar-heading" style="display:none">
        USUÁRIOS
      </div>

      <!-- Nav Item - Pages Collapse Menu -->      
      <li class="nav-item" style="display:none">
        <a class="nav-link collapsed pad-5" href="./cadUsuarios.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Cadastrar Usuários</span>
        </a>

        <a class="nav-link collapsed pad-5" href="./listaUsuarios.php" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-list"></i>
          <span>Lista de Usuários</span>
        </a>       
      </li>

      <hr class="sidebar-divider my-4 mb-4">
      <div class="sidebar-heading">
        Veículos
      </div>   
     
      <li class="nav-item">
        <a class="nav-link collapsed pad-5" href="./cadCars.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-user"></i>
          <span>Cadastrar Veículos</span>
        </a>

        <a class="nav-link collapsed pad-5" href="./listaCars.php" aria-expanded="true" aria-controls="collapseTwo">
        <i class="fas fa-list"></i>
          <span>Lista de Veículos</span>
        </a>
      </li>

      <hr class="sidebar-divider my-4 mb-4">
      <div class="sidebar-heading">
        Relatórios
      </div>   
      
      <li class="nav-item">        
        <a class="nav-link collapsed pad-5" href="./listaReservas.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-list"></i>
          <span>Veículos</span>
        </a>
      </li>

      <li class="nav-item">        
        <a class="nav-link collapsed pad-5" href="./listaReservasSalas.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-list"></i>
          <span>Salas de Reuniões</span>
        </a>
      </li>   

      <hr class="sidebar-divider my-4 mb-4">
      <div class="sidebar-heading">
        Edição Manual de Reservas
      </div>   
      
      <li class="nav-item">        
        <a class="nav-link collapsed pad-5" href="./cadManualCars.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-list"></i>
          <span>Cadastro Reserva Veículos</span>
        </a>
      </li>

      <li class="nav-item">        
        <a class="nav-link collapsed pad-5" href="./listaReservasSalas.php" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-list"></i>
          <span>Cadastro Reserva S. Reuniões</span>
        </a>
      </li>   
      

      <?php } ?>

<hr class="sidebar-divider my-4 mb-4">

<li class="nav-item">
  <a class="nav-link collapsed pad-5" href="#" data-toggle="modal" data-target="#logoutModal" aria-expanded="true" aria-controls="collapseTwo">
  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>       
    <span> Sair</span>
  </a>
</li>
         
      <!-- Divider 
      <hr class="sidebar-divider d-none d-md-block">-->
     
    </ul>
    <!-- End of Sidebar -->