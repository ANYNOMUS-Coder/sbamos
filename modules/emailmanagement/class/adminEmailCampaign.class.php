<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class adminEmailCampaign{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getEmailCampaign($ExtraQryStr,$start,$limit,$fetchField='*'){
        $ExtraQryStr = $ExtraQryStr.' ORDER BY entryDate desc';
        return $this->_obj->selectMultiple($fetchField,TBL_EMAIL_CMPN,$ExtraQryStr,$start,$limit);
    }
    
    function newEmailCampaign($params){
        return $this->_obj->insertQuery($params,TBL_EMAIL_CMPN);
    }
    
    function existEmailCampaign($ExtraQryStr){
        $needle = 'campaignId';
        return $this->_obj->countRow($needle,TBL_EMAIL_CMPN,$ExtraQryStr);
    }
    
    function getEmailCampaignBycampaignId($campaignId,$fetchField='*'){
        $ExtraQryStr = "campaignId='".addslashes($campaignId)."'";
        return $this->_obj->selectSingle($fetchField,TBL_EMAIL_CMPN,$ExtraQryStr);
    }
    
    function updateEmailCampaignBycampaignId($params,$campaignId){
        $ExtraQryStr = "campaignId='".addslashes($campaignId)."'";
        return $this->_obj->updateQuery($params,TBL_EMAIL_CMPN,$ExtraQryStr);
    }
    
    function deleteEmailCampaign($campaignId){
        $ExtraQryStr = "campaignId=".addslashes($campaignId);
        return $this->_obj->deleteRow(TBL_EMAIL_CMPN,$ExtraQryStr);
    }
}
?>