<?php
session_start();

$msgError = '';

$pagnum = 1;
$pagsize = 10;//$_SESSION['pageSize'];
$pageTotal = 0;
$primeraVez = true;

//// primera vez
//if ($primeraVez){
//    // inicializo campos
//    $frmEstado = 1;
//    $postAnterior['hid_frmEstado'] = $frmEstado;
//    $postAnterior['txt_codigo'] = $codigo;
//    $postAnterior['txt_descripcion'] = $descripcion;
//    //unset($_SESSION['pag']);
//} else {
    // obtiene todos los campos del request POST
    //print_r($_POST);
    foreach (/*$postAnterior*/$_POST as $nombre_campo => $valor) {
        $asignacion = "\$" . substr($nombre_campo, 4) . "='" . $valor . "';";
		//echo "$asignacion";        
        eval($asignacion);
    } // for
//} //($primeraVez)

//consulta de registro
if ($frmEstado == 1 || $frmEstado == 2){
    require_once($_SERVER['DOCUMENT_ROOT'].'/class/se/clsSe_Modulo.php');
    $ose_modulo = new Se_Modulo();
    $reg = $ose_modulo->getAllPagineo($idmodulo, $pagnum, $pagsize); 
    if (is_array($reg) && isset($reg[0])){
        if($frmEstado == 1){ ?>
            <table id="tbl_data" class="table table-bordered table-hover">
              <thead>
              <tr>
                <th>CODIGO</th>
                <th>NOMBRE</th>
                <th>MODULO PADRE</th>
                <th class="no-sort">ACCION</th>
              </tr>
              </thead>
              <tbody>
        <?php } 
        if($frmEstado == 1 || $frmEstado == 2){
            foreach($reg as $key => $regdetalle){ ?>
            <tr>
              <td><?php echo $regdetalle["idmodulo"]; ?></td>
              <td><?php echo $regdetalle["nombre"]; ?>
              <td><?php echo $regdetalle["nombrepadre"]; ?>
              </td>
              <td>Ver</td>
            </tr>                  
       <?php } }
       if($frmEstado == 1){ ?>
        </tbody>
        <tfoot>
        <tr>
          <th>C&oacute;digo</th>
          <th>Descripci&oacute;n</th>
          <th></th>
        </tr>
        </tfoot>
      </table>     
        <script>
          $(function () {
            $('#tbl_data').DataTable({
              "paging": true,
              "lengthChange": false,
              "searching": false,
              "ordering": true,
              "info": true,
              "autoWidth": false,
              "language": {
                            "decimal":        "",
                            "emptyTable":     "No data available in table",
                            "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
                            "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
                            "infoFiltered":   "(filtrando de _MAX_ total registros)",
                            "infoPostFix":    "",
                            "thousands":      ",",
                            "lengthMenu":     "Mostrando _MENU_ registros",
                            "loadingRecords": "Cargando...",
                            "processing":     "Procesando...",
                            "search":         "Buscando:",
                            "zeroRecords":    "No existen registro que coincida con la busqueda",
                            "paginate": {
                                "first":      "Primero",
                                "last":       "Ultimo",
                                "next":       "Siguiente",
                                "previous":   "Anterior"
                            },
                            "aria": {
                                "sortAscending":  ": activate to sort column ascending",
                                "sortDescending": ": activate to sort column descending"
                            }
                        },
              // Disable sorting on the no-sort class
              "aoColumnDefs" : [ {
                "bSortable" : false,
                "aTargets" : [ "no-sort" ]
              } ]                        
            });
          });            
        </script>
       <?php }
    }else{ echo 'No hay datos.'; } 
}
?>






