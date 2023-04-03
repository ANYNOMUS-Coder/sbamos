<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class adminPage{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getPageById($pageId){
        $ExtraQryStr = "pageId='".addslashes($pageId)."'";
        return $this->_obj->selectSingle('*',TBL_PAGE,$ExtraQryStr);
    } 
    function getPage($ExtraQryStr,$start,$limit){
        return $this->_obj->selectMultiple('*',TBL_PAGE,$ExtraQryStr,$start,$limit);
    }
    function updatePageByPageId($params,$pageId){
        $ExtraQryStr = "pageId='".addslashes($pageId)."'";
        return $this->_obj->updateQuery($params,TBL_PAGE,$ExtraQryStr);
    }
    function existPage($ExtraQryStr){
        $needle = 'pageId';
        return $this->_obj->countRow($needle,TBL_PAGE,$ExtraQryStr);
    }
    function newPage($params){
        return $this->_obj->insertQuery($params,TBL_PAGE);
    }
    function deletePage($pageId){
        $ExtraQryStr = "pageId=".addslashes($pageId);
        return $this->_obj->deleteRow(TBL_PAGE,$ExtraQryStr);
    }
}
?>