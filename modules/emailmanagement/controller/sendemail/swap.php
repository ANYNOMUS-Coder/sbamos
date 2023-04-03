<?php
if($_POST['SourceForm']=='changeSwap'){
    
    include ('../../../../ext_include.php');
    
    $verify = $generalObj -> verifyTokenByUserId($_SESSION['ADMIN_TOKEN'],$_SESSION['ADMIN_USERID']);

    if($verify && $verify['sessionId']==session_id() && $_SESSION['ADMIN_TOKEN'] && $_SESSION['ADMIN_USERID']){
        
    }
    else die('Sorry! No Hacking Allowed!');
    
    $obj = new adminSendeMail;

    foreach($order as $ok=>$ov){
        $params             = array();
        $params['swapNo']   =($ok+1);
        $update = $obj -> updateSendeMailBysendEmailId($params,$ov);
    }
}
?>
