<?php

// <editor-fold defaultstate="collapsed" desc="V A R I A B L E S">
 $pagsize = 10;
 $primeravez = true;
 $tipomensaje = null;
 $mensaje = null;
 $msgError = '';
 $subtitulo = '';
 $frmProceso = null;
 $frmEstado = null; 
 $idmodulo = null;
 $nombre = null;
 $descripcion = null;
 $directorio = null;
 $siglas = null;
 $orden = null;
 $idmodulopadre = null;
 $nombrepadre = null;
 $icono = null;
// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="R E C I B E  P A R A M E T R O S  D E S D E  E L  R E S U M E N">
 //NEW NUEVO
 //UPD MODIFICAR
 //CON CONSULTAR
 //DEL ELMINAR
if (isset($_GET['id'])){
    list($idmodulo,$frmProceso) = explode('$', $_GET['id']);    
    unset($_GET['id']);
}

 if (isset($_POST['hid_frmEstado'])){
    $primeravez = false;
    foreach ($_POST as $nombre_campo => $valor){
      if (substr($nombre_campo, 3, 1) == '_'){   // campos simples
        /*echo*/ $asignacion = "\$" . substr($nombre_campo, 4) . "='" . $valor . "';";
        //echo '</br>';
        eval($asignacion);
      }
    }    
 }

if(isset($frmProceso)){
    if ($frmProceso == 'NEW'){
         $subtitulo = 'AQUI PUEDE CREAR UN NUEVO MODULO PARA EL SISTEMA.'; 
    } elseif ($frmProceso == 'UPD'){
         $subtitulo = 'AQUI PUEDE MODIFICAR LA INFORMACI&Oacute;N DEL MODULO.'; 
    } elseif ($frmProceso == 'CON'){
        $subtitulo = 'AQUI PUEDE CONSULTAR LA INFORMACI&Oacute;N DEL SISTEMA.'; 
    } elseif ($frmProceso == 'DEL'){
        $subtitulo = 'AQUI PUEDE CONSULTAR ELIMINAR UN MODULO DEL SISTEMA.'; 
    } else{
        $msgError = 'OPCI&Oacute;N DEL FORMULARIO NO V&Aacute;LIDA.';
    }    
} 
// </editor-fold> 

// <editor-fold defaultstate="collapsed" desc="P R O C E D I M I E N T O">
if($primeravez && !is_null($idmodulo) && !empty($idmodulo)  && $idmodulo > 0){
//CONSULTO EL REGISTRO
    //INVOCA CLASE DE MODULO
    require_once($_SERVER['DOCUMENT_ROOT'].'/class/se/clsSe_Modulo.php');    
    $ose_modulo = new Se_Modulo();
    $ose_modulo -> __set("idmodulo", $idmodulo);
    $registro = $ose_modulo->get();
    //print_r($registro);
    
    // obtiene todos los campos del registro
    foreach ($registro as $regi => $valor){
        /*echo*/ $asignacion = "\$" . $regi . "='" . $valor . "';";
        eval($asignacion);
    } // for    
}  

