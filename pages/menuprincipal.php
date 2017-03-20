<?php 
@session_start();
?>
<li>
<?php
foreach($_SESSION["menuusuario"] as $key => $regdetalle) {
       $nombre = $regdetalle["NOMBRE"] ;
	   if ($regdetalle["TIPO"]=='M') {
?>
<a><i class="fa fa-home"></i> <?php echo $regdetalle["NOMBRE"]; ?> <span class="fa fa-chevron-down"></span></a><ul class="nav child_menu"><?php 
	   }else{
?>
                      <li><a href="principal.php?pg=<?php echo strtolower($_SESSION["directoriomodulo"]."/".$regdetalle["PAGINA"]); ?>"><?php echo $regdetalle["NOMBRE"]; ?></a></li>
                      <?php 
	   }
	   if(isset($_SESSION["menuusuario"][$key+1]["TIPO"])) {
		  if ($_SESSION["menuusuario"][$key+1]["TIPO"] == 'M') {
					  ?>
     </ul>
                  
<?php         }
	        }
		}
?>
</li>