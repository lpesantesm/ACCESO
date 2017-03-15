<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>GRUPO VITESEG S.A.</title>

    <!-- Bootstrap -->
    <link href="./vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="./vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="./vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="./vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="./build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form" >
          <section class="login_content" >
            <form >
              <h1><img src="images/logo.png" width="385" height="101"></h1>
              <?php /* <div class="item form-group"> 
               <div class="col-md-6 col-sm-6 col-xs-12">*/?>
               <div>
                <input type="text" class="form-control col-md-7 col-xs-12" placeholder="USUARIO" data-validate-words="1"  required />
              </div>
              <?php /* </div> */?>
              <?php /* <div class="item form-group"> 
              <div class="col-md-6 col-sm-6 col-xs-12">*/?>
              <div>
                <input type="password" class="form-control col-md-7 col-xs-12" placeholder="CONTRASEÑA" required />
              </div>
              <?php /* </div> */?>
              <div>
              <button id="send" type="submit" class="btn btn-success">INICIAR SESION</button>
                <?php /* <a class="btn btn-default submit" href="index.html">INICIAR  SESION</a> */?>
                <a class="reset_pass" href="#">¿OLVIDO SU CONTRASEÑA?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link"><?php /* New to site? 
                  <a href="#signup" class="to_register"> Create Account </a>*/?>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1></h1>
                  <p>©<?php echo date("Y");?> TODOS LOS DERECHOS RESERVADOS. <br />GRUPO VITESEG</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <?php /* <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div> */?>
      </div>
    </div>
        <!-- jQuery -->
    <script src="./vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="./vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="./vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="./vendors/nprogress/nprogress.js"></script>
    <!-- validator -->
    <script src="./vendors/validator/validator.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="./build/js/custom.min.js"></script>
  </body>
</html>