if($frmEstado > 0){
    //echo '$frmEstado > 0';
    // <editor-fold defaultstate="collapsed" desc="V A L I D A C I O N E S">
    require_once('../../lib/validaciones.php');
    $msgError = '';
    if ($msgError == '') { validaTexto($idmodulo,  false ,  false ,  true ,  "" ,  false ,  1, 4, "C&Oacute;DIGO",  $msgError);}
    if ($msgError == '') { validaTexto($nombre, true, true, true, " ", true, 5, 100, "NOMBRE", $msgError); }
    if ($msgError == '') { validaTexto($descripcion, true, true, true, " ", true, 0, 100, "DESCRIPCI&Oacute;N", $msgError); }       
    if ($msgError == '') { validaTexto($directorio, true, true, true, "/", false, 0, 100, "DIRECTORIO", $msgError); }       
    if ($msgError == '') { validaTexto($siglas, true, true, true, "", true, 0, 100, "SIGLAS", $msgError); }
    if ($msgError == '') { validaTexto($orden,  false ,  false ,  true ,  "" ,  false ,  1, 2, "ORDEN",  $msgError);}       
    if ($msgError == '') { validaTexto($idmodulopadre,  false ,  false ,  true ,  "" ,  false ,  0, 4, "MODULO PADRE",  $msgError);}              
    if ($msgError == '') { validaTexto($icono, true, true, true, "", true, 2, 100, "ICONO", $msgError); }              

    if ($msgError == ''){
       require_once("../../class/se/clsSe_Modulo.php");
       $ose_modulo = new Se_Modulo();
       $ose_modulo->__set('idmodulo', $idmodulo);
       $ose_modulo->__set('nombre', $nombre);
       $ose_modulo->__set('descripcion', $descripcion);
       $ose_modulo->__set('directorio', $directorio);           
       $ose_modulo->__set('siglas', $siglas);          
       $ose_modulo->__set('orden', $orden);           
       $ose_modulo->__set('idmodulopadre', $idmodulopadre);          
       $ose_modulo->__set('icono', $icono);
       $ose_modulo->__set('idusuariolog', $_SESSION["idusuario"]);
       $ose_modulo->__set('ip', $_SERVER['REMOTE_ADDR']);
    } else{ echo '$msgError != '; ?>
        <div class="alert alert-warning" role="alert"><?php echo $msgError; ?></div>
    <?php return; } 
    // ($msgError == "")             
    // </editor-fold>     

    // <editor-fold defaultstate="collapsed" desc="O P E R A C I O N E S">
    if ($frmEstado == 1){
        $resultado = $ose_modulo->insert(); 
    } elseif ($frmEstado == 2){
        $resultado = $ose_modulo->update(); 
    } elseif ($frmEstado == 3){
        $resultado = $ose_modulo->delete(); 
    } else{
        $msgError = 'OPCI&Oacute;N DEL FORMULARIO NO V&Aacute;LIDA.';
    }            

    if ($msgError == ''){
        if (is_array($resultado)){
            if($resultado['on_errcode'] == -20000){?>
                <div class="alert alert-danger" role="alert"><?php echo $resultado['ov_errmsg']; ?></div>
            <?php return; }else{ ?>
                <div class="alert alert-success" role="alert">
                <?php if($frmEstado == 1){
                        echo 'MODULO INGRESADO CON EXITO. SU C&Oacute;DIGO ES: ' . $resultado['on_errcode'];
                      }elseif ($frmEstado == 2){
                        echo 'INFORMACION DEL MODULO HA SIDO ACTUALIZADA CON EXITO.';                              
                      }else{
                          echo 'MODULO ELEMINADO CON EXITO.';
                      }?>
                </div>
      <?php return; }
        }
    }
    // </editor-fold>
}
// </editor-fold> 

?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">    
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
    </head>
    <body>
        <!-- ROW -->        
        <div class="row">
            <!-- CONTENT-HEADER" (PAGE HEADER) -->
            <section class="content-header">
                <h1> MODULOS DEL SISTEMA <small><?php echo $subtitulo; ?></small> </h1>
            </section> 
            <!-- / CONTENT-HEADER" (PAGE HEADER) -->   
            <!-- Main content -->
            <section class="content">
                <!-- .box -->
                <div class="box box-warning">
                    <!-- .form-horizontal -->        
