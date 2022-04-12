<?php
ob_start();
session_start();

include_once("conexao/conecta.php");

if(isset($_POST['logar'])){

  $email = trim($_POST['usuario']);  
  $senha = md5(trim($_POST['senha']));  
  $senha_n = trim($_POST['senha']); 
  $ativo = "Y"; 
	
  $select = "SELECT * FROM usuarios WHERE email =:email AND senha = :senha AND ativo =:ativo";
 	
	try{
		
		$result = $conexao->prepare($select);
		$result->bindParam(':email', $email, PDO::PARAM_STR);
		$result->bindParam(':senha', $senha, PDO::PARAM_STR);
		$result->bindParam(':ativo', $ativo, PDO::PARAM_STR);
		$result->execute();
    $contar = $result->rowCount();     
    $query = $result->FETCH(PDO::FETCH_OBJ);

 		
		if($contar > 0){
                    
      $id_users = $query->id_users;
      $username = $query->nome; 
      $nivel = $query->nivel; 
      $senha = $query->senha; 
      $email = $query->email; 
       
			
			$_SESSION['id_users']  = $id_users;
			$_SESSION['username']  = $username;
			$_SESSION['nivel']     = $nivel;
			$_SESSION['email']     = $email;
			$_SESSION['senha']     = $senha;
			$_SESSION['senha_n']   = $senha_n;
			
			header("Location:painel/index.php");

		} else {
			header("Location:index.php?aviso=error");
		}
		
	}catch(PDOException $e){	echo $e;}
}
?>

<!DOCTYPE html>
<html lang=pt-BR>

<head><meta charset="euc-jp">

  
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Desenvolve MT - Login</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body>
  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="col-xl-6 col-lg-12 col-md-6">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">


                <div class="p-5">                
                  <div class="text-center">               
                    <h1 class="h4 text-gray-900 mb-4">SISTEMA DE RESERVAS</h1>
                  </div>

                  <form action="./" method="post" class="user">                    

                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="usuario" placeholder="Usuário">
                    </div>

                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="senha" placeholder="Senha">
                    </div>
                  <!-- <hr> -->
                    <button class="btn btn-primary btn-user btn-block" type="submit">Login</button>
                    <input type="hidden" name="logar">
                  </form>

                  
                  <div class="m-4"></div>
                  
                  <?php if(isset($_GET['aviso'] )== 'error') : ?>
                    <div class="card bg-danger text-white shadow">
                      <div class="card-body">
                        Acesso Negado!
                        <div class="text-white-50 small">Usuário ou Senha inválidos!</div>
                      </div>
                    </div>
                    <?php endif;?>   
                    
                    
                    <hr>
                    <div class="text-center" style="font-size: 12px">
                      &copy 2021
                    </div>

                </div>
              </div>
            </div>
          </div>
        </div>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>
</html>
