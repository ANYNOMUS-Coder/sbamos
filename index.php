<?php
define("RUNNING_SCRIPT", true);
include ('config.php');

//Generating CSRF Token
if($REQUEST_METHOD==='GET') {
    $_SESSION['CSRF_TOKEN'] = bin2hex(random_bytes(32));
}
$CSRF_TOKEN = $_SESSION['CSRF_TOKEN'];
//Generating CSRF Token

$redirectString = base64_encode($CURRENT_URL);
$redirectToBack = base64_decode($_GET['redirect']);

$pageTypeArr = explode('/',$pageType);
$pageType= $pageTypeArr[0];

$breadcrumb = '<ol class="breadcrumb breadcrumb-style2 mb-0">';
$breadcrumb .= ($pageType) ? '<li class="breadcrumb-item">
                    <a href="'.$SITE_LOC_PATH.'/'.$pageType.'/">'.$pageType.'</a>
                </li>' : '';
$breadcrumb .= ($dtls) ? '<li class="breadcrumb-item">
                            <a href="'.$SITE_LOC_PATH.'/'.$pageType.'/'.$dtls.'/">'.$dtls.'</a>
                        </li>' : '';
$breadcrumb .= ($dtaction) ? '<li class="breadcrumb-item active">'.strtoupper($dtaction).'</li>' : '';
$breadcrumb .= '</ol>';

//For all Class Function Include
$modulesClass = $generalObj -> getModuleIdentityForClass("parentModuleId='0'",0,999);
foreach($modulesClass as $cmv){
    if(file_exists($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/class/included_class.php'))
        include ($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/class/included_class.php');
    if(file_exists($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/function/included_function.php'))
        include ($ROOT_PATH.'/modules/'.$cmv['nameForDeveloper'].'/function/included_function.php');
}
//For all Class Function Include

// Fetch all page module details
if($pageType) {
    $pageModuleData = ($dtaction && $generalObj -> getModuleByPageType($dtaction)) ? $generalObj -> getModuleByPageType($dtaction) : $generalObj -> getModuleByPageType($pageType); 
    //$pageModuleData = $generalObj -> getModuleByPageType($pageType); 
    $pageId = $pageModuleData['pageId'];
    $pageNm = $pageModuleData['pageName'];
    $pageTl = $pageModuleData['subPageName'];
    $pageIg = $pageModuleData['image'];
    $pageMl = $pageModuleData['moduleId'];
    $pagePr = $pageModuleData['permalink'];
    $pageCp = $pageModuleData['pageCaption'];
    $pageBc = explode(',',$pageModuleData['bottomContent']);
    $pageSc = explode(',',$pageModuleData['sideContent']);
}
// Fetch all page module details

if(!in_array($pageType,$excludePageTypeArr) && !in_array($dtls,$excludeDtlsArr)) {
    //header('Location:'.$SITE_LOC_PATH.'/dashboard/');
    include ($ROOT_PATH.'/templates/inc/header.php');
}
else 
	include ($ROOT_PATH.'/templates/inc/header.php');

if($pageType){
    if($pageModuleData){
        if(file_exists($ROOT_PATH.'/modules/'.$pageModuleData['nameForDeveloper'].'/view/action.php'))
            include ($ROOT_PATH.'/modules/'.$pageModuleData['nameForDeveloper'].'/view/action.php'); 
        if(file_exists($ROOT_PATH.'/modules/'.$pageModuleData['nameForDeveloper'].'/view/index.php'))
            include ($ROOT_PATH.'/modules/'.$pageModuleData['nameForDeveloper'].'/view/index.php');
    }    
    else
        $generalObj -> redirectToUrl($SITE_LOC_PATH.'/404/');
}
else
    include ($ROOT_PATH.'/modules/sitehome/view/index.php');

if(!in_array($pageType,$excludePageTypeArr) && !in_array($dtls,$excludeDtlsArr)) {
    include ($ROOT_PATH.'/templates/inc/footer.php');
}
else
	include ($ROOT_PATH.'/templates/inc/footer.php');