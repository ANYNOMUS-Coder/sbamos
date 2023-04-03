<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$pgObj = new adminPage;

//Unlink the images

//Unlink the images
$pageIds  = getChildIdsByParentPageId(array(),$pgObj,$deleteid);
$alertMsg   = array();
foreach($pageIds as $pgv){
    $delete = $pgObj -> deletePage($pgv);
    if($delete){
        $data = $generalObj -> getImageByTableAndLinkId(1,$pgv,TBL_PAGE, 0, 999);
        foreach($data as $v){
            if(file_exists($MEDIA_FILES_ROOT.'/page/normal/'.$v['path']) && $v['path']){
                unlink($MEDIA_FILES_ROOT.'/page/normal/'.$v['path']);   
                unlink($MEDIA_FILES_ROOT.'/page/thumb/'.$v['path']);   
                unlink($MEDIA_FILES_ROOT.'/page/croped/'.$v['path']);   
            }
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
