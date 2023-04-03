<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

class adminAccount{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getAccountByAccountId($siteId){
        $ExtraQryStr = "siteId='".addslashes($siteId)."'";
        return $this->_obj->selectSingle('*',TBL_SITE,$ExtraQryStr);
    }
    
    function updateAccountByAccountId($params,$siteId){
        $ExtraQryStr = "siteId='".addslashes($siteId)."'";
        return $this->_obj->updateQuery($params,TBL_SITE,$ExtraQryStr);
    }
    /*function getModules($ExtraQryStr,$start,$limit){
        $this->_result = $this->_obj->selectMultiple('*',TBL_MODULE,$ExtraQryStr,$start,$limit);
        $this->_data = array();
        foreach($this->_result as $key=>$val){
                $this->_data[]=$val;
        }
        return $this->_data;
    }
    
    function newModule($params){
        return $this->_obj->insertQuery($params,TBL_MODULE);
    }
    
    function countModulesByParentModuleId($parentModuleId){
        $needle = 'moduleId';
        $ExtraQryStr = "parentModuleId=".addslashes($parentModuleId);
        return $this->_obj->countRow($needle,TBL_MODULE,$ExtraQryStr);
    }
    
    function existModule($ExtraQryStr){
        $needle = 'moduleId';
        return $this->_obj->countRow($needle,TBL_MODULE,$ExtraQryStr);
    }
    
    function getModuleBymoduleId($moduleId){
        $ExtraQryStr = "moduleId='".addslashes($moduleId)."'";
        return $this->_obj->selectSingle('*',TBL_MODULE,$ExtraQryStr);
    }
    
    function updateModuleBymoduleId($params,$moduleId){
        $ExtraQryStr = "moduleId='".addslashes($moduleId)."'";
        return $this->_obj->updateQuery($params,TBL_MODULE,$ExtraQryStr);
    }
    
    function deleteModule($moduleId){
        $ExtraQryStr = "moduleId=".addslashes($moduleId);
        return $this->_obj->deleteRow(TBL_MODULE,$ExtraQryStr);
    }
    
    function getUserByUsernameAndPassword($username,$password){
        $ExtraQryStr = "username='".addslashes($username)."' and password='".md5(addslashes($password))."' and status='Y'";
        return $this->_obj->selectSingle('*',TBL_USER,$ExtraQryStr);
    }
    
    function newLoginLog($params){
        return $this->_obj->insertQuery($params,TBL_LOGIN_LOG);
    }
    
    function verifyTokenByUserId($tokenNo,$userId){
        $ExtraQryStr = "tokenNo='".addslashes($tokenNo)."' and userId='".addslashes($userId)."'";
        return $this->_obj->selectSingle('*',TBL_LOGIN_LOG,$ExtraQryStr);
    }
    
    function updateLoginLogByLoginId($params,$loginId){
        $ExtraQryStr = "loginId=".addslashes($loginId);
        return $this->_obj->updateQuery($params,TBL_LOGIN_LOG,$ExtraQryStr);
    }
    
    function getModule($ExtraQryStr,$start,$limit,$permission){
        $ExtraQryStr = "status='Y' and ".$ExtraQryStr;
        $this->_result = $this->_obj->selectMultiple('*',TBL_MODULE,$ExtraQryStr,$start,$limit);
        $this->_data = array();
        foreach($this->_result as $key=>$val){
            if(in_array($val['moduleId'],$permission))
                $this->_data[]=$val;
        }
        return $this->_data;
    }
    
    function getModuleIdentityForClass($ExtraQryStr,$start,$limit){
        $ExtraQryStr = "status='Y' and ".$ExtraQryStr;
        $this->_result = $this->_obj->selectMultiple('nameForDeveloper',TBL_MODULE,$ExtraQryStr,$start,$limit);
        $this->_data = array();
        foreach($this->_result as $key=>$val){
                $this->_data[]=$val;
        }
        return $this->_data;
    }
    
    function getUserPermission($userId){
        $ExtraQryStr = "userId='".addslashes($userId)."' and status='Y'";
        return $this->_obj->selectSingle('permission',TBL_USER,$ExtraQryStr);
    }
    
    function getModuleNameByDeveloperName($nameForDeveloper){
        $ExtraQryStr = "nameForDeveloper='".addslashes($nameForDeveloper)."' and status='Y'";
        return $this->_obj->selectSingle('moduleId,nameForDeveloper,moduleName',TBL_MODULE,$ExtraQryStr);
    }*/
}
?>