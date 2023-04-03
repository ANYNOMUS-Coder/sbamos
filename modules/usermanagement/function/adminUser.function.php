<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

function getChildIdsByParentUserId_NEW(&$returnArr,$obj,$userId){
    $ExtraQryStr = "parentUserId=".addslashes($userId);
    $childUser = $obj -> getUser($ExtraQryStr,0,999);
    foreach($childUser as $uv){
        $returnArr[] = $uv['userId'];
        getChildIdsByParentUserId($returnArr,$obj,$uv['userId']);
    }
    return $returnArr;
}
?>
