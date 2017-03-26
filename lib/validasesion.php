<?php 
//************************************************************************
//FECHA: 21/03/2017
//AUTOR: ROLANDO FLORES DE VALGAS
//DESCRIPCION: VALIDA SESION REQUERIDA EN PAGINAS ESPECIFICAS
//************************************************************************
$script = '<div class="callout callout-danger">
                <h4>Su sesión ha caducado!</h4>

                <p>Dentro de poco será redireccionado.</p>
              </div> 

<script> 
  setTimeout ("redireccionar()", 2000); //tiempo expresado en milisegundos
  function redireccionar(){
           top.location="'.$_SERVER["REQUEST_SCHEME"]. '://' . $_SERVER["HTTP_HOST"].'/pages/salir.php";
                         }
</script>';
if (empty($_SESSION["idusuario"])) {
	session_destroy();
    print($script);
    exit;
	}

?>