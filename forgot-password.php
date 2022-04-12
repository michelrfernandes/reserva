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
        $formSenha =  $ver->senha_n;

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
    <th height="76" colspan="3" align="center" valign="middle" bgcolor="#eee" scope="col" style="color:#fff; background: #000; border-bottom:1px solid #ccc;"><img src="http://fonsecafonseca.adv.br/wp-content/uploads/2020/07/logomarca-fonseca.png" style="width:200px"/></th>
  </tr>
  <tr>
    <td width="10%" align="left" valign="middle" style="border-bottom:1px solid #ccc;">Seu nome : </td>
    <td width="80%" align="left" valign="middle" style="border-bottom:1px solid #ccc;">' .$formNome. '</td>
  </tr>
  <tr>
    <td width="10%" align="left" valign="middle" style="border-bottom:1px solid #ccc;">Sua senha: </td>
    <td width="80%" align="left" valign="middle" style="border-bottom:1px solid #ccc;">' .$formSenha. '</td>
  </tr>
  <tr>
    <th height="55" colspan="3" align="center" valign="middle" bgcolor="#eee" scope="row">SOLICITAÇÃO DE SENHA - FONSECA E FONSECA ADVOGADOS</th>
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
<html lang="pt-BR">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Solicitação de Senha</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

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
                    <h1 class="h4 text-gray-900 mb-2">Esqueceu a senha?</h1>
                    <p class="mb-4">Entre com o seu email, sua senha será enviada para o email informado</p>
                  </div>
                  <form class="user" method="POST" action="">
                    <div class="form-group">
                      <input type="email" class="form-control form-control-user" name="email" required placeholder="Digite o seu Email">
                    </div>
                    <input type="submit" class="btn btn-primary btn-user btn-block" value="Solicitar"/>
                    <input type="hidden" name="resetar">
                  </form>
                  <div class="m-4"></div>
                  <div class="text-center">
                    <a class="small" href="./">Logar novamente!</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <?php if($retornoMsg){?>
           
            <div class="card bg-success text-white shadow">
                <div class="card-body">
                    Solicitação com Sucesso!
                    <div class="text-white-50 small">Sua solicitação foi enviado para o seu email, por favor
                se necessário, veja a sua caixa de spam.</div>
                </div>
            </div>
            <?php } else if($retornoMsgError){?>
            
            
            <div class="card bg-danger text-white shadow">
                <div class="card-body">
                    Solicitação Negada!
                    <div class="text-white-50 small">Opa!. Este email não existe.</div>
                </div>
            </div>
            <?php } ?>

      </div>

    </div>

  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

</body>

</html>
