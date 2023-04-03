<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$obj = new adminModules;
if($editid){
    $arrData            = $obj -> getModuleBymoduleId($editid);
    if($arrData){
        foreach($arrData as $key=>$value){
            $$key = $value;
        }
    }
}
else
    $parentModuleId = ($_POST) ? $parentModuleId : $parent;


$ExtraQryStr = 'parentModuleId=0';
$allMdlData = $obj -> getModules($ExtraQryStr,0,999);

$mdlStr = ($parentModuleId==0) ? '<option selected value="0">Mother Module</option>' : '<option value="0">Mother Module</option>';
foreach($allMdlData as $mdv){
    $sltdCls = ($parentModuleId==$mdv['moduleId']) ? 'selected' : '';
    $mdlStr .= '<option '.$sltdCls.' value="'.$mdv['moduleId'].'">'.$mdv['moduleName'].'</option>';
}

echo '
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form elements</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample" action="" method="post">
                    '.$alertMsg.'
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Parent Module *</label>
                                <select name="parentModuleId" class="form-control">
                                    '.$mdlStr.'
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Instruction</label>
                                <textarea name="instruction" class="form-control txtareahght" rows="5" placeholder="Type module instructions here">'.$instruction.'</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Module Name *</label>
                                <input class="form-control" name="moduleName" value="'.$moduleName.'" placeholder="Type module name here">
                            </div>
                            <div class="form-group">
                                <label>File Name *</label>
                                <input class="form-control" name="nameForDeveloper" value="'.$nameForDeveloper.'" placeholder="Type file name here">
                            </div>
                            <div class="form-group">
                                <label>Module Icon</label>
                                <input class="form-control" name="moduleIcon" value="'.$moduleIcon.'" placeholder="Type fontawesome icon here">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="csrfToken" value="'.formToken('addEditModule', $CSRF_TOKEN).'"/>
                    <input type="hidden" name="editid" value="'.$moduleId.'" />
                    <input type="hidden" name="SourceForm" value="addEditModule">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <button type="reset" class="btn btn-info">Reset</button>
                    <a class="btn btn-light" href="'.$redirectToBack.'">Précédent</a>
                    <a class="btn btn-light ms-1" href="'.$SITE_LOC_PATH.'/admin/">Exit</a>
                    
                </form>
            </div>
        </div>
    </div>
</div>
';