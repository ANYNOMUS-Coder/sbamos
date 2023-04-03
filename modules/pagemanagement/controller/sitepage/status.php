<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$pgObj              = new adminPage;
$params             = array();

if($dtcontent=='top')
    $params['isTop']    = $strchngto;
elseif($dtcontent=='footer')
    $params['isFooter'] = $strchngto;
elseif($dtcontent=='side')
    $params['isSide'] = $strchngto;
else    
    $params['status']   = $strchngto;

$update   = $pgObj -> updatePageByPageId($params,$chngid);
$alertMsg = ($update) ? alert('SUCCESS','Status has been updated successfully') : alert('ERROR','Network Error!') ;

$generalObj -> redirectToUrl($redirectToBack);
?>
<div class="row">
    <div class="col-lg-12">
        <?php echo $alertMsg;?>
        <div class="panel panel-default">
            <div class="panel-footer">
                <button type="reset" class="btn btn-primary"  onclick="window.location.href='<?php echo $redirectToBack;?>'">Back</button>
                <button type="reset" class="btn btn-primary" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/';?>';">Exit</button>
            </div>
        </div>
    </div>
</div>
