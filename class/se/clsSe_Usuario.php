<?php  
//archivo: clsSe_Usuario.php
// Codigo Autogenerado 16-NOV-10 05.51.04.358301 PM -05:00
require_once strtolower($_SERVER["DOCUMENT_ROOT"]).'/class/classDbmgr.php';

class Se_Usuario extends Dbmgr {

    // ATRIBUTOS
    private $idusuario = '';
    private $idpersona = 0;
    private $descripcion = '';
    private $clave = '';
    private $estado = '';
    private $fecharegistro = '';
    private $idusuario_log = '';
    private $ip = '';
    private $pcimpresora = '';
    private $nombreimpresora = '';
    private $servidor = '';
    private $puerto = '';
    private $pregunta = '';
    private $respuesta = '';
    private $idusuariored = null;
    private $email = '';
	private $dblink = NULL;


    public function __construct()
    {
         parent::__construct();
		 //$this->$dblink =  conectar();
    }


    // ---- METODOS SET Y GET DE PROPIEDADES ----
  public function __set($var, $valor) {
         // convierte a minúsculas toda una cadena la función strtolower
         $temporal = strtolower($var);
         // Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
         if (property_exists ('Se_Usuario',$temporal)) {
             $this->$temporal = $valor;
         } else {
                 echo $var . " No existe.";
                }
  } //__set
    
  public function __get($var) {
         $temporal = strtolower($var);
         // Verifica que exista
         if (property_exists('Se_Usuario', $temporal)) {
             return $this->$temporal;
          }
         // Retorna nulo si no existe
         return NULL;
  }
  
    // METODOS
    public function validaUsuario() {
        $par = sprintf("'%s'", strtoupper($this->idusuario));
        if (is_null($this->clave)){$par .= ", null";} else {$par .= sprintf(",  '%s'", md5($this->clave));}
        $par .= sprintf(", '%s'", $this->ip);
        //$par .= sprintf(", '%s'", $this->idusuario);
        //$sql = sprintf("begin SE_PQ_Session.p_Inicia_Sesion(%s, true, :errcode, :errdesc); end;",$par);
		$sql = sprintf("SELECT sef_validasesionusuario(%s)",$par);
		//$db = Dbmgr::instance();
		$this-> QrySelect($sql);
        $reg = $this-> Result('f');
        return $reg;
    } //validaUsuario()
	
