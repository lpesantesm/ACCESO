<?php

// <editor-fold defaultstate="collapsed" desc="V A R I A B L E S">
 $pagsize = 10;
 $msgError = '';
 $subtitulo = '';
 $frmProceso = null;
 $idmodulo = null;
 $nombre = null;
 $descripcion = null;
 $directorio = null;
 $siglas = null;
 $orden = null;
 $idmodulopadre = null;
 $icono = null;
// </editor-fold>

// <editor-fold defaultstate="collapsed" desc="RECIBE PARAMETROS DESDE EL RESUMEN">
 //NEW NUEVO
 //UPD MODIFICAR
 //CON CONSULTAR
 //DEL ELMINAR
if (isset($_GET['id'])) {
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
                              <input type="text" class="form-control" id="txt_nombre" name="txt_nombre" placeholder="NOMBRE DEL MODULO" required="true" maxlength="100" pattern="[A-Z]{4,100}" title="SOLO DEBE CONTENER LETRAS, DEBE TENER COMO M&Iacute;NIMO 4 CARACTERES." value="<?php echo $nombre; ?>">
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
                              <input type="text" class="form-control" id="txt_directorio" name="txt_directorio" placeholder="DIRECTORIO DONDE SE ENCUENTRAN LAS PAGINAS DEL MODULO" required="true" maxlength="4" pattern="[A-Z]" title="SOLO DEBE CONTENER LETRAS" value="<?php echo $directorio; ?>">
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
                            <label for="txt_idmodulopadre" class="col-sm-2 control-label">MODULO PADRE: </label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="txt_idmodulopadre" name="txt_idmodulopadre" placeholder="ORDEN EN QUE DEBERA APARECE EL MODULO EN LA PANTALLA DE SELECCION DE MODULO" required="true" maxlength="2" pattern="[0-9]" title="SOLO DEBE CONTENER N&Uacute;MEROS" value="<?php echo $idmodulopadre; ?>">
                          </div>
                        </div>                               
                          

                        <div class="form-group">
                            <label for="txt_icono" class="col-sm-2 control-label">ICONO: </label>
                          <div class="col-sm-10">
                              <input type="text" class="form-control" id="txt_icono" name="txt_icono" placeholder="ORDEN EN QUE DEBERA APARECE EL MODULO EN LA PANTALLA DE SELECCION DE MODULO" required="true" maxlength="2" pattern="[0-9]" title="SOLO DEBE CONTENER N&Uacute;MEROS" value="<?php echo $idmodulopadre; ?>">
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
                                <button type="submit" class="btn btn-success">MODIFICAR</button>
                              <?php } elseif ($frmProceso == 'DEL'){ ?>
                                <button type="submit" class="btn btn-danger">ELIMINAR</button>
                              <?php } else {
                                    //$msgError = 'OPCI&Oacute;N DEL FORMULARIO NO V&Aacute;LIDA.';
                                }    
                            ?>                              
                                <button type="submit" class="btn btn-default">VOLVER</button>
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
