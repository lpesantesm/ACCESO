<?php

/**
 * Description of clsRh_AtrasofaltaAll
 *
 * @author rolando.flores
 */
require_once strtolower($_SERVER["DOCUMENT_ROOT"]) . '/class/classQuery.php';

class Rh_Atrasofalta extends Query{

    //A T R I B U T O S
    private $idestructura = NULL;
    private $idubicacion = NULL;
    private $idempleado = NULL;
    private $fecha = NULL;
    private $idttipo = NULL;
    private $iditipo = NULL;
    private $motivoestado = NULL;
    private $xmlempleados = NULL;
    private $opcion = NULL;
    private $fecharegistro = NULL;
    private $idusuariolog = NULL;
    private $ip = NULL;
    private $aAtraso = NULL;

    public function __construct() {  parent::__construct();}

  // ---- P R O P I E D A D E S ----
  public function __set($var, $valor) {
         // convierte a minúsculas toda una cadena la función strtolower
         $temporal = strtolower($var);
         // Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
         if (property_exists ('Rh_Atrasofalta',$temporal)) {
             $this->$temporal = $valor;
         } else {
                 echo $var . " No existe.";
                }
  } //__set
    
  public function __get($var) {
         $temporal = strtolower($var);
         // Verifica que exista
         if (property_exists('Rh_Atrasofalta', $temporal)) {
             return $this->$temporal;
          }
         // Retorna nulo si no existe
         return NULL;
  }
    /*
    private function _getList($iidempleado, $iiditipo,$iopcion) {
      $par  = (is_null($iidempleado) ? "null" : sprintf("%s",$iidempleado));
      $par .= (is_null($iiditipo) ? ",null" : sprintf(",'%s'",$iiditipo));
      $par .= sprintf(", %d", $iopcion); 
      $sql = "select RH_PQ_ATRASOFALTA.f_getList( ".$par." ) AS MFRC from dual";
      $this->setSql($sql);
//    $this->showsql(NULL);
      $reg = $this->selectAll();
      return $reg;
    } // end getList()

    public function getListArray($iidempleado, $iiditipo, $iopcion) {
      $listaItems = $this->_getList($iidempleado, $iiditipo,$iopcion);
      return $this->matriz2lista($listaItems);
    } // end getListArray()

    public function getAllPagineo($iidempleado, $ifecha, $iiditipo, $iidtipodocumento, $ianiodocumento, $inumerodocumento,$iopcion, $pageNum, $pageSize, &$regTotal){
        $par  = (is_null($iidempleado) || $iidempleado == ''? 'null':sprintf(' %d', $iidempleado));
        $par .= (is_null($ifecha) || $ifecha == ''? ', null':sprintf(", '%s'", $ifecha));
        $par .= (is_null($iiditipo) || $iiditipo == ''? ', null':sprintf(', %d', $iiditipo));
        $par .= (is_null($iidtipodocumento) || $iidtipodocumento == ''? ', null':sprintf(', %d', $iidtipodocumento));
        $par .= (is_null($ianiodocumento) || $ianiodocumento == ''? ', null':sprintf(', %d', $ianiodocumento));
        $par .= (is_null($inumerodocumento) || $inumerodocumento == ''? ', null':sprintf(', %d', $inumerodocumento));
        $par .= (is_null($iopcion) || $iopcion == ''? ', null':sprintf(', %d', $iopcion));
        $sql = sprintf("select RH_PQ_ATRASOFALTA.f_getBrowse_pag(%s,  %d, %d) AS MFRC from dual ", $par, $pageNum, $pageSize);
        $this->setSql($sql);
//$this->showsql(NULL);
        $reg = $this->selectAll();
        $regTotal = $reg[0]['ROWTOTAL'];
        return $reg;
    } // end getAllPagineo()*/
    
    
  public function getFull($opcion) {
    $par = (is_null($this->idestructura) || empty($this->idestructura) ? "null" : sprintf("%d",$this->idestructura));
    $par .= (is_null($this->idubicacion) || empty($this->idubicacion) ? ", null" : sprintf(", %d",$this->idubicacion));
    $par .= (is_null($this->idempleado) || empty($this->idempleado) ? ", null" : sprintf(", %d",$this->idempleado));
    $par .= (is_null($this->fecha) ? ", null" : sprintf(", '%s'", $this->fecha));
    $par .= (is_null($opcion) ? ", null" : sprintf(", %d", $opcion));
    $sql = sprintf("select RH_PF_ATRASOFALTA.f_getFull(%s) AS MFRC from dual ",$par);
    $this->setSql($sql);
    $reg = $this->selectOne();
    return $reg;
  } // end GetFull()
  
