<?php
include ('../../../../ext_include.php');
if($_SESSION['ADMIN_TOKEN'] && $_SESSION['ADMIN_USERID']){
    $generalObj = new general;
    $verify = $generalObj -> verifyTokenByUserId($_SESSION['ADMIN_TOKEN'],$_SESSION['ADMIN_USERID']);
}
else 
	die('Not allowed!');

if($verify && $verify['sessionId']==session_id() && $_SESSION['ADMIN_TOKEN'] && $_SESSION['ADMIN_USERID']){
	if($_POST['SourceForm']=='createPermalink'){
	    
	    $returnArray = array();
	    $permalink = createPermalink($input,TBL_PAGE,'pageId','1');
	    $returnArray['permalink']=$permalink;  
	    echo json_encode($returnArray);
	}
}
else 
	die('Not allowed!');
?>
