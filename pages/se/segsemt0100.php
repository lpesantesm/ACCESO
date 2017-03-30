 <!-- DataTables -->
 <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css"><!-- ../../plugins/datatables/dataTables.bootstrap.css-->        
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1> Modulos <small>Aqu&iacute; puede consultar todos los Modulos, filtrandolos por: C&oacute;digo</small> </h1>
    <!--              <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Tables</a></li>
                <li class="active">Data tables</li>
              </ol>-->
  </section>
  <!-- Main content -->
  <section class="content">
    <!-- Horizontal Form -->
    <div class="box box-info">
      <!--                  <div class="box-header with-border">
                    <h3 class="box-title">Horizontal Form</h3>
                  </div>-->
      <br/>
      <!-- /.box-header -->
      <!-- form start -->
      <form id="frmC" name="frmC" method="post" action="" class="form-horizontal">
        <input type="hidden" name="hid_frmEstado" id="hid_frmEstado" value="" />
        <div class="box-body">
          <div class="form-group">
            <label for="inputEmail3" class="col-sm-2 control-label">C&oacute;digo</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="txt_idmodulo" name="txt_idmodulo" placeholder="C&oacute;digo">
            </div>
          </div>
          <div class="form-group">
            <label for="inputPassword3" class="col-sm-2 control-label">Descripci&oacute;n</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="txt_descripcion" name="txt_descripcion" placeholder="Descripci&oacute;n">
            </div>
          </div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer" align="center">
          <button type="button" id="btn_search" name="btn_search" class="btn btn-info" onclick="btn_EnviarOnClick();">Consultar</button>
          <button type="button" id="btn_new" name="btn_new" class="btn btn-success">Agregar</button>
        </div>
        <!-- /.box-footer -->
      </form>
    </div>
    <!-- /.box -->
    <div class="row">
      <div class="col-xs-12">
        <div class="box">
          <!--                    <div class="box-header">
                      <h3 class="box-title">Hover Data Table</h3>
                    </div>-->
          <!-- /.box-header -->
          <div id="div_resultado" class="box-body">
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
//          $(function () {
//            $('#tbl_data').DataTable({
//              "paging": true,
//              "lengthChange": false,
//              "searching": false,
//              "ordering": true,
//              "info": true,
//              "autoWidth": false,
//              "language": {
//                            "decimal":        "",
//                            "emptyTable":     "No data available in table",
//                            "info":           "Mostrando _START_ a _END_ de _TOTAL_ registros",
//                            "infoEmpty":      "Mostrando 0 a 0 de 0 registros",
//                            "infoFiltered":   "(filtrando de _MAX_ total registros)",
//                            "infoPostFix":    "",
//                            "thousands":      ",",
//                            "lengthMenu":     "Mostrando _MENU_ registros",
//                            "loadingRecords": "Cargando...",
//                            "processing":     "Procesando...",
//                            "search":         "Buscando:",
//                            "zeroRecords":    "No existen registro que coincida con la busqueda",
//                            "paginate": {
//                                "first":      "Primero",
//                                "last":       "Ultimo",
//                                "next":       "Siguiente",
//                                "previous":   "Anterior"
//                            },
//                            "aria": {
//                                "sortAscending":  ": activate to sort column ascending",
//                                "sortDescending": ": activate to sort column descending"
//                            }
//                        },
//              // Disable sorting on the no-sort class
//              "aoColumnDefs" : [ {
//                "bSortable" : false,
//                "aTargets" : [ "no-sort" ]
//              } ]                        
//            });
//          });
          
        function btn_EnviarOnClick(){
            var f = document.frmC;
            if (f.btn_search.disabled == true) { return false;}
            f.hid_frmEstado.value = '1';
            eval(formToCallPost(f,'./se/segsemt0100-p.php','div_resultado',''));        
        } //--          
        </script> 