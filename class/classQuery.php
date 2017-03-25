<?php
require_once 'classConexion.php';
//require_once strtolower($_SERVER["DOCUMENT_ROOT"]).'/lib/log.php';

class Query extends Conexion {
    private $init_package = 'begin dbms_session.modify_package_state(2); end;';

    protected $sql = '';
    protected $clob_data = '';
    protected $clob_field = '';
    protected $clob_data2 = '';
    protected $clob_field2 = '';
    protected $msjAlerta = '';
    protected $tipoAlerta = '';
    protected $idAI = 0;
//crz    protected $bXml = '';// id (autoincremento) de ultimo insert/ valores retornados despues de actualizacion
//    private $name_idAI = null; // nombre del campo de autoincremento retornado desde bd

    public function __construct() {
        parent::__construct();
        $this->conectar();
        if (! $this->cnx) {
            $e = oci_error();
            $this->__errorDB($e['code'], $e['message'], "");
            exit;
        }
    }

    public function setSql($value) { $this->sql = $value; }
    public function setClob_data($value) { $this->clob_data = $value; }
    public function setClob_field($value) { $this->clob_field = $value; }
    public function setClob_data2($value) { $this->clob_data2 = $value; }
    public function setClob_field2($value) { $this->clob_field2 = $value; }
    public function setMsjAlerta($value) {$this->msjAlerta = $value; }
    public function getMsjAlerta() { return $this->msjAlerta; }
    public function setTipoAlerta($value) {$this->tipoAlerta = $value; }
    public function getTipoAlerta() { return $this->tipoAlerta; }
    public function getIdAI() { return $this->idAI; }
    public function setName_idAI($value) {$this->name_idAI = $value; }
//    public function setbXml($valor){ $this->bXml = trim(str_replace("'","",$valor));}
    //public function getbXml(){ return $this->bXml;}
    
    public function selectOneValue() {
        $cnx = $this->getCnx();
        
        $stmt = pg_prepare($cnx, $this->sql);
        $result = pg_execute($stmt);
        if (!$result) {
            $errCode = null;
            $errDesc = null;
            $this->__errorDB($errCode,$errDesc,$stmt);
            //oci_free_statement($stmt);
            $reg = false;
        } else {
            //$this->logApp(null,null,$this->sql,$_SERVER['PHP_SELF'], __LINE__,((isset($_SESSION['usuario'])) ? $_SESSION['usuario']:''),(isset($_SESSION['ip']) ? $_SESSION['ip']:'0.0.0.0'),(isset($_SESSION['dir']) ? $_SESSION['dir']:''));            
            logApp(null,null,$this->sql,$_SERVER['PHP_SELF'], get_class($this),__LINE__,((isset($_SESSION['usuario'])) ? $_SESSION['usuario']:''),(isset($_SESSION['ip']) ? $_SESSION['ip']:'0.0.0.0'),(isset($_SESSION['dir']) ? $_SESSION['dir']:''));
        }
        
        if (! isset ($reg)) {
            if (strripos($this->sql, 'AS MFRC from dual') > 0) {
                while (($row = oci_fetch_array($stmt, OCI_ASSOC))) { $reg = $row['MFRC'];}
            } else { $reg = oci_fetch_assoc($stmt);}  // extraer datos de 1 fila
        }
        oci_free_statement($stmt);
        return $reg;
    } // end selectOneValue

    public function selectOne() {
        $cnx = $this->getCnx();
        $stmt = oci_parse($cnx, $this->sql);
        $result = oci_execute($stmt);
        if (!$result) {
            $errCode = null;
            $errDesc = null;
            $this->__errorDB($errCode,$errDesc,$stmt);
            //oci_free_statement($stmt);
            $reg = false;
        } else {
            //$this->logApp(null,null,$this->sql,$_SERVER['PHP_SELF'], __LINE__,((isset($_SESSION['usuario'])) ? $_SESSION['usuario']:''),(isset($_SESSION['ip']) ? $_SESSION['ip']:'0.0.0.0'),(isset($_SESSION['dir']) ? $_SESSION['dir']:''));            
            logApp(null,null,$this->sql,$_SERVER['PHP_SELF'],get_class($this), __LINE__,((isset($_SESSION['usuario'])) ? $_SESSION['usuario']:''),(isset($_SESSION['ip']) ? $_SESSION['ip']:'0.0.0.0'),(isset($_SESSION['dir']) ? $_SESSION['dir']:''));
        }
        if (! isset ($reg)) {
            if (strripos($this->sql, 'AS MFRC from dual') > 0) {
                while (($row = oci_fetch_array($stmt, OCI_ASSOC))) {
                    $rc = $row['MFRC'];
                    oci_execute($rc);  // returned column value from the query is a ref cursor
                    $reg = oci_fetch_assoc($rc);
                }
            } else {
                $reg = oci_fetch_assoc($stmt);  // extraer datos de 1 fila
            }
        } else {$reg = null;}
        oci_free_statement($stmt);
        return $reg;
    } // end selectOne

