<?php

//session_start();
set_time_limit(0);

class Conexion{

    // A T R I B U T O S
    public $host = '';
    public $port = '';
    public $service_name = '';
    public $usuario = '';
    public $passwd = '';
    public $cnx = '';
	public $dbname = '';

    //M E T O D O S
    function __construct(){
        $this->host = 'ec2-54-243-185-99.compute-1.amazonaws.com'; //'10.100.3.225';//'10.101.0.240';//'192.168.97.36';//'10.101.1.87'; //'192.168.97.140';
        $this->port = '5432';//'1521';
        //$this->service_name = 'ADMIN';  //'gpgprod';
        $this->usuario =   'lobxpiyeyxejzq';//'SCHSGP';
        $this->passwd = 'cd75b62e495181141f92dece1d64f46ce79ac081479e86ae503060a70024ecb9';
		$this->dbname = 'dcjbjufidqvphb';
    }// end funcion

    function conectar(){
        //$this->cnx = pg_connect($this->usuario, $this->passwd, "//" . $this->host . ":" . $this->port . "/" . $this->service_name, 'AL32UTF8');
		$strCnx = "host=".$this->host." port=".$this->port." dbname=".$this->dbname." user=".$this->usuario." password=".$this->passwd;
		$this->cnx = pg_connect($strCnx);
		//$this->cnx = pg_connect($strCnx "host=".$this->host." port=".$this->port." dbname=dcjbjufidqvphb user=".$this->usuario." password=".$this->passwd ." options='--application_name=$appName");
        if(!$this->cnx){
            echo 'No hay conexion con la Base de Datos';
        } // end if
    }// end funcion
    
    function getCnx(){
        return $this->cnx;
    }// end funcion
    
}// end class