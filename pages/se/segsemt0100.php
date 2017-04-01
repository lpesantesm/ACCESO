 <?php 
 $pagsize = 10;
 ?>
 <style type="text/css" class="init">
	
	div.container { max-width: 1200px }
ul,ol,li{margin:0;padding:0}table{border-collapse:collapse;border-spacing:0}ol,ul{list-style:none}
	</style>
 <script>
 <?php /* $(document).ready(function() {
    $('#tbl_data').DataTable( {
        ajax: "se/segsemt0100-p.php",
        columns : [
            { "data": "idmodulo", "name": "idmodulo" },
			{ "data": "nombre", "name": "nombre"},
			{ "data": "nombrepadre", "name": "nombrepadre" },
			{ "data": 0, "name": 0, "title": "accion" },
			{ "data": "directorio", "name": "idmodulo", "title": "idmodulo" },
			{ "data": "siglas", "name": "idmodulo", "title": "idmodulo" },
			{ "data": "rowtotal", "name": "idmodulo", "title": "idmodulo" } 
        ]
    } );
} );*/?>
 </script>
 <!-- DataTables -->
<?php /*  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css"> */?><!-- ../../plugins/datatables/dataTables.bootstrap.css-->        
 <link rel="stylesheet" href="../plugins/datatables/jquery.dataTables.min.css">
 <link rel="stylesheet" href="../plugins/datatables/ext/responsive.dataTables.min.css">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> MODULOS DEL SISTEMA <small>AQUI PUEDE CONSULTAR TODOS LOS MODULOS, BUSCANDO POR: CODIGO / NOMBRE.</small> </h1>
    <!--              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
              </ol>-->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Horizontal Form -->
    <!-- /.box -->
        <div class="row">
      <div class="col-xs-12">
        <!-- form start -->
        <form role="form" method="post" action="">
            <div class="box box-default">
                <div class="form-group">
                    <center>
                        <label for="btn_new">¿DESEA CREAR UN NUEVO MODULO PARA EL SISTEMA?</label>
  <!--                      <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter email">-->
                        <button id="btn_new" name="btn_new" type="button" class="btn btn-success" onclick="javascript:{window.location='./principal.php?pg=segsemt0101.php';}">CREAR</button>                                                  
                    </center>  
                </div>                    
            </div>                
        </form>
        <!-- / form start -->
      </div> 
      
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-warning">
          <!--                    <div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
          <!-- /.box-header -->
          
          <div class="box-body">
         
          <table id="tbl_data" class="display nowrap" width="100%" >
              <thead>
              <tr>
                <th data-priority="1" class="no-sort">CODIGO</th>
                <th data-priority="2" class="no-sort">NOMBRE</th>
                <th >DESCRIPCION</th>
                <th >MODULO PADRE</th>
                
              </tr>
              </thead>
      </table> 
            <!--                      <table id="tbl_data" class="table table-bordered table-hover">
                        <thead>
                        <tr>
                          <th>C&oacute;digo</th>
                          <th>Descripci&oacute;n</th>
                          <th class="no-sort">Acci&oacute;n</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                          <td>Trident</td>
                          <td>Internet
                            Explorer 4.0
                          </td>
                          <td>Win 95+</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <tr>
                          <th>C&oacute;digo</th>
                          <th>Descripci&oacute;n</th>
                          <th></th>
                        </tr>
                        </tfoot>
                      </table>-->
                       
          
          </div>
          
          <!-- /.box-body -->
        </div>
        <button id="btn_modificar" onclick="javascript: seleccionOperacion('UPD');" type="button" class="btn btn-block btn-warning btn-sm disabled" style="width:100px;">MODIFICAR</button>
        <button id="btn_consultar" onclick="javascript: seleccionOperacion('CON');" type="button" class="btn btn-block btn-info btn-sm disabled" style="width:100px;">CONSULTAR</button>
        <button id="btn_eliminar" onclick="javascript: seleccionOperacion('DEL');" type="button" class="btn btn-block btn-danger btn-sm disabled" style="width:100px;">ELIMINAR</button>
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
        <!-- DataTables -->
       <?php /*  <script src="../plugins/datatables/ext/jquery-1.12.4.js"></script> */?>
        <script src="../plugins/datatables/ext/jquery.dataTables.min.js"></script>
        <?php /* <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script> */?>
        <script src="../plugins/datatables/ext/dataTables.responsive.min.js"></script>
        <!-- page script -->
        <script>
		
        $(document).ready(function() {
			 
			var table = $('#tbl_data').DataTable({ 
           <?php /*  $('#tbl_data').DataTable({ */?>
              		 "lengthChange": false,
        "processing": true,
        "serverSide": true,
		"searching": true,
		"deferRender": true,
		"responsive": true,
        "pageLength": <?php echo $pagsize; ?>,
		"ajax": {
					"url": "se/segsemt0100-p.php",
					"data": {
						"pagsize": <?php echo $pagsize; ?>
					  }
				},
		 "columns":  [
						{ "data": "idmodulo", "name": "idmodulo" },
						{ "data": "nombre", "name": "nombre"},
						{ "data": "descripcion", "name": "descripcion" },
						{ "data": "nombrepadre", "name": "nombrepadre" }
						],
		 
		
          "language": {
                            "decimal":        "",
                            "emptyTable":     "NO HAY DATOS DISPONIBLES EN LA TABLA",
                            "info":           "MOSTRANDO DEL _START_ AL _END_ DE _TOTAL_ REGISTROS",
                            "infoEmpty":      "MOSTRANDO DEL  0 AL 0 DE 0 REGISTROS",
                            "infoFiltered":   "(FILTRANDO DE _MAX_ TOTAL REGISTROS)",
                            "infoPostFix":    "",
                            "thousands":      ",",
                            "lengthMenu":     "MOSTRANDO _MENU_ REGISTROS",
                            "loadingRecords": "CARGANDO...",
                            "processing":     "PROCESANDO...",
                            "search":         "BUSCAR:",
                            "zeroRecords":    "NO EXISTEN REGISTROS QUE COINCIDAN CON LA BUSQUEDA",
                            "paginate": {
                                "first":      "PRIMERO",
                                "last":       "ULTIMO",
                                "next":       "SIGUIENTE",
                                "previous":   "ANTERIOR"
                            },
                            "aria": {
                                "sortAscending":  ": activate to sort column ascending",
                                "sortDescending": ": activate to sort column descending"
                            }
                        }/* , */
              // Disable sorting on the no-sort class
              /* "aoColumnDefs" : [ {
                "bSortable" : false,
                "aTargets" : [ "no-sort" ]
              } ]  */                       
            });
          
			$('#tbl_data tbody').on( 'click', 'tr', function () {
				
					if ( $(this).hasClass('selected') ) {
						$(this).removeClass('selected');
						$('#btn_modificar').addClass('disabled');
						$('#btn_consultar').addClass('disabled');
						$('#btn_eliminar').addClass('disabled');
					}
					else {
						table.$('tr.selected').removeClass('selected');
						$(this).addClass('selected');
						$('#btn_modificar').removeClass('disabled');
						$('#btn_consultar').removeClass('disabled');
						$('#btn_eliminar').removeClass('disabled');
					}
				} );
			 
				$('#btn_modificar').click( function () {
					var idmodulo = ($("table#tbl_data .selected").closest('tr').find('td').eq(0).html());
					window.location = 'principal.php?pg=segsemt0101.php?id='+idmodulo+'$UPD';
				} );
				
				$('#btn_modificar').click( function () {
					var idmodulo = ($("table#tbl_data .selected").closest('tr').find('td').eq(0).html());
					window.location = 'principal.php?pg=segsemt0101.php?id='+idmodulo+'$UPD';
				} );
				
				$('#btn_modificar').click( function () {
					var idmodulo = ($("table#tbl_data .selected").closest('tr').find('td').eq(0).html());
					window.location = 'principal.php?pg=segsemt0101.php?id='+idmodulo+'$UPD';
				} );
		  });  
		  
		  function seleccionOperacion(tipo){
			  var idmodulo = ($("table#tbl_data .selected").closest('tr').find('td').eq(0).html());
			  window.location = 'principal.php?pg=segsemt0101.php?id='+idmodulo+'$'+tipo;
			  }        
        </script> 