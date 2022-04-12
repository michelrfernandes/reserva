<?php
$listar = "SELECT * FROM usuarios WHERE id_users='".$_SESSION['id_users']."'";
$queryUser = $conexao->prepare($listar);
$queryUser->execute();
$contRow = $queryUser->rowCount();
$rowNivel = $queryUser->FETCH(PDO::FETCH_OBJ);
?>


<!-- Topbar -->
<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

<!-- Sidebar Toggle (Topbar) -->
<form class="form-inline">
  <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
    <i class="fa fa-bars"></i>
  </button>
</form>



<!-- Topbar Navbar -->
<ul class="navbar-nav ml-1">      
  <li class="nav-item dropdown no-arrow">
   
     <span class="mr-2 d-none d-lg-inline text-primary font-weight-bold">
      <i class="fas fa-user fa-sm fa-fw mr-2 text-primary"></i>
      <?php echo " Olá " . mb_strtoupper($_SESSION['username']). " , Bem vindo ao cadastro de reservas";?>
      </span>
  </li>
</ul> 

<ul class="navbar-nav ml-auto">
  <div class="topbar-divider d-none d-sm-block"></div>

  <!-- Nav Item - User Information -->
  <li class="nav-item dropdown no-arrow" style="display:none">
    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <span class="mr-2 d-none d-lg-inline text-gray-600 small">
      <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
          SAIR DO SISTEMA
      </span>
    </a>
    
    <!-- Dropdown - User Information -->
    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown" style="display:none">
      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
        Sair
      </a>
    </div>
  </li>

</ul>

</nav>
<!-- End of Topbar -->