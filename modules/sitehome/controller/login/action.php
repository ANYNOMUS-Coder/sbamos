<?php
include ('../../../../ext_include.php');


$returnArr = array();

$formToken = formToken('login5845875',$_SESSION['CSRF_TOKEN']);
if (hash_equals($formToken, $_POST['csrfToken'])) {
    if($_POST['username']!='' && $_POST['password']!=''){

        session_regenerate_id();
        $obj            = new general;
        $ExtraQryStr    = '1';
        $userData       = $obj -> getUserByUsernameAndPassword($username,$password,$ExtraQryStr);
        if($userData){
            /*$geoObj = new geoPlugin;
            $userPosition = $geoObj -> locate();*/
            
            //Generate Token No
            $admin_token = randomString(50);
            //Generate Token No
            
            $params = array();
            $params['tokenNo']           = $admin_token;
            $params['userId']            = $userData['userId'];
            $params['ip']                = $_SERVER["REMOTE_ADDR"];
            /*$params['ip']                = $userPosition['ip'];
            $params['city']              = base64_encode($userPosition['city']);
            $params['region']            = base64_encode($userPosition['region']);
            $params['areaCode']          = base64_encode($userPosition['areaCode']);
            $params['dmaCode']           = base64_encode($userPosition['dmaCode']);
            $params['countryCode']       = base64_encode($userPosition['countryCode']);
            $params['countryName']       = base64_encode($userPosition['countryName']);
            $params['continentCode']     = base64_encode($userPosition['continentCode']);
            $params['latitude']          = base64_encode($userPosition['latitude']);
            $params['longitude']         = base64_encode($userPosition['longitude']);
            $params['currencyCode']      = base64_encode($userPosition['currencyCode']);
            $params['currencySymbol']    = base64_encode($userPosition['currencySymbol']);
            $params['currencyConverter'] = base64_encode($userPosition['currencyConverter']);*/
            $params['loginTime']         = date('Y-m-d H:i:s');
            $params['sessionId']         = session_id();
            $newLogId = $obj -> newLoginLog($params);
            
            if($newLogId && $admin_token){
                $_SESSION['ADMIN_TOKEN']         = $admin_token;
                $_SESSION['ADMIN_USERID']        = $userData['userId'];
                $_SESSION['ADMIN_USERTYPE']      = $userData['userType'];
                $_SESSION['ADMIN_USERALISENAME'] = $userData['aliasName'];
                $_SESSION['ADMIN_USERMAIL']      = $userData['email'];
                $_SESSION['ADMIN_USERIMAGE']     = $userData['userImage'];
                
                $returnArr[] = 'success';
                $returnArr[] = '<span class="spinner-border spinner-border-sm"></span> Redirecing...';

                $returnArr[] = $redirectUrl;
            }
            else{
                $returnArr[] = 'error';
                $returnArr[] = 'Network Error!';
            }
        }
        else{
            $returnArr[] = 'error';
            $returnArr[] = 'Invalid User!';
        }
    }
    else{
        $returnArr[] = 'error';
        $returnArr[] = 'Username or Password is empty!';
    }

} else {
    $returnArr[] = 'error';
    $returnArr[] = 'Invalid!';
}

echo json_encode($returnArr);