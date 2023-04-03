<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$contentObj = new adminContent;

$contentIds  = getChildIdsByParentContentId(array(),$contentObj,$chngid);

$alertMsg    = array();
foreach($contentIds as $cdv){
    $params             = array();
    $params['status']   = $strchngto;
    $changeStatus       = $contentObj -> updateContentByContentId($params,$cdv);
    $alertMsg[] = ($changeStatus) ? alert('SUCCESS','Page status has been changed successfully') : alert('ERROR','Network Error!');
}

?>
<div class="row">
    <div class="col-lg-12">
        <?php foreach($alertMsg as $amv){echo $amv;}?>
        <div class="panel panel-default">
            <div class="panel-footer">
                <button type="reset" class="btn btn-primary"  onclick="window.location.href='<?php echo $redirectToBack;?>'">Back</button>
                <button type="reset" class="btn btn-primary" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/';?>';">Exit</button>
            </div>
        </div>
    </div>
</div>
