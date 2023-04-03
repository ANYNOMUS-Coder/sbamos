<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class viewContent{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getMultipleContent($ExtraQryStr,$start,$limit){
        $ExtraQryStr = $ExtraQryStr." and status='Y' order by swapNo";
        return $this->_obj->selectMultiple('*',TBL_CONTENT,$ExtraQryStr,$start,$limit);
    }
    
    function getContentByPageId($pageId){
        $ExtraQryStr = "pageId='".addslashes($pageId)."' and status='Y'";
        return $this->_obj->selectSingle('*',TBL_CONTENT,$ExtraQryStr);
    }
    
    function getMultipleContentByPageId($pageId,$start,$limit){
        $ExtraQryStr = "pageId='".addslashes($pageId)."' and status='Y'";
        return $this->_obj->selectMultiple('*',TBL_CONTENT,$ExtraQryStr,$start,$limit);
    }
    
    function getMultipleContentByModuleId($moduleId,$start,$limit){
        $ExtraQryStr = "moduleId='".addslashes($moduleId)."' and status='Y'";
        return $this->_obj->selectMultiple('*',TBL_CONTENT,$ExtraQryStr,$start,$limit);
    }
    
    function getMultipleParentContentById($cntId,$start,$limit){
        $ExtraQryStr = "parentId='".addslashes($cntId)."' and status='Y'";
        return $this->_obj->selectMultiple('*',TBL_CONTENT,$ExtraQryStr,$start,$limit);
    }
    
    function getContentById($cntId){
        $ExtraQryStr = "contentId='".addslashes($cntId)."' and status='Y'";
        return $this->_obj->selectSingle('*',TBL_CONTENT,$ExtraQryStr);
    }
    
}
?>