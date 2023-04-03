<?php
if($_POST['ajax']==1){
    include ('../../ext_include.php');
    $generalObj = new general;
    $verify = $generalObj -> verifyTokenByUserId($_SESSION['FRONTEND_TOKEN'],$_SESSION['FRONTEND_USERID']);
}
if($verify && $verify['sessionId']==session_id() && $_SESSION['FRONTEND_TOKEN'] && $_SESSION['FRONTEND_USERID']){
    $_SESSION['captche'] = randomString(6);
    create_captcha_image($ROOT_PATH,$_SESSION['captche'],'75','35');
    if($ajax==1)
        echo $SITE_LOC_PATH."/lib/captche/captche.png";
    else
        print "<img src=".$SITE_LOC_PATH."/lib/captche/captche.png?".date("YmdHsi").">";
}   
?>    