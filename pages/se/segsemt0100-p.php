<?php
session_start();
$pagnum = 1;
$pagsize = 20;
//CONVIERTE LOS DATOS ENVIADOS POR POST A VARIABLES
foreach ($_POST as $fn => $fv) {
    if (substr($fn,3,1)== '_') {   //CAMPOS SIMPLES
                   $asignacion = "\$" . substr($fn, 4) . "='" . $fv . "';";
       eval($asignacion);
                }
}

require_once($_SERVER['DOCUMENT_ROOT'].'/class/se/clsSe_Modulo.php');
$ose_modulo = new Se_Modulo();
$reg = $ose_modulo->getAllPagineo($idmodulo, $pagnum, $pagsize); 


if (is_array($reg)){ ?>
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Modulos</h2>                      
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                    <div class="table-responsive">
                      <table class="table table-striped jambo_table bulk_action">
                        <thead>
                          <tr class="headings">
                            <th class="column-title">C&oacute;digo </th>
                            <th class="column-title">Descripci&oacute;n </th>
                            <th class="column-title no-link last"><span class="nobr">Acci&oacute;n</span>
                            </th>
                            <th class="bulk-actions" colspan="7">
                              <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a>
                            </th>
                          </tr>
                        </thead>
                        <tbody>

                        <?php foreach($reg as $key => $regdetalle) { ?>    
                          <tr class="even pointer">
                            <td class=" "><?php echo $regdetalle["IDMODULO"]; ?></td>
                            <td class=" "><?php echo $regdetalle["NOMBRE"]; ?></td>
                            <td class=" last"><a href="#">Ver</a>
                            </td>
                          </tr>
                        <?php } ?>                              
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
            </div>
    <?php
} else {
    echo 'No hay datos.';
}?>
