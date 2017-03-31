<?php 
//***************************************************************************
//      FECHA: 30/03/2017
//      AUTOR: ROLANDO FLORES DE VALGAS
//  PROPOSITO: PAGINA DE CONSULTA DE REGISTROS A DE LA TABLA DE RESUMEN DE
//             MODULO
//    ARCHIVO: .php
//***************************************************************************

//DECLARACION DE VARIABLES
$object = NULL;
$resultado = '';
$totalregistros = 0;
$registrosfiltrados = 0;

//CONSULTA PARAMETROS ENVIADOS PARA BUSQUEDA DE REGISTROS
$draw = isset($_GET["draw"]) ? $_GET["draw"] : 1; //NUMERO DE CONSULTA
$start = isset($_GET["start"]) ? $_GET["start"] : 0; //INDICE DESDE DONDE SE INICIA A CONSULTAR LOS REGISTROS
$pagsize = isset($_GET["pagsize"]) ? $_GET["pagsize"] : 10; //NUMERO DE REGISTROS MAXIMOS POR CONSULTA
$pagnum = ($start + $pagsize) / $pagsize; //CALCULA EL NUMERO DE LA PAGINA QUE DEBO ENVIAR A CONSULTAR
$busqueda = isset($_GET["search"]["value"]) ? $_GET["search"]["value"] : NULL;

//PARAMETROS ADICIONALES
$idmodulo = isset($_GET["idmodulo"]) ? $_GET["idmodulo"] : NULL;

//MODIFICA HEADER PARA QUE SEA EL ARCHIVO DE SALIDA TIPO JSON
header('Content-Type: application/json');
//INVOCACION EN INSTANCIACION DE LA CLASE DE MODULO
require_once($_SERVER['DOCUMENT_ROOT'].'/class/se/clsSe_Modulo.php');
$ose_modulo = new Se_Modulo();
$ose_modulo -> __set("idmodulo", $busqueda);
$ose_modulo -> __set("nombre", $busqueda);
$reg = $ose_modulo->getAllPagineo($pagnum, $pagsize); 

//VALIDA QUE TRAIGA REGISTROS 
if (is_array($reg) && (count($reg) > 0) ) {
   $totalregistros = $reg[0][13];//ID DE COLUMNA RETORNADA DE LA BASE QUE CONTIENE EL NUMERO TOTAL DE REGISTROS
   $registrosfiltrados = $reg[0][13];
   }

    $object = (object) ['draw' => $draw, 
						'recordsTotal' => $totalregistros,
						'recordsFiltered' => $registrosfiltrados ,
						'data' => $reg 
						];


$resultado = json_encode($object);

echo $resultado;
?>