<!--                    <form class="form-horizontal" action="#" method="post" onSubmit="#">-->
                    <form class="form-horizontal" id="frm" name="frm" method="post" action="" data-parsley-validate>
                      <input type="hidden" name="hid_frmEstado" id="hid_frmEstado" value="<?php echo $frmEstado; ?>" />                        
                      <input type="hidden" name="hid_frmProceso" id="hid_frmProceso" value="<?php echo $frmProceso; ?>" />                                              
                      <div class="box-body">
                        <div class="form-group">
                            <label for="txt_idmodulo" class="col-sm-2 control-label">C&Oacute;DIGO: </label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="txt_idmodulo" name="txt_idmodulo" placeholder="C&Oacute;DIGO" disabled="true" value="<?php echo $idmodulo; ?>">
                          </div>
                        </div>   
                        <div class="form-group">
                            <label for="txt_nombre" class="col-sm-2 control-label">NOMBRE: </label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="NOMBRE DEL MODULO" required="true" maxlength="100" pattern="[a-zA-Z][a-zA-Z ]{5,100}" title="SOLO DEBE CONTENER LETRAS, DEBE TENER COMO M&Iacute;NIMO 5 CARACTERES." value="<?php echo $nombre; ?>">
                          </div>
                        </div>
                        <div class="form-group">
                            <label for="txt_descripcion" class="col-sm-2 control-label">DESCRIPCI&Oacute;N: </label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="txt_descripcion" name="txt_descripcion" placeholder="DESCRIPCI&Oacute;N DEL MODULO" required="true" maxlength="100" title="" value="<?php echo $descripcion; ?>">
                          </div>
                        </div>    
                        <div class="form-group">
                            <label for="txt_directorio" class="col-sm-2 control-label">DIRECTORIO: </label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="txt_directorio" name="txt_directorio" placeholder="NOMBRE DEL DIRECTORIO DONDE SE ALOJARAN LAS PAGINAS DEL MODULO" required="true" maxlength="4" pattern="[a-zA-Z]" title="SOLO DEBE CONTENER LETRAS" value="<?php echo $directorio; ?>">
                          </div>
                        </div>     
                        <div class="form-group">
                            <label for="txt_siglas" class="col-sm-2 control-label">SIGLAS: </label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="txt_siglas" name="txt_siglas" placeholder="SIGLAS PARA EL MODULO" required="true" maxlength="6" pattern="[a-zA-Z]" title="SOLO DEBE CONTENER LETRAS" value="<?php echo $siglas; ?>">
                          </div>
                        </div>    
                        <div class="form-group">
                            <label for="txt_orden" class="col-sm-2 control-label">ORDEN: </label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="txt_orden" name="txt_orden" placeholder="ORDEN EN QUE DEBERA APARECE EL MODULO EN LA PANTALLA DE SELECCION DE MODULO" required="true" maxlength="10" pattern="[A-Za-z- .]" title="SOLO DEBE CONTENER N&Uacute;MEROS" value="<?php echo $orden; ?>">
                          </div>
                        </div>     
                        <div class="form-group">
                            <label for="txt_nombrepadre" class="col-sm-2 control-label">MODULO PADRE: </label>
                          <div class="col-sm-10">
                              <input type="hidden" name="hid_idmodulopadre" id="hid_idmodulopadre" value="<?php echo $idmodulopadre; ?>" />
                              <input type="text" class="form-control" id="txt_nombrepadre" name="txt_nombrepadre" placeholder="MODULO PADRE" title="" value="<?php echo $nombrepadre; ?>">                                                        
                          </div>
                        </div>                               
                        <div class="form-group">
                            <label for="txt_icono" class="col-sm-2 control-label">ICONO: </label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="txt_icono" name="txt_icono" placeholder="ICONO QUE LLEVARA EL MODULO O SUBMODULO EN LA APLICACION (NOMBRE)" required="true" maxlength="2" pattern="[0-9]" title="SOLO DEBE CONTENER LETRAS" value="<?php echo $icono; ?>">
                          </div>
                        </div>                                                         
                      </div>
                      <!-- /.box-body -->
                      <div class="box-footer">
                          <center>
                            <?php
                                if ($frmProceso == 'NEW'){?>
                                <button type="button" class="btn btn-success" id="btn_enviar" name="btn_enviar" onclick="btn_EnviarOnClick(1);">GRABAR</button>
                              <?php } elseif ($frmProceso == 'UPD'){?>
                                <button type="button" class="btn btn-warning" id="btn_enviar" name="btn_enviar" onclick="btn_EnviarOnClick(2);">MODIFICAR</button>
                              <?php } elseif ($frmProceso == 'DEL'){ ?>
                                <button type="button" class="btn btn-danger" id="btn_enviar" name="btn_enviar" onclick="btn_EnviarOnClick(3);">ELIMINAR</button>
                              <?php } else {
                                    //$msgError = 'OPCI&Oacute;N DEL FORMULARIO NO V&Aacute;LIDA.';
                                }    
                            ?>                              
                                <button type="button" class="btn btn-default" onclick="javascript: { window.location ='principal.php?pg=segsemt0100.php'; }" >VOLVER</button>
                          </center>
                      </div>
                      <!-- /.box-footer -->
                    </form>                    
                    <!-- / .form-horizontal -->                            
                </div> 
                <div id="div_resultado"></div>
                <!-- / .box -->            
            </section>            
        </div>
        <!-- / ROW -->                
        <!-- / Main content -->
        <script type="text/javascript" src="../../js/formToCallPost.js"></script>   
         <script language="javascript">
             function btn_EnviarOnClick(a){
               var f = document.frm;
               if (f.btn_enviar.disabled == true) { return false;}
               f.hid_frmEstado.value = a;
               eval(formToCallPost(f,'se/segsemt0101.php','div_resultado',''));
             } //--
         </script>        
    </body>
</html>
