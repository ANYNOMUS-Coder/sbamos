<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class viewMailError{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function newMailError($params){
        return $this->_obj->insertQuery($params,TBL_EMAILERROR);
    }
}
?>