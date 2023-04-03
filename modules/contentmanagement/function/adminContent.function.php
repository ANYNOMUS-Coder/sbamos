<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
    
function getChildIdsByParentContentId($returnArr,$obj,$contentId){
    $returnArr[] = $contentId;
    $ExtraQryStr = "parentId=".addslashes($contentId);
    $childContent = $obj -> getContent($ExtraQryStr,0,999);
    foreach($childContent as $cv){
        $returnArr[] = $cv['contentId'];
        getChildIdsByParentContentId($returnArr,$obj,$cv['contentId']);
    }
    return ($returnArr);
}
?>