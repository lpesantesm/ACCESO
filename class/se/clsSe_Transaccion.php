<?php  
//archivo: clsSe_Transaccion.php
// Codigo Autogenerado 16-NOV-10 05.51.04.358301 PM -05:00
require_once strtolower($_SERVER["DOCUMENT_ROOT"]).'/class/classDbmgr.php';

class Se_Transaccion extends Dbmgr {

    // ATRIBUTOS
    private $idtransaccion = 0;
    private $idmodulo = 0;
    private $nombre = '';
    private $descripcion = '';
    private $directorio = '';
    private $pagina = '';
    private $tipo = '';
    private $orden = 0;
    private $idtransaccionpadre = 0;
    private $fecharegistro = null;
    private $idusuariolog = '';
    private $ip = '';
	


    public function __construct()
    {
        parent::__construct();
    }


    // ---- METODOS SET Y GET DE PROPIEDADES ----
    public function __set($var, $valor) {
           // convierte a minúsculas toda una cadena la función strtolower
           $temporal = strtolower($var);
           // Verifica que la propiedad exista, en este caso el nombre es la cadena en "$temporal"
           if (property_exists ('Se_Transaccion',$temporal)) {
               $this->$temporal = $valor;
           } else {
                   echo $var . " No existe.";
                  }
    } //__set
    
    public function __get($var) {
           $temporal = strtolower($var);
           // Verifica que exista
           if (property_exists('Se_Transaccion', $temporal)) {
               return $this->$temporal;
            }
           // Retorna nulo si no existe
           return NULL;
    }

   // METODOS
    public function validaTransaccionusuario($idusuario) {
        $par = sprintf("'%s'", strtoupper($idusuario));
        //if (is_null($this->clave)){$par .= ", null";} else {$par .= sprintf(",  '%s'", md5($this->clave));}
        //$par .= sprintf(", '%s'", $this->ip);
        $par .= sprintf(", %d", $this->idtransaccion);
        //$sql = sprintf("begin SE_PQ_Session.p_Inicia_Sesion(%s, true, :errcode, :errdesc); end;",$par);
		//$sql = sprintf("SELECT * from se_pq_usuario_fconsultamodulos(%s)",$par);
                $sql = sprintf("SELECT * from se_pq_usuario_fconsultatransacciones(%s)",$par);
		$this-> QrySelect($sql);
        $reg = $this-> Result('a');
        return $reg;
    } //validaUsuario()

    public function getAllPagineo( $pagnum, $pagsize){
        $par =  (is_null($this->idtransaccion) || $this->idtransaccion == '' || !is_numeric( $this->idtransaccion ) ? "null" : sprintf("%d", $this->idtransaccion));
        $par =  (is_null($this->idmodulo) || $this->idmodulo == '' || !is_numeric( $this->idmodulo ) ? "null" : sprintf("%d", $this->idmodulo));
        $par .= (is_null($this->nombre) || $this->nombre == '' ? ", null" : sprintf(", '%s'", $this->nombre));
		$par .= (is_null($pagnum) || $pagnum == '' ? ", null" : sprintf(", %s", $pagnum));
        $par .= (is_null($pagsize) || $pagsize == '' ? ", null" : sprintf(", %s", $pagsize));        
	    $sql = sprintf("SELECT * from se_pq_transaccion_fgetbrowserpag(%s)",$par);
        $this->QrySelect($sql);
        $reg = $this->Result('a');
        return $reg;        
   } // end getAllPagineo()  	
   
       public function consultaSubtransaccion() {
        $par = sprintf("%s", strtoupper($idtransaccion));
		$sql = sprintf("SELECT * from se_pq_usuario_fconsultatransaccion(%s)",$par);
		$this-> QrySelect($sql);
        $reg = $this-> Result('a');
        return $reg;
    } //validaUsuario()

    public function get(){
        $par = (is_null($this->idtransaccion) || $this->idtransaccion == '' ? "null" : sprintf("%d", $this->idtransaccion));
        $sql = sprintf("SELECT * from se_pq_transaccion_fgetfull(%s)", $par);
        $this->QrySelect($sql);
        $reg = $this->Result('f');
        return $reg;                
    } // end get()
    
    private function _atr2parametros($isUpdate){
        $par = '';
        if ($isUpdate){ $par .= ((is_null($this->idtransaccion) || $this->idtransaccion == 0) ? 'null' : sprintf('%d', $this->idtransaccion));}
        $par .= ((is_null($this->idmodulo) || $this->idmodulo == 0) ? ', null ' : sprintf('%d', $this->idmodulo));
        $par .= sprintf(", '%s'", strtoupper($this->nombre));
        if (is_null($this->descripcion) || $this->descripcion == ''){$par .= ", null";} else {$par .= sprintf(", '%s'", $this->descripcion);}
        if (is_null($this->pagina) || $this->pagina == ''){$par .= ", null";} else {$par .= sprintf(", '%s'", $this->pagina);}        
        if (is_null($this->tipo) || $this->tipo == ''){$par .= ", null";} else {$par .= sprintf(", '%s'", $this->tipo);}                
        if (is_null($this->orden) || $this->orden == 0){$par .= ", null";} else {$par .= sprintf(", %d", $this->orden);}                        
        if (is_null($this->idtransaccionpadre) || $this->idtransaccionpadre == 0){$par .= ", null";} else {$par .= sprintf(", %d", $this->idtransaccionpadre);}                        
        if (substr($par,0,1) == ',') { $par = substr($par,1); }        
        return $par;
        
        
    } // end _atr2parametros()    

    public function insert(){
        $par = $this->_atr2parametros(false);
        $par .= sprintf(", '%s'", '1');  
        $par .= sprintf(", '%s'", $this->idusuariolog);  
        $par .= sprintf(", '%s'", $this->ip);          
        $sql = sprintf("SELECT * from se_pq_transaccion_pinsert(%s)", $par);
	$this-> QrySelect($sql);
        $reg = $this-> Result('f');
        return $reg;        
    } // end insert()

    public function update(){
        $par = $this->_atr2parametros(true);
        $par .= sprintf(", '%s'", '1');  
        $par .= sprintf(", '%s'", $this->idusuariolog);  
        $par .= sprintf(", '%s'", $this->ip);          
        $sql = sprintf("SELECT * from se_pq_transaccion_pupdate(%s)", $par);
	$this-> QrySelect($sql);
        $reg = $this-> Result('f');
        return $reg;        
    } // end update()
    
    public function delete(){
        $par = ((is_null($this->idtransaccion) || $this->idtransaccion == 0) ? 'null' : sprintf('%d', $this->idtransaccion));
        $par .= sprintf(", '%s'", '1');  
        $par .= sprintf(", '%s'", $this->idusuariolog);  
        $par .= sprintf(", '%s'", $this->ip);                  
        $sql = sprintf("SELECT * from se_pq_transaccion_pdelete(%s)", $par);
	$this-> QrySelect($sql);
        $reg = $this-> Result('f');
        return $reg;
    } // end delete()    

   
} // end class Se_Transaccion
?>