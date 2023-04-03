<?php
define("TBL_ALLLEAD_CRM",                   "tbl_lead");
define("TBL_USER_CRM",                      "tbl_user");
//Defining Variable

//Mother Classes
class siteClassCrm {
	private $_connection;
	private static $_instance; //The single instance
	private $_host     = DBHOSTCRM; //mysql wampserver
	private $_username = DBUSERCRM;
	private $_password = DBPASSWORDCRM;
	private $_database = DBNAMECRM;
    
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
		$this->_connection = new mysqli($this->_host, $this->_username, 
			$this->_password, $this->_database);
	
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
    
    //Destructor
    function __destruct(){
        mysqli_close($this->_connection);
    }
}
//Mother Classes

//Customer Class
class viewLeadCrm {
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClassCrm::getInstance();
    }
    
    function getLead($ExtraQryStr,$start,$limit,$fetchField='*',$orderBy='entryDate DESC'){
        $ExtraQryStr = $ExtraQryStr.' ORDER BY '.$orderBy;
        return $this->_obj->selectMultiple($fetchField,TBL_ALLLEAD_CRM,$ExtraQryStr,$start,$limit);
    }
    
    function getLeadByLeadId($LeadId,$fetchField='*'){
        $ExtraQryStr = "leadId='".addslashes($LeadId)."'";
        return $this->_obj->selectSingle($fetchField,TBL_ALLLEAD_CRM,$ExtraQryStr);
    }
    
    function getLeadByEmail($email,$fetchField='*'){
        $ExtraQryStr = "email='".addslashes($email)."'";
        return $this->_obj->selectSingle($fetchField,TBL_ALLLEAD_CRM,$ExtraQryStr);
    }
    
    function existLead($ExtraQryStr){
        $needle = 'leadId';
        return $this->_obj->countRow($needle,TBL_ALLLEAD_CRM,$ExtraQryStr);
    }
    
    function newLead($params){
        return $this->_obj->insertQuery($params,TBL_ALLLEAD_CRM);
    }
    
    function updateLeadByLeadId($params,$leadId){
        $ExtraQryStr = "leadId='".addslashes($leadId)."'";
        return $this->_obj->updateQuery($params,TBL_ALLLEAD_CRM,$ExtraQryStr);
    }
}
//Customer Class

//Agent Class
class staffCrm{
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClassCrm::getInstance();
    }
    
    function getStaff($ExtraQryStr,$start,$limit,$fetchField='*'){
        $ExtraQryStr = $ExtraQryStr.' and userSource="F"';
        return $this->_obj->selectMultiple($fetchField,TBL_USER_CRM,$ExtraQryStr,$start,$limit);
    }
    
    function getStaffByUserNameAndPassword($username,$password){
        $ExtraQryStr = "username='".addslashes(trim($username))."' and password='".md5(addslashes(trim($password)))."' and userSource='F'";
        return $this->_obj->selectSingle('*',TBL_USER_CRM,$ExtraQryStr);
    }
    
    function getStaffSingle($ExtraQryStr,$fetchField='*'){
        return $this->_obj->selectSingle($fetchField,TBL_USER_CRM,$ExtraQryStr);
    }
}
//Agent Class