<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

if($_POST['ajax']==1){
    include ('../../../ext_include.php');
    $generalObj = new general;
    $verify = $generalObj -> verifyTokenByUserId($_SESSION['FRONTEND_TOKEN'],$_SESSION['FRONTEND_USERID']);
    $returnArr = array();
}
else{
    if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); 
}
$returnArr = array();
if($verify && $verify['sessionId']==session_id() && $_SESSION['FRONTEND_TOKEN'] && $_SESSION['FRONTEND_USERID']){
    

}
echo json_encode($returnArr);