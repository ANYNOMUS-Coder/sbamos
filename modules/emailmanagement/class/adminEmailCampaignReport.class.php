<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class adminEmilCampaignReport{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getEmilCampaignReport($ExtraQryStr,$start,$limit){
        $ExtraQryStr = $ExtraQryStr.' ORDER BY entryDate desc';
        return $this->_obj->selectMultiple('*',TBL_EMAIL_CMPN_RPT,$ExtraQryStr,$start,$limit);
    }
    
    function newEmilCampaignReport($params){
        return $this->_obj->insertQuery($params,TBL_EMAIL_CMPN_RPT);
    }
    
    function existEmilCampaignReport($ExtraQryStr){
        $needle = 'reportId';
        return $this->_obj->countRow($needle,TBL_EMAIL_CMPN_RPT,$ExtraQryStr);
    }
    
    function getEmilCampaignReportByreportId($reportId){
        $ExtraQryStr = "reportId='".addslashes($reportId)."'";
        return $this->_obj->selectSingle('*',TBL_EMAIL_CMPN_RPT,$ExtraQryStr);
    }
    
    function updateEmilCampaignReportByreportId($params,$reportId){
        $ExtraQryStr = "reportId='".addslashes($reportId)."'";
        return $this->_obj->updateQuery($params,TBL_EMAIL_CMPN_RPT,$ExtraQryStr);
    }
    
    function deleteEmilCampaignReport($reportId){
        $ExtraQryStr = "reportId=".addslashes($reportId);
        return $this->_obj->deleteRow(TBL_EMAIL_CMPN_RPT,$ExtraQryStr);
    }
}
?>