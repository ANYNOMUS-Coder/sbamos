<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class viewPage{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getPageById($pageId){
        $ExtraQryStr = "pageId='".addslashes($pageId)."' AND status='Y'";
        return $this->_obj->selectSingle('*',TBL_PAGE,$ExtraQryStr);
    } 
    function getPageByExtraQryStr($ExtraQryStr){
        return $this->_obj->selectSingle('*',TBL_PAGE,$ExtraQryStr.' AND status="Y"');
    } 
    function getPage($ExtraQryStr,$start,$limit){
        return $this->_obj->selectMultiple('*',TBL_PAGE,$ExtraQryStr,$start,$limit);
    }
    function existPage($ExtraQryStr){
        $needle = 'pageId';
        return $this->_obj->countRow($needle,TBL_PAGE,$ExtraQryStr);
    }
}
?>