<?php
include("conexao/conecta.php");

if(isset($_POST['resetar'])) {

    $email = $_POST['email'];
    $reset = "SELECT * FROM usuarios WHERE email='" . $email . "'";
    $resetDados = $conexao->prepare($reset);
    $resetDados->execute();
    $contReset = $resetDados->rowCount();

    if ($contReset > 0) {

        $ver = $resetDados->FETCH(PDO::FETCH_OBJ);

        $formNome = $ver->nome;
        $formLogin = $ver->login;
        $formSenha =  $ver->senha;

        // emails para quem será enviado o formulário

        $emailenviar = $ver->email;
        $destino = $emailenviar;
        $assunto = "SOLICITAÇÃO DE SENHA";

        // É necessário indicar que o formato do e-mail é html
        $headers = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $headers .= 'From: ' . $formNome . ' <' . $email . ' >';
        //$headers .= "Bcc: $EmailPadrao\r\n";

        $mensagemHTML = '<table width="100%" border="0" cellspacing="0" cellpadding="10" style="border:1px solid #ccc;">
  <tr>
    <th height="76" colspan="3" align="center" valign="middle" bgcolor="#eee" scope="col" style="color:#fff; background: #000; border-bottom:1px solid #ccc;"><img src="http://carrao.net/img/carrao-logo.png" style="width:100px"/></th>
  </tr>
  <tr>
    <td width="10%" align="left" valign="middle" style="border-bottom:1px solid #ccc;">Seu nome : </td>
    <td width="80%" align="left" valign="middle" style="border-bottom:1px solid #ccc;">' .$formNome. '</td>
  </tr>
  <tr>
    <td width="10%" align="left" valign="middle" style="border-bottom:1px solid #ccc;">Seu login : </td>
    <td width="80%" align="left" valign="middle" style="border-bottom:1px solid #ccc;">' .$formLogin. '</td>
  </tr>
  <tr>
    <td width="10%" align="left" valign="middle" style="border-bottom:1px solid #ccc;">Sua senha: </td>
    <td width="80%" align="left" valign="middle" style="border-bottom:1px solid #ccc;">' .$formSenha. '</td>
  </tr>
  <tr>
    <th height="55" colspan="3" align="center" valign="middle" bgcolor="#eee" scope="row">SOLITICÃO DE SENHA - SITE DO CARRÃO</th>
  </tr>
  </table>';

        $enviaremail = mail($destino, $assunto, $mensagemHTML, $headers);
        if ($enviaremail) {
            $retornoMsg = true;
        } else {
            $retornoMsgError = true;
        }
    } else { $retornoMsgError = true; }
}
?>
<!DOCTYPE html>
<html lang="br">  
 <head>
    <meta charset="utf-8">
    <title>Recuperar senha - WVA System</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes"> 
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
<link href="css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css" />

<link href="css/font-awesome.css" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600" rel="stylesheet">
    
<link href="css/style.css" rel="stylesheet" type="text/css">
<link href="css/pages/signin.css" rel="stylesheet" type="text/css">

</head>

<body>
	
	<div class="navbar navbar-fixed-top">
	
	<div class="navbar-inner">
		
		<div class="container">
			
			<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</a>
			
                    <a class="brand" href="resetar.php">
				Recuperar senha - Carrão				
			</a>		
			
			<div class="nav-collapse">
				<ul class="nav pull-right">
					<li class="">						
                                            <a href="index.php" class="">
							Fazer login
						</a>
						
					</li>
					<li class="">						
						<a href="../" class="">
							<i class="icon-chevron-left"></i>
							Acessar o site
						</a>
						
					</li>
				</ul>
				
			</div><!--/.nav-collapse -->	
	
		</div> <!-- /container -->
		
	</div> <!-- /navbar-inner -->
	
</div> <!-- /navbar -->



<div class="account-container register">
	
	<div class="content clearfix">
		
		<form action="" method="post">

            <?php if($retornoMsg){?>
            <p class="alert-success" style="padding: 10px">Sua solicitação foi enviado para o seu email, por favor
                se necessário, veja a sua caixa de spam.</p>
            <?php } else if($retornoMsgError){?>
                <p class="alert-error" style="padding: 10px">Opa!. Este email não existe.</p>
            <?php } ?>

			<h1>Recuperar senha</h1>			
			
			<div class="login-fields">

				<p>Digite o e-mail cadastrado no sistema:</p>

				<div class="field">
					<label for="email">Email Address:</label>
					<input type="email" required id="email" name="email" value="" placeholder="Email" class="login"/>
                    <input name="resetar" type="hidden">
				</div> <!-- /field -->
				
			
				
			</div> <!-- /login-fields -->
			
			<div class="login-actions">
				<button class="button btn btn-primary btn-large">Recuperar senha</button>
			</div> <!-- .actions -->
			
		</form>
		
	</div> <!-- /content -->
	
</div> <!-- /account-container -->


<!-- Text Under Box -->
<div class="login-extra">
	Deseja logar-se? <a href="index.php">Clique aqui para entrar</a>
</div> <!-- /login-extra -->


<script src="js/jquery-1.7.2.min.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/signin.js"></script>

</body>

 </html>
