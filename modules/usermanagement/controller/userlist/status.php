<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

if($_SESSION['ADMIN_USERID']!=$chngid) {
    $obj                = new adminUser;
    $childUser  = getChildIdsByParentUserId([],$obj,$deleteid);

    if(in_array($chngid,$childUser)) {
        $params             = array();
        $params['status']   = $strchngto;
        $update             = $obj -> updateUserByUserId($params,$chngid);
        $alertMsg = ($update) ? alert('SUCCESS','Status has been updated successfully') : alert('ERROR','Network Error!');
    }
    else
        $alertMsg = alert('ERROR','You can only update sub user status!');
}
else
    $alertMsg = alert('ERROR','You cant update own status!');

echo '
<div class="row">
    <div class="col-lg-12">
        '.$alertMsg.'
        <div class="panel panel-default">
            <div class="panel-footer">
                <a class="btn btn-primary" href="'.$redirectToBack.'">Précédent</a>
                <a class="btn btn-primary" href="'.$SITE_LOC_PATH.'/admin/">Exit</a>
            </div>
        </div>
    </div>
</div>
';