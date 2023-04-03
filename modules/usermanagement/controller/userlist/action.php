<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); 

$formToken = formToken($SourceForm,$_SESSION['CSRF_TOKEN']);
if (hash_equals($formToken, $_POST['csrfToken'])) {


    if($SourceForm == 'addEditUser' && $submit){

        if($name){
            $obj        = new adminUser;
            if($editid){
                $returnArr  = array($_SESSION['ADMIN_USERID']);
                $childUser  = getChildIdsByParentUserId($returnArr,$obj,$_SESSION['ADMIN_USERID']);
                //print_r($childUser);
                if(in_array($editid,$childUser)) {
                    $params = array();
                    $params['name']         = $name;
                    $params['aliasName']    = $aliasName;
                    $params['phone']        = $phone;
                    $update = $obj -> updateUserByUserId($params,$editid);

                    if($_SESSION['ADMIN_USERID']==$editid) {
                        $_SESSION['ADMIN_USERALISENAME'] = $aliasName;
                        $_SESSION['ADMIN_USERNAME'] = $name;
                    }
                    if($update)
                        $alertMsg = alert('SUCCESS','User updated successfully');
                    else
                        $alertMsg = alert('ERROR','Network error!');
                    
                    if($_FILES['userImage']['name']!=''){
                        $pathExtn = pathinfo($_FILES['userImage']['name'],PATHINFO_EXTENSION);
                        if( in_array($pathExtn, $imgTypeArr) )
                        {
                            $imageName  = time().'.'.$pathExtn;
                            $userData = $obj -> getUserByUserId($editid);
                            foreach($imgInfoArr['userImage'] as $iik=>$iiv){
                                $targetPathTo = $MEDIA_FILES_ROOT.'/user/'.$iik.'/'.$imageName;
                                if($userData['userImage'] && file_exists($MEDIA_FILES_ROOT.'/user/'.$iik.'/'.$userData['userImage']))
                                    unlink($MEDIA_FILES_ROOT.'/user/'.$iik.'/'.$userData['userImage']);

                                    //echo $targetPathTo.'<br>';
                                uploadFile($_FILES['userImage'], $targetPathTo, $iiv['w'],  $iiv['h'], false, true );
                            }
                            $params = array();
                            $params['userImage'] = $imageName;
                            $obj -> updateUserByUserId($params,$editid);
                            if($_SESSION['ADMIN_USERID']==$editid) {
                                $_SESSION['ADMIN_USERIMAGE'] = $imageName;
                            }
                        }
                        else
                            $alertMsg2 = alert('ERROR','Only '.implode(', ',$imgTypeArr).' are allowed!');
                    }
                }
                else
                    $alertMsg = alert('ERROR','You are not allowed!');    
            }
            else
                $alertMsg = alert('ERROR','User is undefined!');
        }
        else
            $alertMsg = alert('ERROR','All * marked fields are mandatory!');
    }

    elseif($SourceForm == 'addEditUserCrendential' && $submit){
        if($email && $username && $orgPassword && $corgPassword){
            if(validateEmail($email)) {
                if($orgPassword == $corgPassword){
                    $obj        = new adminUser;
                    $returnArr  = array($_SESSION['ADMIN_USERID']);
                    $childUser  = getChildIdsByParentUserId($returnArr,$obj,$_SESSION['ADMIN_USERID']);
                    $ExtraQryStr = ($editid) ? "(username='".addslashes($username)."' OR email='".addslashes($email)."') AND userId!=".addslashes($editid) : "username='".addslashes($username)."' OR email='".addslashes($email)."'";
                    $exist = $obj -> existUser($ExtraQryStr);
                    if(!$exist){
                        $params = array();
                        $params['parentUserId'] = $parent;
                        $params['username']     = $username;
                        $params['password']     = md5($orgPassword);
                        $params['orgPassword']  = $orgPassword;
                        if($_SESSION['ADMIN_USERID']!=$editid) $params['email'] = $email;
    
                        if($editid){
                            if(in_array($editid,$childUser)) {
                                
                                $update = $obj -> updateUserByUserId($params,$editid);
                                if($update)
                                    $alertMsg = alert('SUCCESS','User updated successfully');
                                else
                                    $alertMsg = alert('ERROR','Network error!');
                            }
                            else
                                $alertMsg = alert('ERROR','You are not allowed!');    
                        }
                        else{
                            
                            $params['userType']     = 'A';
                            $params['entryDate']    = date('Y-m-d H:i:s');
                            $params['status']       = 'Y';
                            $params['permission']   = json_encode(arrayToObject([['id'=>3,'action'=>[]],['id'=>4,'action'=>[]]]));
                            if(in_array($parent,$childUser)) {
                                $insert = $obj -> newUser($params);
                                if($insert){
                                    $editid = $insert;
                                    $alertMsg = alert('SUCCESS','User created successfully');
                                }
                                else
                                    $alertMsg = alert('ERROR','Network error!');
                            }
                            else
                                $alertMsg = alert('ERROR','You are not allowed!');
                        }
                    }
                    else
                        $alertMsg = alert('ERROR','Some other user exist in this username!');
                }
                else
                    $alertMsg = alert('ERROR','Password fields did not match!');
            }
            else
                $alertMsg = alert('ERROR','Invalid email!');
        }
        else
            $alertMsg = alert('ERROR','All * marked fields are mandatory!');
    }

    elseif($SourceForm == 'addEditPermission' && $submit){

        $obj        = new adminUser;
        $returnArr  = array();
        $childUser  = getChildIdsByParentUserId($returnArr,$obj,$_SESSION['ADMIN_USERID']);

        if(in_array($editid,$childUser)) {

            $moduleIdNw = [];
            foreach ($moduleIds['id'] as $mKey => $mVal) {
                $moduleIdNw[$mKey]['id'] = $mVal;
                $moduleIdNw[$mKey]['action'] = (is_array($moduleIds[$mVal]['action'])) ? $moduleIds[$mVal]['action'] : [];
            }
            $moduleIds = $moduleIdNw;

            if($editid){
                

                $params                 = array();
                $params['permission']   = json_encode(arrayToObject($moduleIds));
                $update = $obj -> updateUserByUserId($params,$editid);
                $alertMsg = ($update) ? alert('SUCCESS','User permission updates successfully') : alert('ERROR','User permission update error');
            }
            else
                $alertMsg = alert('ERROR','User is undefined!');
        }
        else
            $alertMsg = alert('ERROR','You can only edit you sub user permission!');   
    }

}
else
    $alertMsg = alert('ERROR','Invalid token!');