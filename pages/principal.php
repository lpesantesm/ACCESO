<?php 
//***************************************************************************
//      FECHA: 29/03/2017
//      AUTOR: ROLANDO FLORES DE VALGAS
//  PROPOSITO: PAGINA PRINCIPAL DEL SISTEMA DONDE SE CARGAN EL MENU 
//***************************************************************************
@session_start(); 
require_once("../lib/validasesion.php");//VALIDA SESION 

?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>GRUPO VITESEG | MODULO DE <?php echo $_SESSION["nombremodulo"]; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../css/skins/_all-skins.min.css">
  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="./principal.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>V</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>GRUPO</b> VITESEG</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span style="padding-top:15px">MODULO DE <?php echo $_SESSION["nombremodulo"]; ?></span>
      </a>
          <!-- User Account: style can be found in dropdown.less -->
          <?php $paginainfo = "infoprincipal.php";
		  require_once($paginainfo ); ?>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
        <ol class="nav nav-pills nav-stacked">
        <li><a href="./moduloprincipal.php"><i class="fa fa-cube"></i>MODULOS DEL SISTEMA</a></li>
        <?php /* <li><a href="#">Layout</a></li> */?>
        <?php if ( !empty($idmodulo) ) {?><li class="active"><?php echo $titulopagina; ?></li><?php }?>
      </ol><?php 
		    //AGREGA EL MENU PRINCIPAL A LA PAGINA
			$paginamenu = "menuprincipal.php";
			require_once($paginamenu);
		?>	
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) --><!-- Main content -->
    <section class="content">
      <div class="row">
        
        <?php 
		  $pagina = isset($_GET["pg"]) ?  $_GET["pg"] : '';
		  $directoriomodulo =  isset($_SESSION["directoriomodulo"]) ?  strtolower($_SESSION["directoriomodulo"]) : '';
		  $enlacepagina = $_SERVER["DOCUMENT_ROOT"]."/pages/".$directoriomodulo.'/'.$pagina;
		  if (!empty($pagina) && file_exists($enlacepagina)) {
		      require_once($enlacepagina);
		  }		
		//print_r($_SESSION);?>
       
        <!-- /.col --><!-- /.col -->
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <?php 
  //************************************************
  //AGREGA PIE DE PAGINA DEL SISTEMA
   $piepagina = 'piepagina.php';
   include($piepagina);
   ?>
  <!-- Control Sidebar -->
  <?php 
   //************************************************
   //AGREGA CONTROL DE PAGINA PRINCIPAL, TEMA, COLORES
   $controlpagina = 'controlpagina.php';
   include($controlpagina);
   ?>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../js/bootstrap.min.js"></script>
<!-- Slimscroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../js/demo.js"></script>
</body>
</html>
