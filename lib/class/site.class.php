<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
/*
* Mysql database class - only one connection alowed
*/

class siteClass {
	private $_connection;
	private static $_instance; //The single instance
	private $_host     = DBHOST; //mysql wampserver
	private $_username = DBUSER;
	private $_password = DBPASSWORD;
	private $_database = DBNAME;
    
    private $_qryresult = array();
    private $_data      = array();

    public function __set($dt, $vl) {
        $this->data[$dt] = $vl;
    }

    public function __get($dt) {
        return $this->data[$dt];
    }
    
	/*
	Get an instance of the Database
	@return Instance
	*/
	public static function getInstance() {
		if(!self::$_instance) { // If no instance then make one
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	// Constructor
	private function __construct() {
		$this->_connection = new mysqli($this->_host, $this->_username, $this->_password, $this->_database);
	
		// Error handling
		if(mysqli_connect_error()) {
			trigger_error("Failed to conencto to MySQL: " . mysqli_connect_error(),
				 E_USER_ERROR);
		}
	}

	// Magic method clone is empty to prevent duplication of connection
	private function __clone() { }

	// Insert Query
	public function insertQuery($params,$table) {
        $keyArr=$valArr=array();
        foreach($params as $pk=>$pv){
            $keyArr[]=$pk;
            $valArr[]="'".addslashes($pv)."'";
        }
        $query = "insert into ".$table." (".implode(',',$keyArr).") values(".implode(',',$valArr).")";
        if($this->_connection->query($query))
            return mysqli_insert_id($this->_connection);
        else
            return false;
	}
    
    // Update Query
	public function updateQuery($params,$table,$ExtraQryStr) {
        $qryArr=array();
        foreach($params as $pk=>$pv){
            $qryArr[]= $pk."='".addslashes($pv)."'";
        }
        $query = "update ".$table." set ".implode(',',$qryArr)." where ".$ExtraQryStr;
        if($this->_connection->query($query))
            return true;
        else
            return false;
	}
    
    // Select Single Row Query
	public function selectSingle($requestedField,$table,$ExtraQryStr) {
        
        $query="SELECT ".$requestedField." FROM ".$table." WHERE $ExtraQryStr ";
        $this->_data = array();
        if($this->_data = $this->_connection->query($query))
            return $this->_data->fetch_assoc();
        else
            return false;
	}
    
    // Select Multiple Row Query
	public function selectMultiple($requestedField,$table,$ExtraQryStr,$start,$limit) {
        
        $query="SELECT ".$requestedField." FROM ".$table." WHERE $ExtraQryStr limit $start,$limit";
        if($this->_qryresult = $this->_connection->query($query)){
            $this->_data = array();
            while($row = $this->_qryresult ->fetch_assoc()) {
                $this->_data[] = $row;
            }
            return $this->_data;
        }
        else
            return false;
	}
    
    // Select Multiple Row Query
	public function selectMultipleWithoutLimit($requestedField,$table,$ExtraQryStr) {
        
        $query="SELECT ".$requestedField." FROM ".$table." WHERE $ExtraQryStr";
        if($this->_qryresult = $this->_connection->query($query)){
            $this->_data = array();
            while($row = $this->_qryresult ->fetch_assoc()) {
                $this->_data[] = $row;
            }
            return $this->_data;
        }
        else
            return false;
	}
    
    // Count Row Query
	public function countRow($needle,$table,$ExtraQryStr) {
        
        $query="SELECT COUNT(".$needle.") AS total FROM ".$table." WHERE $ExtraQryStr";
        if($this->_qryresult = $this->_connection->query($query)){
            $this->_data = $this->_qryresult ->fetch_assoc();
            return $this->_data['total'];    
        }
        else
            return false;
	}
    
    // Sum Row Query
    public function countSum($needle,$table,$ExtraQryStr) {

        $query="SELECT SUM(".$needle.") AS total FROM ".$table." WHERE $ExtraQryStr";
        if($this->_qryresult = $this->_connection->query($query)){
            $this->_data = $this->_qryresult ->fetch_assoc();
            return ($this->_data['total']) ? $this->_data['total'] : 0;
        }
        else
            return false;
     }
    
    // Delete Query
	public function deleteRow($table,$ExtraQryStr) {
        
        $query="DELETE FROM ".$table." WHERE $ExtraQryStr";
        if($this->_connection->query($query))
            return true;
        else
            return false;
	}
    
    // Truncate
	public function truncate($table) {
        
        $query="TRUNCATE TABLE ".$table;
        if($this->_connection->query($query))
            return true;
        else
            return false;
	}
    
    public function executeQuery($query){
        if($this->_connection->query($query))
            return true;
        else
            return false;
    }
    
    public function executeMultipleQuery($query){
        if($this->_qryresult = $this->_connection->query($query)){
            $this->_data = array();
            while($row = $this->_qryresult ->fetch_assoc()) {
                $this->_data[] = $row;
            }
            return $this->_data;
        }
        else
            return false;
    }
     public function executesingleQuery($query){
        $this->_data = array();
        if($this->_data = $this->_connection->query($query))
            return $this->_data->fetch_assoc();
        else
            return false;
    }
    
    //Destructor
    function __destruct(){
        mysqli_close($this->_connection);
    }
}


class dbData{
    
    private $_obj;
    private $_result;
    private $_data;
    private $_table;
    
    function __construct($db_table){
        $this->_table   = $db_table;
        $this->_obj     = siteClass::getInstance();
    }
    
    function newDbData($params){
        return $this->_obj->insertQuery($params,$this->_table);
    }
    
    function updateDbData($params,$ExtraQryStr){
        return $this->_obj->updateQuery($params,$this->_table,$ExtraQryStr);
    }
    
    function existDbData($ExtraQryStr,$needle){
        return $this->_obj->countRow($needle,$this->_table,$ExtraQryStr);
    }

    function sumDbData($ExtraQryStr,$needle){
        return $this->_obj->countSum($needle,$this->_table,$ExtraQryStr);
    }
    
    function getDbData($ExtraQryStr,$start,$limit,$fetchField='*',$orderBy=''){
        $ExtraQryStr = $ExtraQryStr.' '.$orderBy;
        return $this->_obj->selectMultiple($fetchField,$this->_table,$ExtraQryStr,$start,$limit);
    }

    function getDbDataWithoutLimit($ExtraQryStr,$fetchField='*',$orderBy=''){
        $ExtraQryStr = $ExtraQryStr.' '.$orderBy;
        return $this->_obj->selectMultipleWithoutLimit($fetchField,$this->_table,$ExtraQryStr);
    }

    function getSingleDbData($ExtraQryStr,$fetchField='*'){
        return $this->_obj->selectSingle($fetchField,$this->_table,$ExtraQryStr);
    }
    
    function deleteDbData($ExtraQryStr){
        return $this->_obj->deleteRow($this->_table,$ExtraQryStr);
    }

    function executeQueryMultiple($query){
        return $this->_obj->executeMultipleQuery($query);
    }

    function executesingleQuery($query) {
        return $this->_obj->executesingleQuery($query);
    }
}
