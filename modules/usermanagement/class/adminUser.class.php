<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class adminUser{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getUser($ExtraQryStr,$start,$limit,$fetchField='*',$orderBy='entryDate DESC'){
        $ExtraQryStr = $ExtraQryStr.' ORDER BY '.$orderBy;
        return $this->_obj->selectMultiple($fetchField,TBL_USER,$ExtraQryStr,$start,$limit);
    }
    
    function countUserByParentUserId($parentUserId){
        $needle = 'userId';
        $ExtraQryStr = "parentUserId=".addslashes($parentUserId);
        return $this->_obj->countRow($needle,TBL_USER,$ExtraQryStr);
    }
    
    function getUserByUserId($UserId,$fetchField='*'){
        $ExtraQryStr = "userId='".addslashes($UserId)."'";
        return $this->_obj->selectSingle($fetchField,TBL_USER,$ExtraQryStr);
    }
    
    function existUser($ExtraQryStr){
        $needle = 'userId';
        return $this->_obj->countRow($needle,TBL_USER,$ExtraQryStr);
    }
    
    function updateUserByUserId($params,$userId){
        $ExtraQryStr = "userId='".addslashes($userId)."'";
        return $this->_obj->updateQuery($params,TBL_USER,$ExtraQryStr);
    }
    
    function newUser($params){
        return $this->_obj->insertQuery($params,TBL_USER);
    }
    
    function deleteUser($userId){
        $ExtraQryStr = "userId=".addslashes($userId);
        return $this->_obj->deleteRow(TBL_USER,$ExtraQryStr);
    }
}
?>