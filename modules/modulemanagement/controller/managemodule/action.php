<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); 


$formToken = formToken($SourceForm,$_SESSION['CSRF_TOKEN']);
if (hash_equals($formToken, $_POST['csrfToken'])) {
    if($SourceForm == 'addEditModule' && $submit){
        if($moduleName!='' && $nameForDeveloper!='' && $parentModuleId!=''){
            $obj = new adminModules;
            $params = array();
            $params['parentModuleId']   = $parentModuleId;
            $params['nameForDeveloper'] = $nameForDeveloper;
            $params['moduleName']       = $moduleName;
            $params['instruction']      = $instruction;
            $params['moduleIcon']       = $moduleIcon;
            
            $ExtraQryStr = ($editid) ? "
            moduleId != '".$editid."' AND 
            (
                moduleName='".$moduleName."' OR 
                nameForDeveloper='".$moduleName."' OR 
                moduleName='".$nameForDeveloper."' OR 
                nameForDeveloper='".$nameForDeveloper."'
            )" :"
                moduleName='".$moduleName."' OR 
                nameForDeveloper='".$moduleName."' OR 
                moduleName='".$nameForDeveloper."' OR 
                nameForDeveloper='".$nameForDeveloper."'
            ";
            $moduleExist = $obj -> existModule($ExtraQryStr);
            if(!$moduleExist){
            
                if($editid){
                    $update = $obj -> updateModuleBymoduleId($params,$editid);
                    if($update)
                        $alertMsg = alert('SUCCESS','Module updated successfully');
                    else
                        $alertMsg = alert('ERROR','Network error!');
                }
                else{
                    $params['entryDate']     = date('Y-m-d H:i:s');
                    $params['status']        = 'Y';
                    
                        $insert = $obj -> newModule($params);
                        if($insert){
                            
                            //Insert Super admin Permission
                            $superAdmin             = $generalObj -> getSuperAdmin();
                            $superAdminPermArr      = objectToArray(json_decode($superAdmin['permission']));

                            $toBePushed = [
                                "id" => $insert,
                                "action" => ($parentModuleId) ? ["ADD","EDIT","STATUS","TRASH","REMOVE"] : []
                            ];

                            $superAdminPermIdArr    = array_column($superAdminPermArr,'id');
                            if(!in_array($insert,$superAdminPermIdArr)) {
                                array_push($superAdminPermArr,$toBePushed);
                            }
                            
                            $params                 = array();
                            $params['permission']   = json_encode(arrayToObject($superAdminPermArr));
                            
                            $generalObj -> updateUserById($params,'1');
                            //Insert Permission
                            
                            
                            $editid = $insert;
                            $alertMsg = alert('SUCCESS','Module inserted successfully');
                        }
                        else
                            $alertMsg = alert('ERROR','Network error!');
                    
                }

            }
            else
                $alertMsg = alert('ERROR','Change module name or file name!');
            
        }
        else
            $alertMsg = alert('ERROR','All * marked fields are mandatory!');
    }
    else
        $alertMsg = alert('ERROR','Invalid Sourceform!');
}
else
    $alertMsg = alert('ERROR','Invalid token!');