<?php

// <editor-fold defaultstate="collapsed" desc="V A R I A B L E S">
 $pagsize = 10;
 $primeravez = true;
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

// <editor-fold defaultstate="collapsed" desc="RECIBE PARAMETROS DESDE EL RESUMEN">
 //NEW NUEVO
 //UPD MODIFICAR
 //CON CONSULTAR
 //DEL ELMINAR
if (isset($_GET['id'])){
    list($idmodulo,$frmProceso) = explode('$', $_GET['id']);    
    unset($_GET['id']);
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

 if (isset($_POST['hid_frmEstado'])){
    $primeravez = false;
 }   
// </editor-fold> 

// <editor-fold defaultstate="collapsed" desc="PROCEDIMIENTO">
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
        echo $asignacion = "\$" . $regi . "='" . $valor . "';";
        eval($asignacion);
    } // for    
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
                    <form class="form-horizontal" action="#" method="post" onSubmit="#">
                      <input type="hidden" name="hid_frmEstado" id="hid_frmEstado" value="<?php echo $frmEstado; ?>" />                        
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
                              <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="NOMBRE DEL MODULO" required="true" maxlength="100" pattern="[A-Z]{5,100}" title="SOLO DEBE CONTENER LETRAS, DEBE TENER COMO M&Iacute;NIMO 5 CARACTERES." value="<?php echo $nombre; ?>">
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
                              <input type="text" class="form-control" id="txt_directorio" name="txt_directorio" placeholder="NOMBRE DEL DIRECTORIO DONDE SE ALOJARAN LAS PAGINAS DEL MODULO" required="true" maxlength="4" pattern="[A-Z]" title="SOLO DEBE CONTENER LETRAS" value="<?php echo $directorio; ?>">
                          </div>
                        </div>     
                        <div class="form-group">
                            <label for="txt_siglas" class="col-sm-2 control-label">SIGLAS: </label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="txt_siglas" name="txt_siglas" placeholder="SIGLAS PARA EL MODULO" required="true" maxlength="6" pattern="[A-Z]" title="SOLO DEBE CONTENER LETRAS" value="<?php echo $siglas; ?>">
                          </div>
                        </div>    
                        <div class="form-group">
                            <label for="txt_orden" class="col-sm-2 control-label">ORDEN: </label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="txt_orden" name="txt_orden" placeholder="ORDEN EN QUE DEBERA APARECE EL MODULO EN LA PANTALLA DE SELECCION DE MODULO" required="true" maxlength="2" pattern="[0-9]" title="SOLO DEBE CONTENER N&Uacute;MEROS" value="<?php echo $orden; ?>">
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
                                <button type="submit" class="btn btn-success">GRABAR</button>
                              <?php } elseif ($frmProceso == 'UPD'){?>
                                <button type="submit" class="btn btn-warning">MODIFICAR</button>
                              <?php } elseif ($frmProceso == 'DEL'){ ?>
                                <button type="submit" class="btn btn-danger">ELIMINAR</button>
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
                <!-- / .box -->            
            </section>            
        </div>
        <!-- / ROW -->                
        <!-- / Main content -->
    </body>
</html>
