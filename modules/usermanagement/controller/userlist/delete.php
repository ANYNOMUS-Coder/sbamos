<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$alertMsg   = array();
if($_SESSION['ADMIN_USERID']!=$deleteid) {
    $obj        = new adminUser;
    $returnArr  = [$deleteid];
    $childUser  = getChildIdsByParentUserId($returnArr,$obj,$deleteid);
    
    foreach($childUser as $miv){
        $user = $obj -> getUserByUserId($miv,'userId, userImage');

        if($user) {
            //Unlink image
            foreach ($imgInfoArr['userImage'] as $key => $value) {
                if( $user['userImage'] && file_exists($MEDIA_FILES_ROOT.'/user/'.$key.'/'.$user['userImage']) )
                    unlink($MEDIA_FILES_ROOT.'/user/'.$key.'/'.$user['userImage']);
            }

            $delete = $obj -> deleteUser($miv);
            $alertMsg[] = ($delete) ? alert('SUCCESS','User has been deleted successfully') : alert('ERROR','Network Error!');
        }
    }
}
else
    $alertMsg[] = alert('ERROR','You cant delete own profile!');

echo '
<div class="row">
    <div class="col-lg-12">
        '.implode('',$alertMsg).'
        <div class="panel panel-default">
            <div class="panel-footer">
                <a class="btn btn-primary" href="'.$redirectToBack.'">Précédent</a>
                <a class="btn btn-primary" href="'.$SITE_LOC_PATH.'/admin/">Exit</a>
            </div>
        </div>
    </div>
</div>
';