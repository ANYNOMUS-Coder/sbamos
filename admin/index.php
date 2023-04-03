<?php
define("RUNNING_SCRIPT", true);

include ('../config.php');

//Generating CSRF Token
if($REQUEST_METHOD==='GET') {
    $_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));
}
$CSRF_TOKEN = $_SESSION['CSRF_TOKEN'];
//Generating CSRF Token

$redirectString = $SITE_LOC_PATH.'/admin/?'.$QUERY_STRING_PATH;
$redirectToBack = base64_decode($redirect);

include ($ROOT_PATH.'/admin/templates/inc/header_script.php');

if($_SESSION['ADMIN_TOKEN'] && $_SESSION['ADMIN_USERID']){
    $generalObj = new general;
    $verify = $generalObj -> verifyTokenByUserId($_SESSION['ADMIN_TOKEN'],$_SESSION['ADMIN_USERID']);
}

if($verify && $verify['sessionId']==session_id() && $_SESSION['ADMIN_TOKEN'] && $_SESSION['ADMIN_USERID']) {
    
    if (isset($logout) && $logout=='true'){
        $params                 = array();
        $params['logoutTime']   = date('Y-m-d H:i:s');
        $logOutUpdate           = $generalObj -> updateLoginLogByLoginId($params,$verify['loginId']);
        if($logOutUpdate){
            session_destroy();
            session_regenerate_id();
            header('Location:'.$SITE_LOC_PATH.'/admin/');
        }
    }

    //Get User Permission
    $permission = $generalObj -> getUserPermission($_SESSION['ADMIN_USERID']);
    $allPermissionArr = objectToArray(json_decode($permission['permission']));
    $permission = (is_array($allPermissionArr) && sizeof($allPermissionArr)) ? array_column($allPermissionArr, 'id') : [];
    //Get User Permission

    if($pageType) $pageTypeModuleName = $generalObj -> getModuleNameByDeveloperName($pageType);
    if($dtls) $dtlsModuleName = $generalObj -> getModuleNameByDeveloperName($dtls);
    if($dtaction) $dtactionModuleName = $generalObj -> getModuleNameByDeveloperName($dtaction);

    //For all Class Function Include
    $modulesClass = $generalObj -> getModuleIdentityForClass("parentModuleId='0'",0,999);
    foreach($modulesClass as $cmv){
        if(file_exists($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/class/included_class.php'))
            include ($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/class/included_class.php');
        if(file_exists($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/function/included_function.php'))
            include ($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/function/included_function.php');
    }
    //For all Class Function Include
    
    include ($ROOT_PATH.'/admin/home.php');
}
else 
    include ($ROOT_PATH.'/modules/sitehome/controller/login/login.php');


include ($ROOT_PATH.'/admin/templates/inc/footer_script.php');