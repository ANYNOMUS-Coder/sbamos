<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class adminContent{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getContentById($cntId){
        $ExtraQryStr = "contentId='".addslashes($cntId)."'";
        return $this->_obj->selectSingle('*',TBL_CONTENT,$ExtraQryStr);
    }
    
    function getContent($ExtraQryStr,$start,$limit){
        return $this->_obj->selectMultiple('*',TBL_CONTENT,$ExtraQryStr,$start,$limit);
    }
    
    function updateContentByContentId($params,$cntId){
        $ExtraQryStr = "contentId='".addslashes($cntId)."'";
        return $this->_obj->updateQuery($params,TBL_CONTENT,$ExtraQryStr);
    }
    
    function existContent($ExtraQryStr){
        $needle = 'contentId';
        return $this->_obj->countRow($needle,TBL_CONTENT,$ExtraQryStr);
    }
    
    function newContent($params){
        return $this->_obj->insertQuery($params,TBL_CONTENT);
    }
    
    function deleteContent($cntId){
        $ExtraQryStr = "contentId=".addslashes($cntId);
        return $this->_obj->deleteRow(TBL_CONTENT,$ExtraQryStr);
    }
    
}