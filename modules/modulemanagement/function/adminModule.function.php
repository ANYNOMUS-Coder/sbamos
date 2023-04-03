<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
function getChildIdsByParentModuleId(&$returnArr,$obj,$moduleId){
    $ExtraQryStr = "parentModuleId=".addslashes($moduleId);
    $childModule = $obj -> getModules($ExtraQryStr,0,999);
    foreach($childModule as $cv){
        $returnArr[] = $cv['moduleId'];
        getChildIdsByParentModuleId($returnArr,$obj,$cv['moduleId']);
    }
    return $returnArr;
}
?>
