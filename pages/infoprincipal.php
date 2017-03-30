<?php 
//***************************************************************************
//      FECHA: 29/03/2017
//      AUTOR: ROLANDO FLORES DE VALGAS
//  PROPOSITO: INFORMACION DEL USUARIO, BOTONES DE SESION Y PERFIL 
//***************************************************************************
@session_start();
?><div class="navbar-custom-menu">

        <ul class="nav navbar-nav">
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../images/userprofile.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo $_SESSION["nombreusuario"];?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../images/userprofile.png" class="img-circle" alt="User Image">

                <p>
                  <?php echo $_SESSION["nombreusuario"];?>
                  <small><b>ULTIMA SESION: </b><?php echo $_SESSION["ultimasesion"];?></small>
                </p>
              </li>
              <!-- Menu Body -->
              <?php /* <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>
                <!-- /.row -->
              </li> */?>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">PERFIL</a>
                </div>
                <div class="pull-right">
                  <a href="./salir.php" class="btn btn-default btn-flat">CERRAR SESION</a>
                </div>
              </li>
            </ul>
          </li>
                    <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>