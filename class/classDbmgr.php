<?PHP
// dbmgr.class.php
// DB Manager Utility class


//require_once('sys/class.config.php');
require_once 'classConexion.php';
require_once('classCollection.php');

class Dbmgr extends Conexion
 {

	//data connection properties
	private static $instance;
	private $Server;
	private $DBName;
	private $User;
	private $Pwd;
	private $Result;
	private $QryId;
	private $ConexId;
	private $OpID;
	private $Error_;
	
	function __construct() {
		parent::__construct();
		$this->conectar();
		}
	
	// Connect Database
	static function instance() 
	{
		if( !isset(self::$instance)){ 
			self::$instance = new self(); 
		}
		return self::$instance;
	}
	
	public function connect($Serv="",$DB="",$User="",$Ps="") {
		if ($Serv == "") $this->Server = ConfigData::$server;
		if ($DB == "") $this->DBName = ConfigData::$dbName;
		if ($User == "") $this->User = ConfigData::$user;
		if ($Ps == "") $this->Pwd = ConfigData::$pwd;
		
        // connect to database server
		//$this->ConexId = @mysql_connect($this->Server, $this->User, $this->Pwd);
		$strCnx = "host=".$this->Server." port=5432 dbname=".$this->DBName." user=".$this->User." password=".$this->Pwd;
		$this->ConexId = $this->conectar(); //pg_connect($strCnx);
		if (!$this->ConexId) 
		{
			die('<center><b>Página web en mantenimiento</b></center>');
			$this->Error_ = "Fallo al intentar conectar";
			return 0;
		}
		//mysql_query("SET NAMES 'utf8'");
		// select database as set 
		// $this->DBId = @mysql_select_db($this->DBName, $this->ConexId);
		// if (!$this->DBId) 
		// {
		//     die ('Couldn\'t access de database file : ' . $this->DBName ." - ". mysql_error());
		// 	$this->Error_ = 'Couldn\'t access de database file : ' . $this->DBName ." - ". mysql_error();
		// }
		
	}
		
	// Send a SQL command to the Database
	function QrySelect ($sql = "") {
	
		$QryResult = "";
	
		if ($sql == "") {
			$this->Error_ = "An SQL sentence must be specified";
			return 0;
		}
		
		// Run the query
		//$this->QryId = @mysql_query($sql, $this->ConexId);
		
		//$this->ConexId = $this->conectar();
		//echo $this->ConexId;
		$this->QryId = pg_query($this->getCnx(),$sql);

		// if (!$QryResult) {
		// 	$this->Error_ = pg_last_error() ;
		// 	return 0;
		// }
		return $this->QryId; 
	}
	
	function Result($cond="a", $type = PGSQL_ASSOC)
	{
		$result = "";
		//echo 'cond ==> ' . $cond . '<br/>';

		//if (@mysql_num_rows($this->QryId) >= 0)
		if (@pg_num_rows($this->QryId) >= 0)

		{
			$result = new Collection();
		    // make sure to return all the rows in the result
			// use a collection 
			// pg_fetch_array
			

			//while ($row = @mysql_fetch_array($this->QryId, MYSQL_BOTH))
			while ($row = @pg_fetch_array($this->QryId, null, $type))
			{
				$result->addItem($row);
			}
		}
		/*else 
		{  
			$result = 0;
		} */
		
		switch ($cond)
		{
			case "a":
				$this->Result = $result->listItems();
				break;
			case "f":
				$records = $result->listItems();
				$this->Result = $records[0];
				break;
			case "l":
				$records = $result->listItems();
				$this->Result = $records[$result-> length()-1];
				break;
		}
		
		return $this->Result;
	}
	
	public function CountRecords($sql) {
		//echo "<br/>sql ----> $sql <br/>";
		$this->QrySelect($sql);
		return @pg_num_rows($this->QryId);
	}
	
	public function field_array($sql = "") {   
       if ($sql == "") {
			$this->Error_ = "An SQL sentence must be specified";
			return 0;
		}
	    $this->QrySelect($sql);
		$field = @pg_num_fields($this->QryId);   
        for ( $i = 0; $i < $field; $i++ ) {       
            $names[] = @pg_field_name($this->QryId, $i );
        }
       
        return $names;
   
    }
	function GetError()
	{
		return $this->Error_;
	}
	
}

?>