   /* public function get($idusuario) {
        $sql = sprintf("select SE_PQ_Usuario.f_get('%s') AS MFRC from dual ", $idusuario);
        $this->setSql($sql);
        $reg = $this->selectOne();
        return $reg;
    } // end get()

	public function getAllPagineo($idusuario, $descripcion, $estado, $idusuariored, $pageNum, $pageSize, &$regTotal, $allempleado = 'N'){
            $par =  (is_null($idusuario) || $idusuario == '' ? "null" : sprintf("'%s'", $idusuario));
            $par .= (is_null($descripcion) || $descripcion == '' ? ", null" : sprintf(", '%s'", $descripcion));                
            $par .= (is_null($estado) || $estado == '' ? ", null" : sprintf(", '%s'", $estado));                                        
            $par .= (is_null($idusuariored) || $idusuariored == '' ? ", null" : sprintf(", '%s'", $idusuariored));                                        
		$par .= (is_null($allempleado) || $allempleado == '' ? ", null" : sprintf(", '%s'", $allempleado));                      
            $sql = sprintf("select SE_PQ_Usuario.f_getBrowse_pag( %s,  %d, %d) AS MFRC from dual ",$par,  $pageNum, $pageSize);
            $this->setSql($sql);
            $reg = $this->selectAll();
            $regTotal = $reg[0]['ROWTOTAL'];
            return $reg;
    } // end getAllPagineo()

    public function getFull($idusuario, $idusuariored) {
        $par =  (is_null($idusuario) || $idusuario == '' ? "null" : sprintf("'%s'", strtoupper($idusuario)));
        $par .= (is_null($idusuariored) || $idusuariored == '' ? ", null" : sprintf(", '%s'", strtoupper($idusuariored)));           
        $sql = sprintf("select SE_PQ_Usuario.f_getFull(%s) AS MFRC from dual ", $par);
        $this->setSql($sql);
        $reg = $this->selectOne();
        return $reg;
    } // end getFull()    

    private function _getList($Idusuario, $Estado) {
        $par = sprintf("'%s'", $Idusuario);
        if (is_null($Estado)) {$par .= ", null";} else {$par .= sprintf(", '%s'", $Estado);}
        $sql = "select SE_PQ_Usuario.f_getList( " . $par . " ) AS MFRC from dual";
        $this->setSql($sql);
        $reg = $this->selectAll();
        return $reg;
    } // end _getList()

    public function getListArray($Idusuario, $Estado) {
        $listaItems = $this->_getList($Idusuario, $Estado);
        return $this->matriz2lista($listaItems);
    } // end getListArray()

    public function delete() {
        $sql = sprintf("begin SE_PQ_Usuario.p_delete('%s', '%s', '%s', true, :errcode, :errdesc); end;",$this->idusuario, $this->idusuario_log, $this->ip);
        $this->setSql($sql);
        $reg = $this->mantenimiento();
        return $reg;
    } // end delete()

    public function insert() {
        $par = $this->_atr2parametros();
        $sql = sprintf("begin SE_PQ_Usuario.p_insert(%s, true, :errcode, :errdesc); end;", $par);
        $this->setSql($sql);
        $reg = $this->mantenimiento();
        return $reg;
    } // end insert()

    public function update() {
        $par = $this->_atr2parametros();
        $sql = sprintf("begin SE_PQ_Usuario.p_update(%s, true, :errcode, :errdesc); end;", $par);
        $this->setSql($sql);
        $reg = $this->mantenimiento();
        return $reg;
    } // end update()

    private function _atr2parametros() {
        $sql = sprintf("'%s'", strtoupper($this->idusuario));
        $sql .= sprintf(", %d", $this->idpersona);
        $sql .= sprintf(", '%s'", $this->descripcion);
        $sql .= sprintf(", '%s'", $this->clave);
        $sql .= sprintf(", '%s'", $this->estado);
        $sql .= sprintf(", '%s'", $this->idusuario_log);
        $sql .= sprintf(", '%s'", $this->ip);
        if (is_null($this->pcimpresora)){$sql .= ", null";} else {$sql .= sprintf(",  '%s'", $this->pcimpresora);}
        if (is_null($this->nombreimpresora)){$sql .= ", null";} else {$sql .= sprintf(",  '%s'", $this->nombreimpresora);}
        if (is_null($this->servidor)){$sql .= ", null";} else{$sql .= sprintf(",  '%s'", $this->servidor);}
        if (is_null($this->puerto)){$sql .= ", null";} else{$sql .= sprintf(",  '%s'", $this->puerto);}
        return $sql;
    } // end _atr2parametros()

    public function get_modulos($idusuario, $idsistema) {
        $par = sprintf("'%s', %d", $idusuario, $idsistema);
        $sql = "select SE_PQ_Session.f_ModuloXUsuario( " . $par . " ) AS MFRC from dual"; $this->setSql($sql);
        $reg = $this->selectAll();
        return $reg;
    } //get_modulos()

    public function get_transacciones($idusuario, $idmodulo, $idsistema)  {
        $par = sprintf("'%s', %d", $idusuario, $idmodulo);
        $sql = "select SE_PQ_Session.f_TransXModUsuario( " . $par . " ) AS MFRC from dual";
        $this->setSql($sql);
        $reg = $this->selectAll();
        return $reg;
    } // get_transacciones()

    public function validaUsuario() {
        $par = sprintf("'%s'", strtoupper($this->idusuario));
        if (is_null($this->clave)){$par .= ", null";} else {$par .= sprintf(",  '%s'", md5($this->clave));}
        $par .= sprintf(", '%s'", 'NOMBREPC');
        $par .= sprintf(", '%s'", $this->ip);
        $par .= sprintf(", '%s'", $this->idusuario);
        $sql = sprintf("begin SE_PQ_Session.p_Inicia_Sesion(%s, true, :errcode, :errdesc); end;",$par);
        $this->setSql($sql);
        $reg = $this->mantenimiento(false);
        return $reg;
    } //validaUsuario()

*/
    /**
     * inserta un perfil de usuario en oracle
     * @return [type] [description]
     */
    /*public function insertPerfilUsuario($primer_nombre,$segundo_nombre,$primer_apellido,$segundo_apellido,$oficina,$telefono,$address) {
        $par = sprintf("'%s'", strtoupper($ldapController->usuario));
        $par .= sprintf(", '%s'", md5($ldapController->password));
        $par .= sprintf(", %d", $this->idpersona);
        $par .= sprintf(", '%s'", $this->descripcion);
        $par .= sprintf(", '%s'", $this->idusuario_log);
        $par .= sprintf(", '%s'", $this->ip);
        $sql = sprintf("begin SE_PQ_Usuario.p_insertperfilusuario(%s, true, :errcode, :errdesc); end;",$par);
        $this->setSql($sql);
        $reg = $this->mantenimiento(false);
        return $reg;
    }  // end insertperfilusuario()
*/
    /**
     * * edita un perfil de usuario en oracle
     * @return [type] [description]
     */
    /*
	public function updatePerfilUsuario() {
        $par = sprintf("'%s'", strtoupper($this->idusuariored));
        $par .= sprintf(", '%s'", $this->email);
        $par .= sprintf(", '%s'", $this->pregunta);
        $par .= sprintf(", '%s'", $this->respuesta);
        $par .= sprintf(", '%s'", $this->idusuario_log);
        $par .= sprintf(", '%s'", $this->ip);
        $sql = sprintf("begin SE_PQ_Usuario.p_updateperfilusuario(%s, true, :errcode, :errdesc); end;",$par);
        $this->setSql($sql);
        $reg = $this->mantenimiento(false);
        return $reg;
    }  //end updateperfilusuario()


    public function getPregunta($usuario, $codigoempleado, $numeroidentificacion) {
        $par = sprintf("'%s'", strtoupper($usuario));
        $par .= sprintf(", %d", $codigoempleado);
        $par .= sprintf(", '%s'", $numeroidentificacion);
        $sql = sprintf("select SE_PQ_USUARIO.f_getPregunta(%s) AS MFRC from dual ", $par);
        $this->setSql($sql);
        $reg = $this->selectOne();
        return $reg;
    }  // end getPregunta()

    public function validaPregunta($usuario, $codigopregunta, $respuesta, $codigoempleado, $numeroidentificacion) {
        $par = sprintf("'%s'", strtoupper($usuario));
        $par .= sprintf(", %d", $codigopregunta);
        $par .= sprintf(", '%s'", $respuesta);
        $par .= sprintf(", %d", $codigoempleado);
        $par .= sprintf(", '%s'", $numeroidentificacion);
        $sql = sprintf("select SE_PQ_USUARIO.f_validaPregunta(%s) AS MFRC from dual", $par);
        $this->setSql($sql);
        $reg = $this->selectOne();
        return $reg;
    }  //end validaPregunta()

    public function cambioContrasena() {
        $par = sprintf("'%s'", strtoupper($this->idusuario));
        $par .= sprintf(", '%s'", $this->clave);
        $par .= sprintf(", '%s'", $this->idusuario_log);
        $par .= sprintf(", '%s'", $this->ip);
        $sql = sprintf("begin SE_PQ_Usuario.p_cambioContrasena(%s, true, :errcode, :errdesc); end;", $par);
        $this->setSql($sql);
        $reg = $this->mantenimiento();
        return $reg;
    }  //end cambioContrasena()


    public function EnableUsuario() {
        $par = sprintf("'%s'", strtoupper($this->idusuariored));
        $par .= sprintf(", '%s'", $this->idusuario_log);
        $par .= sprintf(", '%s'", $this->ip);            
        $sql = sprintf("begin SE_PQ_Usuario.p_enableUsuario(%s, true, :errcode, :errdesc); end;", $par);
        $this->setSql($sql);
        $reg = $this->mantenimiento();
        return $reg;
    } // end EnableUsuario()       

    public function DisableUsuario() {
        $par = sprintf("'%s'", strtoupper($this->idusuariored));
        $par .= sprintf(", '%s'", $this->idusuario_log);
        $par .= sprintf(", '%s'", $this->ip);            
        $sql = sprintf("begin SE_PQ_Usuario.p_disableUsuario(%s, true, :errcode, :errdesc); end;", $par);
        $this->setSql($sql);
        $reg = $this->mantenimiento();
        return $reg;
    } // end DisableUsuario()       
        */
} // end class Se_Usuario
?>