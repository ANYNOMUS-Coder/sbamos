<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class adminSmtpConfiguration{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getSmtpConfiguration($ExtraQryStr,$start,$limit){
        $ExtraQryStr = $ExtraQryStr.' ORDER BY entryDate desc';
        return $this->_obj->selectMultiple('*',TBL_SMTP,$ExtraQryStr,$start,$limit);
    }
    
    function newSmtpConfiguration($params){
        return $this->_obj->insertQuery($params,TBL_SMTP);
    }
    
    function existSmtpConfiguration($ExtraQryStr){
        $needle = 'smtpId';
        return $this->_obj->countRow($needle,TBL_SMTP,$ExtraQryStr);
    }
    
    function getSmtpConfigurationBysmtpId($smtpId){
        $ExtraQryStr = "smtpId='".addslashes($smtpId)."'";
        return $this->_obj->selectSingle('*',TBL_SMTP,$ExtraQryStr);
    }
    
    function updateSmtpConfigurationBysmtpId($params,$smtpId){
        $ExtraQryStr = "smtpId='".addslashes($smtpId)."'";
        return $this->_obj->updateQuery($params,TBL_SMTP,$ExtraQryStr);
    }
    
    function updateSmtpConfiguration($params,$ExtraQryStr){
        return $this->_obj->updateQuery($params,TBL_SMTP,$ExtraQryStr);
    }
    
    function deleteSmtpConfiguration($smtpId){
        $ExtraQryStr = "smtpId=".addslashes($smtpId);
        return $this->_obj->deleteRow(TBL_SMTP,$ExtraQryStr);
    }
}
?>