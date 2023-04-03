<?php
include ('../../../ext_include.php');

$pObj = new viewPage;
$pageData = $pObj -> getPageById($pageId);
if($pageData){
    $sideContent = explode(',',$pageData['sideContent']);
    foreach($sideContent as $scv){
        if(is_dir($STYLE_FILES_ROOT.'/adcontent/sidecontent/'.$scv))
            include ($STYLE_FILES_ROOT.'/adcontent/sidecontent/'.$scv.'/index.php');
        else
            include ($STYLE_FILES_ROOT.'/adcontent/sidecontent/'.$scv);
    }
}
?>