    public function selectAll() {
//echo "$this->sql";
//$this->logApp(0,'',$this->sql,$_SERVER['PHP_SELF'], __LINE__,((isset($_SESSION['usuario'])) ? $_SESSION['usuario']:''));			
        $stmt = oci_parse($this->getCnx(), $this->sql);
        $result = oci_execute($stmt);
        if (!$result) {
            $errCode = null;
            $errDesc = null;
            $this->__errorDB($errCode,$errDesc,$stmt);
            //$this->msjAlerta = "Error en el query";
            //oci_free_statement($stmt);
            $reg = false;
        } else {
            //$this->logApp(null,null,$this->sql,$_SERVER['PHP_SELF'], __LINE__,(isset($_SESSION['usuario']) ? $_SESSION['usuario']:''),(isset($_SESSION['ip']) ? $_SESSION['ip']:'0.0.0.0'),(isset($_SESSION['dir']) ? $_SESSION['dir']:''));            
            logApp(null,null,$this->sql,$_SERVER['PHP_SELF'],get_class($this), __LINE__,(isset($_SESSION['usuario']) ? $_SESSION['usuario']:''),(isset($_SESSION['ip']) ? $_SESSION['ip']:'0.0.0.0'),(isset($_SESSION['dir']) ? $_SESSION['dir']:''));
        }
        
        $registros = null;
        if (! isset ($reg)) {
            if (strripos($this->sql, 'AS MFRC from dual') > 0) {
                while (($row = oci_fetch_array($stmt, OCI_ASSOC+OCI_RETURN_LOBS))) {
                    $rc = $row['MFRC'];
                    oci_execute($rc);  // returned column value from the query is a ref cursor
                    while ($reg = oci_fetch_assoc($rc)) { $registros[] = $reg;}  // el indice se asigna automaticamente
                }
            } else {
                while ($reg = oci_fetch_assoc($stmt)) { $registros[] = $reg;} // el indice se asigna automaticamente
            }
        }
        oci_free_statement($stmt);
        return $registros;
    } // end selectAll


    public function mantenimiento($blog = true) {
        $errCode = 0;
        $errDesc = '';
        
        // terminal no autorizado
//        if ($_SESSION['ip'] == '10.101.1.24' and $this->usuario == 'SCHSGP' and  $_SESSION['usuario'] != 'LUCONSTANTE'  ) {
        //    $this->msjAlerta = "Terminal no Autorizado";
        //    return false;
        //}

        
        $cnx = $this->getCnx();
        //$stmt = pg_prepare( $cnx, 'my_query', $this->sql); //oci_parse( $cnx, $this->sql); // FUNCIONA CON PG_PREPARE
		$result = pg_query($cnx,$this->sql); 
       /*  if (strripos($this->sql, ', :errcode, :errdesc);') > 0) {
            if ($this->clob_field != '' and $this->clob_data != '') {
                $clob = oci_new_descriptor($cnx, OCI_D_LOB);
                oci_bind_by_name($stmt, $this->clob_field, $clob, -1 ,OCI_B_CLOB);
                $clob->writetemporary($this->clob_data);
            }
            if ($this->clob_field2 != '' and $this->clob_data2 != '') {
                $clob2 = oci_new_descriptor($cnx, OCI_D_LOB);
                oci_bind_by_name($stmt, $this->clob_field2, $clob2, -1 ,OCI_B_CLOB);
                $clob2->writetemporary($this->clob_data2);
            }
            
            oci_bind_by_name($stmt, ':errcode', $errCode, 10);
            oci_bind_by_name($stmt, ':errdesc', $errDesc, 300);
        } */


        //logApp(null,null,($blog ? $this->sql.($this->clob_data != '' ? '['.$this->clob_field.':'.$this->clob_data.']' : 'vacio').($this->clob_data2 != '' ? '['.$this->clob_field2.':'.$this->clob_data2.']' : 'vacio'): substr($this->sql,0,strpos($this->sql,'\','))),$_SERVER['PHP_SELF'],get_class($this), __LINE__,((isset($_SESSION['usuario'])) ? $_SESSION['usuario']:''),((isset($_SESSION['ip'])) ? $_SESSION['ip']:'0.0.0.0'),((isset($_SESSION['dir'])) ? $_SESSION['dir']:''));
        // echo $stmt;
        //$result = oci_execute($stmt);
        //$result = pg_execute($cnx, 'my_query', array());//FUNCIONA CON EL PG_PREPARE
        //$result = pg_query($cnx,  $this->sql);
        if (!$result) {
            $this->__errorDB(null,null,$stmt);
            //$this->msjAlerta = "Error en el query";
            if ($this->clob_field != '' and $this->clob_data != '') { $clob->free(); }
            if ($this->clob_field2 != '' and $this->clob_data2 != '') { $clob2->free(); }
            pg_free_result($stmt);
            return false;
        } else {
			return pg_fetch_all($result);
			//return pg_fetch_all($result);
            // se evita para la transaccion de signon registrar claves
            //$this->logApp(null,null,($blog ? $this->sql: substr($this->sql,0,strpos($this->sql,'\','))),$_SERVER['PHP_SELF'], __LINE__,((isset($_SESSION['usuario'])) ? $_SESSION['usuario']:''),((isset($_SESSION['ip'])) ? $_SESSION['ip']:'0.0.0.0'),((isset($_SESSION['dir'])) ? $_SESSION['dir']:''));    
           // logApp(null,null,($blog ? $this->sql.($this->clob_data != '' ? '['.$this->clob_field.':'.$this->clob_data.']' : 'vacio').($this->clob_data2 != '' ? '['.$this->clob_field2.':'.$this->clob_data2.']' : 'vacio'): substr($this->sql,0,strpos($this->sql,'\','))),$_SERVER['PHP_SELF'],get_class($this), __LINE__,((isset($_SESSION['usuario'])) ? $_SESSION['usuario']:''),((isset($_SESSION['ip'])) ? $_SESSION['ip']:'0.0.0.0'),((isset($_SESSION['dir'])) ? $_SESSION['dir']:''));
        }

//echo $errCode,'#'.$errDesc.'#';
        if ($errCode <> 0) {
            $this->__errorDB($errCode,$errDesc,null);
            if ($this->clob_field != '' and $this->clob_data != '') { $clob->free(); }
            if ($this->clob_field2 != '' and $this->clob_data2 != '') { $clob2->free(); }
            pg_free_result($stmt);
            return false;
        } elseif ($errDesc <> 'OK') { $this->idAI = $errDesc;}// recupero valor de clave autogenerado

        if ($this->clob_field != '' and $this->clob_data != '') { $clob->free(); }
        if ($this->clob_field2 != '' and $this->clob_data2 != '') { $clob2->free(); }
        pg_free_result($stmt);
        return true;
    } // end mantenimiento

