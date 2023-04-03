<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
class general{
    
    private $_obj;
    private $_result;
    private $_data;
    
    function __construct(){
        $this->_obj = siteClass::getInstance();
    }
    
    function getUserByUsernameAndPassword($username,$password,$ExtraQryStr){
        $ExtraQryStr = "username='".addslashes($username)."' and password='".md5(addslashes($password))."' and $ExtraQryStr and status='Y'";
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
        $ExtraQryStr = "status='Y' and ".$ExtraQryStr." order by swapNo";
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
        return $this->_obj->selectMultiple('nameForDeveloper',TBL_MODULE,$ExtraQryStr,$start,$limit);
    }
    
    function getUserPermission($userId){
        $ExtraQryStr = "userId='".addslashes($userId)."' and status='Y'";
        return $this->_obj->selectSingle('permission',TBL_USER,$ExtraQryStr);
    }
    
    function getModuleNameByDeveloperName($nameForDeveloper){
        $ExtraQryStr = "nameForDeveloper='".addslashes($nameForDeveloper)."' and status='Y'";
        return $this->_obj->selectSingle('moduleId,nameForDeveloper,moduleName,instruction,moduleIcon',TBL_MODULE,$ExtraQryStr);
    }
    
    function getSuperAdmin(){
        $ExtraQryStr = "userId='1' and userType='S'";
        return $this->_obj->selectSingle('*',TBL_USER,$ExtraQryStr);
    }
    
    function updateUserById($params,$userId){
        $ExtraQryStr = "userId='".addslashes($userId)."' and userType='S'";
        return $this->_obj->updateQuery($params,TBL_USER,$ExtraQryStr);
    }
    
    function countImageInfo($linkId,$table){
        $needle = 'imgId';
        $ExtraQryStr = "linkId ='".addslashes($linkId)."' and linkTable='".addslashes($table)."'";
        return $this->_obj->countRow($needle,TBL_IMAGE,$ExtraQryStr);
    }
    
    function countRow($needle,$table,$ExtraQryStr){
        return $this->_obj->countRow($needle,$table,$ExtraQryStr);
    }
    
    function newImage($params){
        return $this->_obj->insertQuery($params,TBL_IMAGE);
    }
    
    function getImageByTableAndLinkId($ExtraQryStr,$linkId,$linkTable, $start, $limit){
        $ExtraQryStr = $ExtraQryStr." and linkId = '".addslashes($linkId)."' and linkTable = '".addslashes($linkTable)."'";
        return $this->_obj->selectMultiple('*',TBL_IMAGE,$ExtraQryStr,$start,$limit);
    }
    
    function getImageById($imgId){
        $ExtraQryStr = "imgId='".addslashes($imgId)."'";
        return $this->_obj->selectSingle('*',TBL_IMAGE,$ExtraQryStr);
    }
    
    function updateImageByimgId($params,$imgId){
        $ExtraQryStr = "imgId=".addslashes($imgId);
        return $this->_obj->updateQuery($params,TBL_IMAGE,$ExtraQryStr);
    }

    function getModuleByPageType($pageType){
        //$ExtraQryStr = "tp.permalink='".addslashes($pageType)."' and tp.status='Y' and tp.moduleId = tm.moduleId";
        $ExtraQryStr = "tp.permalink='".addslashes($pageType)."' and tp.moduleId = tm.moduleId";
        return $this->_obj->selectSingle('tm.*,tp.*',TBL_PAGE.' tp,'.TBL_MODULE.' tm',$ExtraQryStr);
    }
    
    function getSiteData($fetchField='*'){
        $ExtraQryStr = "siteId=1";
        return $this->_obj->selectSingle($fetchField,TBL_SITE,$ExtraQryStr);
    }

    function updateSiteBysiteId($params,$siteId){
        $ExtraQryStr = "siteId=1";
        return $this->_obj->updateQuery($params,TBL_SITE,$ExtraQryStr);
    }
    
    function getSMTPconfiguration(){
        $ExtraQryStr = "isActivated='Y' and status='Y'";
        return $this->_obj->selectSingle('*',TBL_SMTP,$ExtraQryStr);
    }
    
    function validateEmail($email){
        return true;
    }
    
    function redirectToUrl($url){
        //header('Location:'.$url);
        ?>
        <script type="text/javascript">
            window.location.href="<?php echo $url?>";
        </script>
        <?php
    }
}
?>