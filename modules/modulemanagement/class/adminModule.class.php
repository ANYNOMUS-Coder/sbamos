<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class adminModules{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getModules($ExtraQryStr,$start,$limit,$fetchField='*',$orderBy='swapNo'){
        $ExtraQryStr = $ExtraQryStr.' ORDER BY '.$orderBy;
        return $this->_obj->selectMultiple($fetchField,TBL_MODULE,$ExtraQryStr,$start,$limit);
    }
    
    function newModule($params){
        return $this->_obj->insertQuery($params,TBL_MODULE);
    }
    
    function countModulesByParentModuleId($parentModuleId){
        $needle = 'moduleId';
        $ExtraQryStr = "parentModuleId=".addslashes($parentModuleId);
        return $this->_obj->countRow($needle,TBL_MODULE,$ExtraQryStr);
    }
    
    function existModule($ExtraQryStr){
        $needle = 'moduleId';
        return $this->_obj->countRow($needle,TBL_MODULE,$ExtraQryStr);
    }
    
    function getModuleBymoduleId($moduleId){
        $ExtraQryStr = "moduleId='".addslashes($moduleId)."'";
        return $this->_obj->selectSingle('*',TBL_MODULE,$ExtraQryStr);
    }
    
    function updateModuleBymoduleId($params,$moduleId){
        $ExtraQryStr = "moduleId='".addslashes($moduleId)."'";
        return $this->_obj->updateQuery($params,TBL_MODULE,$ExtraQryStr);
    }
    
    function deleteModule($moduleId){
        $ExtraQryStr = "moduleId=".addslashes($moduleId);
        return $this->_obj->deleteRow(TBL_MODULE,$ExtraQryStr);
    }
}
?>