    public function matriz2lista($listaItems) {
       $arrItems = null;
       // convierte recordset a matriz de 2 dimenciones
       if (is_array($listaItems)) { foreach ($listaItems as $ind => $valor) { $arrItems[$valor['CODE']] = $valor['DESCRIPTION'];}}
       return $arrItems;
    } // end matriz2lista()

     private function __errorDB($errCode, $errDesc, $stmt) {
        if (is_null($errCode) and is_null($errDesc)) {
            $e = oci_error($stmt);  // For oci_execute errors pass the statement handle
            if ($e != false) {
                $errCode = -$e['code'];        
                $errDesc = $e['message'];
            }
        }
//echo "__ErrorDB errcode[$errCode] errDesc[$errDesc]";            
        if ( ! is_null($errCode) and ! is_null($errDesc)) {
            if ($errCode <= -20000 and $errCode >= -20999) {   // errores aplicativos
                // solo texto de error warning
                $pi = strpos($errDesc,"ORA-");                
                if ($pi !== false) {
                    $pi = strpos($errDesc,":")+1;
                    $pf = strpos($errDesc,"ORA-",$pi);
                    eval('$errDescShow = substr($errDesc,$pi'. ( ($pf > 0) ? ',($pf-$pi)' : '' ) .');');
                    //$errDescShow = substr($errDesc,$pi);
                } else {
                    $errDescShow = $errDesc;
                }
                
                $this->msjAlerta = "Aviso: " . $errDescShow;    
                $this->tipoAlerta = "W";
            } else {
                $this->tipoAlerta = "E";
                if ($errCode == -1) {
                    $this->msjAlerta = "Error Registro duplicado";
                    $this->tipoAlerta = "W";
                } elseif ($errCode == -4068) {
                    $this->msjAlerta = "Paquetes descompilados, por favor reintente.";
                    //Reiniciar el estado del paquete
                    $stmt1 = oci_parse($this->getCnx(), $this->init_package);
                    oci_execute($stmt1);
                    oci_free_statement($stmt1);
                    
                } else {
                   // $this->msjAlerta = "En estos momentos no podemos atenderlo, intente luego de unos minutos." ;
                   $this->msjAlerta = "Error nativo " . $errDesc;
                }
            }
            logApp($errCode,$errDesc,$this->sql,$_SERVER['PHP_SELF'], get_class($this), __LINE__,((isset($_SESSION['usuario'])) ? $_SESSION['usuario']:''),((isset($_SESSION['ip'])) ? $_SESSION['ip']:'0.0.0.0'),((isset($_SESSION['dir'])) ? $_SESSION['dir']:''));
        }
//echo "<br>dentro de errorDB msjAlerta=".$this->msjAlerta;
    } //__errorDB()



//OJOT solo para desarrollo, hay que quitarlo en produccion
    protected  function showobject($color) {
		echo "<br><span style='color:".(is_null($color)?"blue":$color)."'>";print_r($this);echo '</span>';		
	} //showoject()
    protected  function showsql($color) {
		echo "<br><span style='color:".(is_null($color)?"green":$color)."'>".htmlentities($this->sql).'</span>';		
	} //showoject()

} // end class
?>