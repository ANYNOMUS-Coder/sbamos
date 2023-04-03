<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$mdlObj         = new adminModules;
$userObj        = new adminUser;
$ExtraQryStr    = 'parentModuleId=0';
$allMdlData     = $mdlObj -> getModules($ExtraQryStr,0,999);

$userArr    = $userObj -> getUserByUserId($editid,'username,email,name,permission');
$prmsnArr   = objectToArray(json_decode($userArr['permission']));
$userPrmsn  = (is_array($prmsnArr) && sizeof($prmsnArr)) ? array_column($prmsnArr, 'id') : [];

$actionArr = ['ADD','EDIT','STATUS','TRASH','REMOVE'];

echo '
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">User: '.$userArr['username'].' ('.$userArr['email'].')</h4>
                <p class="card-description">
                    Update user permission according to role
                </p>
                <form class="forms-sample" action="" method="post">
                    '.$alertMsg.'

                    <div class="mb-3">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                        <button type="reset" class="btn btn-info">Reset</button>
                        <a class="btn btn-light" href="'.$redirectToBack.'">Précédent</a>
                        <a class="btn btn-light" href="'.$SITE_LOC_PATH.'/admin/">Exit</a>
                    </div>

                    <div class="table-responsive mb-4">
                        <table class="table table-bordered table-sm table-permission">
                            <thead>
                                <tr>
                                    <th>Module</th>
                                    <th>Sub Module</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            ';
                            
                            foreach($allMdlData as $mv){
                                $ExtraQryStr    = 'parentModuleId='.$mv['moduleId'];
                                
                                if(in_array($mv['moduleId'],$permission)){
                                    $checked = (in_array($mv['moduleId'],$userPrmsn)) ? 'checked' : '';

                                    $subMdlData         = $mdlObj -> getModules($ExtraQryStr,0,999);
                                    $allSubMdlIds       = array_column($subMdlData,'moduleId');

                                    $permittedSubmdl    = array_diff($allSubMdlIds,array_diff($allSubMdlIds,$permission));

                                    $mdlc = 1;
                                    foreach($subMdlData as $smv){ 
                                        if(in_array($smv['moduleId'],$permission)){ 
                                            $checkedSub = (in_array($smv['moduleId'],$userPrmsn)) ? 'checked' : '';

                                            $actc = 1;
                                            foreach ($actionArr as $actv) {
                                                $searchedKey = array_search($smv['moduleId'],$userPrmsn);
                                                $checkedActn = (is_array($prmsnArr[$searchedKey]['action']) && in_array($actv,$prmsnArr[$searchedKey]['action'])) ? 'checked' : '';
                                                echo '
                                                <tr fsdfsd="'.$mdlc.'">
                                                ';
                                                if($mdlc==1) {
                                                    echo '
                                                    <td rowspan="'.(sizeof($permittedSubmdl)*sizeof($actionArr)).'">
                                                        <div class="form-check form-check-flat form-check-dark">
                                                            <label class="form-check-label">
                                                                <input '.$checked.' type="checkbox" class="form-check-input" name="moduleIds[id][]" value="'.$mv['moduleId'].'">
                                                                '.$mv['moduleName'].'
                                                            </label>
                                                        </div>
                                                    </td>
                                                    ';
                                                }
                                                
                                                if($actc==1) {
                                                    echo '
                                                    <td rowspan="'.sizeof($actionArr).'">
                                                        <div class="form-check form-check-flat form-check-primary">
                                                            <label class="form-check-label">
                                                                <input '.$checkedSub.' type="checkbox" class="form-check-input" name="moduleIds[id][]" value="'.$smv['moduleId'].'">
                                                                '.$smv['moduleName'].'
                                                            </label>
                                                        </div>
                                                    </td>
                                                    ';
                                                }
                                                echo '
                                                    <td>
                                                        <div class="form-check form-check-flat form-check-info">
                                                            <label class="form-check-label">
                                                                <input '.$checkedActn.' type="checkbox" class="form-check-input" name="moduleIds['.$smv['moduleId'].'][action][]" value="'.$actv.'">
                                                                '.$actv.'
                                                            </label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                ';
                                                $actc += 1;
                                                $mdlc += 1;
                                            }
                                            
                                        }
                                    }
                                    
                                }
                            }

                            echo '
                            </tbody>
                        </table>
                    </div>
                    <input type="hidden" name="csrfToken" value="'.formToken('addEditPermission', $CSRF_TOKEN).'"/>
                    <input type="hidden" name="editid" value="'.$editid.'" />
                    <input type="hidden" name="SourceForm" value="addEditPermission">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <button type="reset" class="btn btn-info">Reset</button>
                    <a class="btn btn-light" href="'.$redirectToBack.'">Précédent</a>
                    <a class="btn btn-light" href="'.$SITE_LOC_PATH.'/admin/">Exit</a>
                </form>
            </div>
        </div>
    </div>
</div>
';