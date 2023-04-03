<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class viewSmtpConfiguration{
    
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
        return $this->_obj->countRow($needle,TBL_SMTP,$ExtraQryStr.' AND status = "Y"');
    }
    
    function getSmtpConfigurationBysmtpId($smtpId){
        $ExtraQryStr = "smtpId='".addslashes($smtpId)."' AND status = 'Y'";
        return $this->_obj->selectSingle('*',TBL_SMTP,$ExtraQryStr);
    }
}
?>