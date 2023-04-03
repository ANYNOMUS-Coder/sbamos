<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

function getChildIdsByParentPageId($returnArr,$obj,$pageId){
    $returnArr[] = $pageId;
    $ExtraQryStr = "parentId=".addslashes($pageId);
    $childPage = $obj -> getPage($ExtraQryStr,0,999);
    foreach($childPage as $cv){
        $returnArr[] = $cv['pageId'];
        getChildIdsByParentPageId($returnArr,$obj,$cv['pageId']);
    }
    return $returnArr;
}

function getHigherchicalPageArray($returnArr,$obj, $parrentPage=0){
  
}    
?>