<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$contentObj = new adminContent;

$contentIds  = getChildIdsByParentContentId(array(),$contentObj,$deleteid);

$alertMsg    = array();
foreach($contentIds as $cdv){
    $data   = $contentObj -> getContentById($cdv);
    $delete = $contentObj -> deleteContent($cdv);
    if($delete){
        if(file_exists($MEDIA_FILES_ROOT.'/content/thumb/'.$data['contentImage']) && $data['contentImage']){
            unlink($MEDIA_FILES_ROOT.'/content/normal/'.$data['contentImage']);   
            unlink($MEDIA_FILES_ROOT.'/content/thumb/'.$data['contentImage']);   
            unlink($MEDIA_FILES_ROOT.'/content/large/'.$data['contentImage']);   
        }
    }
    $alertMsg[] = ($delete) ? alert('SUCCESS','Page has been deleted successfully') : alert('ERROR','Network Error!');
    
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
