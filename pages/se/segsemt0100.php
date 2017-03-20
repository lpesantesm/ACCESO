<div class="right_col" role="main">
  <div class="">
    <div class="page-title">
      <div class="title_left">
        <h3>Modulo</h3>
      </div>
      <!--              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>-->
    </div>
    <div class="clearfix"></div>
    <div class="row">
      <div class="col-md-12 col-sm-12 col-xs-12">
        <div class="x_panel">
          <div class="x_title">
            <!--                    <h2>Modulos <small>Aqu&iacute; puede consultar todos los Modulos, filtrandolos por: C&oacute;digo o Descripci&oacute;n</small></h2>-->
            <h2><small>Aqu&iacute; puede consultar todos los Modulos, filtrandolos por: C&oacute;digo o Descripci&oacute;n</small></h2>
            <!--                    <ul class="nav navbar-right panel_toolbox">
                      <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                      </li>
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="#">Settings 1</a>
                          </li>
                          <li><a href="#">Settings 2</a>
                          </li>
                        </ul>
                      </li>
                      <li><a class="close-link"><i class="fa fa-close"></i></a>
                      </li>
                    </ul>-->
            <div class="clearfix"></div>
          </div>
          <div class="x_content"> <br />
            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left">
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">C&oacute;digo </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="first-name" required class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="form-group">
                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Descripci&oacute;n </label>
                <div class="col-md-6 col-sm-6 col-xs-12">
                  <input type="text" id="last-name" name="last-name" required class="form-control col-md-7 col-xs-12">
                </div>
              </div>
              <div class="ln_solid"></div>
              <div class="form-group">
                <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                  <button class="btn btn-primary" type="button">Consultar</button>
                  <!--						  <button class="btn btn-primary" type="reset">Reset</button>-->
                  <button type="submit" class="btn btn-success">Agregar</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="clearfix"></div>
    <div class="col-md-12 col-sm-12 col-xs-12">
      <div class="x_panel">
        <div class="x_title">
          <h2>Table design <small>Custom design</small></h2>
          <div class="clearfix"></div>
        </div>
        <div class="x_content">
          <p>Add class <code>bulk_action</code> to table for bulk actions options on row select</p>
          <div class="table-responsive">
            <table class="table table-striped jambo_table bulk_action">
              <thead>
                <tr class="headings">
                  <!--                            <th>
                              <input type="checkbox" id="check-all" class="flat">
                            </th>-->
                  <th class="column-title">C&oacute; </th>
                  <th class="column-title">Descripci&oacute;n </th>
                  <!--                            <th class="column-title">Order </th>
                            <th class="column-title">Bill to Name </th>
                            <th class="column-title">Status </th>
                            <th class="column-title">Amount </th>-->
                  <th class="column-title no-link last"><span class="nobr">Action</span> </th>
                  <th class="bulk-actions" colspan="7"> <a class="antoo" style="color:#fff; font-weight:500;">Bulk Actions ( <span class="action-cnt"> </span> ) <i class="fa fa-chevron-down"></i></a> </th>
                </tr>
              </thead>
              <tbody>
                <tr class="even pointer">
                  <!--                            <td class="a-center ">
                              <input type="checkbox" class="flat" name="table_records">
                            </td>-->
                  <td class=" ">1</td>
                  <td class=" ">Seguridad</td>
                  <!--                            <td class=" ">121000210 <i class="success fa fa-long-arrow-up"></i></td>
                            <td class=" ">John Blank L</td>
                            <td class=" ">Paid</td>
                            <td class="a-right a-right ">$7.45</td>-->
                  <td class=" last"><a href="#">View</a></td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
