<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$obj     = new adminSendeMail;


$delete = $obj -> deleteSendeMail($deleteid);
$alertMsg = ($delete) ? alert('SUCCESS','SendeMail has been deleted successfully') : alert('ERROR','Network Error!');

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
