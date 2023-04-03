<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class adminEmailTemplates{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getEmailTemplates($ExtraQryStr,$start,$limit){
        $ExtraQryStr = $ExtraQryStr.' ORDER BY entryDate desc';
        return $this->_obj->selectMultiple('*',TBL_EMAIL_TEMPLATES,$ExtraQryStr,$start,$limit);
    }
    
    function newEmailTemplates($params){
        return $this->_obj->insertQuery($params,TBL_EMAIL_TEMPLATES);
    }
    
    function existEmailTemplates($ExtraQryStr){
        $needle = 'emailtemplatesId';
        return $this->_obj->countRow($needle,TBL_EMAIL_TEMPLATES,$ExtraQryStr);
    }
    
    function getEmailTemplatesByemailtemplatesId($emailtemplatesId){
        $ExtraQryStr = "emailtemplatesId='".addslashes($emailtemplatesId)."'";
        return $this->_obj->selectSingle('*',TBL_EMAIL_TEMPLATES,$ExtraQryStr);
    }
    
    function updateEmailTemplatesByemailtemplatesId($params,$emailtemplatesId){
        $ExtraQryStr = "emailtemplatesId='".addslashes($emailtemplatesId)."'";
        return $this->_obj->updateQuery($params,TBL_EMAIL_TEMPLATES,$ExtraQryStr);
    }
    
    function deleteEmailTemplates($emailtemplatesId){
        $ExtraQryStr = "emailtemplatesId=".addslashes($emailtemplatesId);
        return $this->_obj->deleteRow(TBL_EMAIL_TEMPLATES,$ExtraQryStr);
    }
}
?>