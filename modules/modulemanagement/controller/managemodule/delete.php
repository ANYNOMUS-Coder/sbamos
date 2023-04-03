<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$mdlObj     = new adminModules;
$returnArr = array($deleteid);
$moduleIds  = getChildIdsByParentModuleId($returnArr,$mdlObj,$deleteid);
$alertMsg   = array();
foreach($moduleIds as $mik=>$miv){
    
    // Delete Permission
    $superAdmin             = $generalObj -> getSuperAdmin();
    $superAdminPermArr      = explode(',',$superAdmin['permission']);

    if(in_array($miv,$superAdminPermArr))
        $superAdminPermArr    = array_diff($superAdminPermArr,array($miv));

    $params                 = array();
    $params['permission']   = implode(',',$superAdminPermArr);

    $generalObj -> updateUserById($params,'1');
    // Delete Permission
    
    $delete = $mdlObj -> deleteModule($miv);
    $alertMsg[] = ($delete) ? alert('SUCCESS','Module has been deleted successfully') : alert('ERROR','Network Error!');
    
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
