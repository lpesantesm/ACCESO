<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">        
        <title>GRUPO VITESEG S.A. | Resumen de Modulos</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">   
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../../css/bootstrap.min.css">     <!-- ../../bootstrap/css/bootstrap.min.css-->        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">        
        <!-- DataTables -->
        <link rel="stylesheet" href="../../plugins/datatables/dataTables.bootstrap.css"><!-- ../../plugins/datatables/dataTables.bootstrap.css-->        
        <!-- Theme style -->
        <link rel="stylesheet" href="../../css/AdminLTE.min.css"><!--../../dist/css/AdminLTE.min.css-->        
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../../css/skins/_all-skins.min.css"><!-- ../../dist/css/skins/_all-skins.min.css-->        
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->        
    </head>
    <!-- ADD THE CLASS sidedar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->    
    <body class="hold-transition skin-blue sidebar-collapse sidebar-mini">
        <!-- Site wrapper -->
        <div class="wrapper">
            
          <!-- Content Wrapper. Contains page content -->
          <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <section class="content-header">
              <h1>
                Modulos
                <small>Aqu&iacute; puede consultar todos los Modulos, filtrandolos por: C&oacute;digo</small>
              </h1>
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
          </div>
          <!-- /.content-wrapper -->            
            <footer class="main-footer">
              <div class="pull-right hidden-xs">
                <b>Version</b> 2.3.8
              </div>
              <strong>Copyright &copy; 2017 <a href="http://almsaeedstudio.com">GRUPO VITESEG S.A.</a>.</strong> All rights
              reserved.
            </footer>            
        </div>
        <!-- ./wrapper -->   

        <!-- jQuery 2.2.3 -->
        <script src="../../plugins/jQuery/jquery-2.2.3.min.js"></script><!--../../plugins/jQuery/jquery-2.2.3.min.js-->
        <!-- Bootstrap 3.3.6 -->
        <script src="../../js/bootstrap.min.js"></script><!--../../plugins/jQuery/jquery-2.2.3.min.js-->
        <!-- DataTables -->
        <script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="../../plugins/datatables/dataTables.bootstrap.min.js"></script>
        <!-- SlimScroll -->
        <script src="../../plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- FastClick -->
        <script src="../../plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../../js/app.min.js"></script><!--../../dist/js/app.min.js-->
        <!-- AdminLTE for demo purposes -->
        <script src="../../js/demo.js"></script><!--../../dist/js/demo.js-->
        <!-- formToCallPost -->
        <script type="text/javascript" src="../../js/formToCallPost.js"></script>           
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
            eval(formToCallPost(f,'segsemt0100-p.php','div_resultado',''));        
        } //--          
        </script>        
    </body>
</html>