  public function updateEstadoAtraso() {
    $par = (is_null($this->idempleado) ? "null" : sprintf("%d",$this->idempleado));
    $par .= (is_null($this->fecha) ? ", null" : sprintf(", '%s'", $this->fecha));
    $par .= (is_null($this->idttipo) ? ", null" : sprintf(", '%s'", $this->idttipo));
    $par .= (is_null($this->iditipo) ? ", null" : sprintf(", '%s'", $this->iditipo));
    $par .= (is_null($this->motivoestado) ? ", null" : sprintf(", '%s'", $this->motivoestado));
    $par .= (is_null($this->idusuariolog) ? ", null" : sprintf(", '%s'",$this->idusuariolog));
    $par .= (is_null($this->ip) ? ", null" : sprintf(", '%s'",$this->ip));   
    $sql = sprintf("begin RH_PF_ATRASOFALTA.p_updateEstadoAtraso(%s, true, :errcode, :errdesc); end;",$par);
    $this->setSql($sql);
    $reg = $this->mantenimiento();
    return $reg;
  } // end updateEstadoAtraso()
  
  public function updateEstadoDireccionAtraso() {
    $par = (is_null($this->idestructura) || empty($this->idestructura) ? "null" : sprintf("%d",$this->idestructura));
    $par .= (is_null($this->idubicacion) || empty($this->idubicacion) ? ", null" : sprintf(", %d",$this->idubicacion));
    $par .= (is_null($this->fecha) || empty($this->fecha) ? ", null" : sprintf(", '%s'", $this->fecha));
    $par .= (is_null($this->motivoestado) ? ", null" : sprintf(", '%s'", $this->motivoestado));
    $par .= (is_null($this->idusuariolog) ? ", null" : sprintf(", '%s'",$this->idusuariolog));
    $par .= (is_null($this->ip) ? ", null" : sprintf(", '%s'",$this->ip));   
    $sql = sprintf("begin RH_PF_ATRASOFALTA.p_updateEstadoDireccionAtraso(%s, true, :errcode, :errdesc); end;",$par);
    $this->setSql($sql);
    $reg = $this->mantenimiento();
    return $reg;
  } // end updateEstadoDireccionAtraso()
  
  public function updateEstadoGrupoAtraso() {
    $par = (is_null($this->xmlempleados) || empty($this->xmlempleados) ? "null" : sprintf("'%s'",$this->xmlempleados));
    $par .= (is_null($this->fecha) || empty($this->fecha) ? ", null" : sprintf(", '%s'", $this->fecha));
    $par .= (is_null($this->motivoestado) ? ", null" : sprintf(", '%s'", $this->motivoestado));
    $par .= (is_null($this->idusuariolog) ? ", null" : sprintf(", '%s'",$this->idusuariolog));
    $par .= (is_null($this->ip) ? ", null" : sprintf(", '%s'",$this->ip));   
    $sql = sprintf("begin RH_PF_ATRASOFALTA.p_updateEstadoGrupoAtraso(%s, true, :errcode, :errdesc); end;",$par);
    $this->setSql($sql);
    $reg = $this->mantenimiento();
    return $reg;
  } // end updateEstadoGrupoAtraso()
  
}
