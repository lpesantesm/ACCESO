	  <?php 
	  @session_start();
          print_r($_SESSION["menuusuario"]);
	  print('<!-- sidebar menu: : style can be found in sidebar.less -->
	      <ul class="sidebar-menu">
		<li class="header">MENU PRINCIPAL</li>');  
	  foreach($_SESSION["menuusuario"] as $key => $regdetalle) {
			 $nombre = $regdetalle["ov_nombre"] ;


			 if ($regdetalle["ov_tipo"]=='M') { //TIPO MENU
		   print('<li class="treeview">
	  <a href="#"><i class="fa fa-dot-circle-o text-aqua"></i> 
		      <span title="'.$regdetalle["ov_descripcion"].'">'.$regdetalle["ov_nombre"].'</span>
				  <span class="pull-right-container">
								<i class="fa fa-angle-left pull-right"></i>
				  </span>
	  </a><ul class="treeview-menu">');
			 }else{
				if ($regdetalle["ov_tipo"]=='S') { //TIPO SUBMENU
			$linksubmenu = !empty($regdetalle["ov_pagina"]) ? './principal.php?pg='.$regdetalle["ov_pagina"] : '';
					print('<li>
							  <a href="'.$linksubmenu.'" ><i class="fa fa-dot-circle-o text-red"></i> 
							  <span title="'.$regdetalle["ov_descripcion"].'">'.$regdetalle["ov_nombre"].'</span>
								<span class="pull-right-container">
								  <i class="fa fa-angle-left pull-right"></i>
								</span>
							  </a>

							  ');		//<ul class="treeview-menu">
				}else{

					 if ($regdetalle["ov_tipo"]=='O') { //TIPO OPCION
					     $linkopcion = 'principal.php?pg='.strtolower($regdetalle["ov_pagina"]);
						 print('
								<li>
								  <a href="'.$linkopcion.'"><i class="fa fa-dot-circle-o text-yellow"></i> 
								  <span title="'.$regdetalle["ov_descripcion"].'">'.$regdetalle["ov_nombre"].'</span>
									<span class="pull-right-container">
									  <i class="fa fa-angle-left pull-right"></i>
									</span>
								  </a>
								</li>'); 		 
				}

				}// FIN DE if ($regdetalle["ov_tipo"]=='M') { //TIPO MENU


								//*******************************************
						//PREGUNTA SI ES LA ULTIMA OPCION DEL SUBMENU 
						/* if(isset($_SESSION["menuusuario"][$key+1]["ov_tipo"]) && 
							($_SESSION["menuusuario"][$key+1]["ov_tipo"] != 'O') ) {
								print('</ul>');
								} */
						//*******************************************

						 }

								//*******************************************
						//PREGUNTA SI ES EL ULTIMO SUBMENU
						if(isset($_SESSION["menuusuario"][$key+1]["ov_tipo"]) && 
							($_SESSION["menuusuario"][$key+1]["ov_tipo"] == 'S') ) {
								print('</li>');
								}
						//*******************************************

			//*******************************************
			//PREGUNTA SI EL SIGUIENTE REGISTRO ES MENU O ES EL ULTIMO
			if (isset($_SESSION["menuusuario"][$key+1]["ov_tipo"])) {
				    if(($_SESSION["menuusuario"][$key+1]["ov_tipo"] == 'M')) {
						print('</ul></li>');
					}
				}/* else{
					print('</ul></li>');
					} */
			//*******************************************


			  }

	  print('      </ul>
	    </section>
	    <!-- /.sidebar -->');		  
	  ?>
