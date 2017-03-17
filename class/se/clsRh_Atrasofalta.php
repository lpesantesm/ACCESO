<?php

/**
 * Description of clsRh_Atrasofalta
 *
 * @author cristian.guerrero
 */
require_once strtolower($_SERVER["DOCUMENT_ROOT"]) . '/class/classQuery.php';

class Rh_Atrasofalta extends Query{

    //A T R I B U T O S
    private $idempleado = NULL;
    private $fecha = NULL;
    private $idttipo = NULL;
    private $iditipo = NULL;
    private $fechavigencia = NULL;
    private $idtipodocumento = NULL;
    private $aniodocumento = NULL;
    private $numerodocumento = NULL;
    private $hora = NULL;
    private $minutosatraso = NULL;
    private $fecharegistro = NULL;
    private $idusuariolog = NULL;
    private $ip = NULL;
    private $aAtraso = NULL;

    public function __construct() {  parent::__construct();}
    
    public function getIdempleado(){ return $this->idempleado;} public function setIdempleado($idempleado){ $this->idempleado = $idempleado;}
    public function getFecha(){ return $this->fecha;} public function setFecha($fecha){ $this->fecha = $fecha;}
    public function getIdttipo(){ return $this->idttipo;} public function setIdttipo($tipo){ $this->idttipo = $tipo;}
    public function getIditipo(){ return $this->iditipo;} public function setIditipo($tipo){ $this->iditipo = $tipo;}
    public function getFechavigencia(){ return $this->fechavigencia;} public function setFechavigencia($fechavigencia){ $this->fechavigencia = $fechavigencia;}
    public function getIdtipodocumento(){ return $this->idtipodocumento;} public function setIdtipodocumento($idtipodocumento){ $this->idtipodocumento = $idtipodocumento;}
    public function getAniodocumento(){ return $this->aniodocumento;} public function setAniodocumento($aniodocumento){ $this->aniodocumento = $aniodocumento;}
    public function getNumerodocumento(){ return $this->numerodocumento;} public function setNumerodocumento($numerodocumento){ $this->numerodocumento = $numerodocumento;}
    public function getHora(){ return $this->hora;} public function setHora($hora){ $this->hora = $hora;}
    public function getMinutosatraso(){ return $this->minutosatraso;} public function setMinutosatraso($minutosatraso){ $this->minutosatraso = $minutosatraso;}
    public function getFecharegistro(){ return $this->fecharegistro;} public function setFecharegistro($fecharegistro){ $this->fecharegistro = $fecharegistro;}
    public function getIdusuariolog(){ return $this->idusuariolog;} public function setIdusuariolog($idusuariolog){ $this->idusuariolog = $idusuariolog;}
    public function getIp(){ return $this->ip;} public function setIp($ip){ $this->ip = $ip;}
    
    public function setAtrasos($valor){
      $valor = str_replace("'", "", $valor);
      $this->aAtraso = trim($valor);
    }
    public function getAtrasos(){ return $this->aAtraso;}
    
    private function _getList($iidempleado, $iiditipo, $iidestructura, $ifecha, $iopcion) {
      $par  = (is_null($iidempleado) ? "null" : sprintf("%s",$iidempleado));
      $par .= (is_null($iiditipo) ? ",null" : sprintf(",'%s'",$iiditipo));
      $par .= (is_null($iidestructura) ? ",null" : sprintf(",%s",$iidestructura));
      $par .= (is_null($ifecha) ? ",null" : sprintf(",'%s'",$ifecha));
      $par .= sprintf(", %d", $iopcion); 
      $sql = "select RH_PQ_ATRASOFALTA.f_getList( ".$par." ) AS MFRC from dual";
      $this->setSql($sql);
//    $this->showsql(NULL);
      $reg = $this->selectAll();
      return $reg;
    } // end getList()

    public function getListArray($iidempleado, $iiditipo, $iidestructura, $ifecha, $iopcion) {
      $listaItems = $this->_getList($iidempleado, $iiditipo, $iidestructura, $ifecha,$iopcion);
      return $this->matriz2lista($listaItems);
    } // end getListArray()

    public function getAllPagineo($iidempleado, $inombre, $ifecha, $iiditipo, $iidtipodocumento, $ianiodocumento, $inumerodocumento, $iidestructura, $iestado, $iopcion, $pageNum, $pageSize, &$regTotal){
        $par  = (is_null($iidempleado) || $iidempleado == ''? 'null':sprintf(' %d', $iidempleado));
        $par .= (is_null($inombre) || $inombre == ''? ', null':sprintf(", '%s'", $inombre));
        $par .= (is_null($ifecha) || $ifecha == ''? ', null':sprintf(", '%s'", $ifecha));
        $par .= (is_null($iiditipo) || $iiditipo == ''? ', null':sprintf(', \'%s\'', $iiditipo));
        $par .= (is_null($iidtipodocumento) || $iidtipodocumento == ''? ', null':sprintf(', %d', $iidtipodocumento));
        $par .= (is_null($ianiodocumento) || $ianiodocumento == ''? ', null':sprintf(', %d', $ianiodocumento));
        $par .= (is_null($inumerodocumento) || $inumerodocumento == ''? ', null':sprintf(', %d', $inumerodocumento));
        $par .= (is_null($iidestructura) || $iidestructura == ''? ', null':sprintf(', %d', $iidestructura));
        $par .= (is_null($iestado) || $iestado == ''? ', null':sprintf(", '%s'", $iestado));
        $par .= (is_null($iopcion) || $iopcion == ''? ', null':sprintf(', %d', $iopcion));
        $sql = sprintf("select RH_PQ_ATRASOFALTA.f_getBrowse_pag(%s,  %d, %d) AS MFRC from dual ", $par, $pageNum, $pageSize);
        $this->setSql($sql);
//$this->showsql(NULL);
        $reg = $this->selectAll();
        $regTotal = $reg[0]['ROWTOTAL'];
        return $reg;
    } // end getAllPagineo()
    
  public function updateEstadoAtrasos() {
    $par = "";
    $parn = "";
    $par .= (is_null($this->idempleado) ? "null" : sprintf("%d",$this->idempleado));
    $par .= ($this->aAtraso == "" ? ', null':sprintf(", '%s'", $this->aAtraso));
    $par .= (is_null($this->idusuariolog) ? ", null" : sprintf(",'%s'",$this->idusuariolog));
    $par .= (is_null($this->ip) ? ", null" : sprintf(",'%s'",$this->ip));
    //if (substr($par,0,1) == ',') { $par = substr($par,1); } 
    $sql = sprintf("begin RH_PQ_ATRASOFALTA.p_updateAtrasos(%s,  true, :errcode, :errdesc); end;",$par);
    //echo htmlentities($sql);
    $this->setSql($sql);
    $reg = $this->mantenimiento();
    return $reg;
  } // end updateEstadoAtrasos()
}
