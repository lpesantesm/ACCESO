<?php 
@session_start();
$msgerror = '';
$estadoform =  isset($_POST['frm_estado']) ? $_POST['frm_estado'] : '';
//VALIDA QUE SE HAYA HECHO UN SUBMIT
if ( !empty($estadoform) && $msgerror == '' ){
    $ind = 0;
	//CONVIERTE LOS DATOS ENVIADOS POR POST A VARIABLES
	foreach ($_POST as $fn => $fv) {
            if (substr($fn,3,1)== '_') {   //CAMPOS SIMPLES
			   $asignacion = "\$" . substr($fn, 4) . "='" . $fv . "';";
               eval($asignacion);
			}
	}
	
require_once('class/se/clsSe_Usuario.php');
if ($msgerror == '') {
	$ose_usuario = new Se_Usuario();
	$ose_usuario->__set('idusuario', $idusuario);
	$ose_usuario->__set('clave', md5($clave));
	$ose_usuario->__set('ip', $_SERVER['REMOTE_ADDR']);
    $reg = $ose_usuario->validaUsuario(); 
	//var_dump($reg);
	//var_dump($_SERVER);
	//exit;
	//print_r($reg);
	if (is_array($reg)) {
		if ($reg["ov_respuesta"]== 'S') {
			//$regusuario = $ose_usuario->getFullinfo(); 
		    $_SESSION["nombreusuario"] = $regusuario[""];
		    $_SESSION["idusuario"] = $regusuario["idusuario"];
		    header("Location: pages/moduloprincipal.php"); 	
        }else{
			$msgerror = 'USUARIO/CONTRASEÑA INCORRECTA';
			}
		
	} 
	
	//var_dump($reg);
    /*if (!is_array($list_tipojustmasiva)) {
        $msgError = $obj_Rh_Tablas->getMsjAlerta();
        }*/
}
	
}//FIN DE VALIDACION if ( !empty($estadoform) && $msgerror == '' ){
//echo $_SERVER["DOCUMENT_ROOT"];
?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 2 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
  <img src="images/logo.png" width="313" height="101">
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">INGRESE SUS DATOS PARA INICIAR SESION</p>

    <form action="index.php" method="post" onSubmit="index.php">
    <input name="frm_estado" type="hidden" value="E">
      <div class="form-group has-feedback">
        <input name="txt_idusuario" id="txt_idusuario" class="form-control" placeholder="USUARIO">
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" name="txt_clave" id="txt_clave" class="form-control" placeholder="CONTRASEÑA" >
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-7">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox"> RECORDARME
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="col-xs-5">
          <button type="submit" class="btn btn-primary btn-block btn-flat">INICIAR SESION</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

    <?php /* <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
      <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> */?>
    <!-- /.social-auth-links -->

    <a href="#">OLVIDE MI CLAVE</a><br>
    <?php /* <a href="register.html" class="text-center">Register a new membership</a> */?>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.2.3 -->
<script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="../../plugins/iCheck/icheck.min.js"></script>
<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
