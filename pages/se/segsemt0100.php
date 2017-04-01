 <?php 
 $pagsize = 10;
 ?>
 <!-- DataTables -->
 <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css"><!-- ../../plugins/datatables/dataTables.bootstrap.css-->        
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

        <div class="col-xs-12">
        <div class="box box-warning">
          <!--                    <div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
          <!-- /.box-header -->
          <div class="box-body table-responsive">
            <table id="tbl_data" class="table table-bordered table-striped table-hover">
                <thead>
                    <tr>
                        <th class="no-sort">CODIGO</th>
                        <th class="no-sort">NOMBRE</th>
                        <th class="no-sort">MODULO PADRE</th>
                        <th class="no-sort">ACCION</th>
                    </tr>
                </thead>

                <tfoot>
                    <tr>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <th>MODULO PADRE</th>
                        <th></th>
                    </tr>
                </tfoot>
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
        <!-- /.box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
        <!-- DataTables -->
        <script src="../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
        <script type="text/javascript" src="../js/formToCallPost.js"></script>
        <!-- page script -->
        <script>
		
          $(function () {
            $('#tbl_data').DataTable({
                "lengthChange": false,
                "processing": true,
                "serverSide": true,
		"searching": true,
		"pageLength": <?php echo $pagsize; ?>,
                "ajax": {
                            "url": "se/segsemt0100-p.php",
                            "data": {
                                    "pagsize": <?php echo $pagsize; ?>
                            }
			},
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
                          },
                // Disable sorting on the no-sort class
                "aoColumnDefs" : [ {
                    "bSortable" : false,
                    "aTargets" : [ "no-sort" ]
                } ]                        
            });
          });         
        </script> 