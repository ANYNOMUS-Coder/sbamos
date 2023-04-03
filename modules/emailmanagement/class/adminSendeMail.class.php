<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class adminSendeMail{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getSendeMail($ExtraQryStr,$start,$limit){
        $ExtraQryStr = $ExtraQryStr.' ORDER BY entryDate desc';
        return $this->_obj->selectMultiple('*',TBL_SEND_EMAIL,$ExtraQryStr,$start,$limit);
    }
    
    function newSendeMail($params){
        return $this->_obj->insertQuery($params,TBL_SEND_EMAIL);
    }
    
    function existSendeMail($ExtraQryStr){
        $needle = 'sendEmailId';
        return $this->_obj->countRow($needle,TBL_SEND_EMAIL,$ExtraQryStr);
    }
    
    function getSendeMailBysendEmailId($sendEmailId){
        $ExtraQryStr = "sendEmailId='".addslashes($sendEmailId)."'";
        return $this->_obj->selectSingle('*',TBL_SEND_EMAIL,$ExtraQryStr);
    }
    
    function updateSendeMailBysendEmailId($params,$sendEmailId){
        $ExtraQryStr = "sendEmailId='".addslashes($sendEmailId)."'";
        return $this->_obj->updateQuery($params,TBL_SEND_EMAIL,$ExtraQryStr);
    }
    
    function deleteSendeMail($sendEmailId){
        $ExtraQryStr = "sendEmailId=".addslashes($sendEmailId);
        return $this->_obj->deleteRow(TBL_SEND_EMAIL,$ExtraQryStr);
    }
}
?>