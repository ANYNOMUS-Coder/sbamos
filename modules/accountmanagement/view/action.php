<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$returnArr = array();
if($_POST['username']!='' && $_POST['password']!=''){
    define("RUNNING_SCRIPT", true);
    include ('../../../config.php');
    session_regenerate_id();
    $obj            = new general;
    $ExtraQryStr    = 'userSource="F"';
    $userData       = $obj -> getUserByUsernameAndPassword($username,$password,$ExtraQryStr);
    if($userData){
        $geoObj = new geoPlugin;
        $userPosition = $geoObj -> locate();
        
        //Generate Token No
        $FRONTEND_token = randomString(50);
        //Generate Token No
        
        $params = array();
        $params['tokenNo']           = $FRONTEND_token;
        $params['userId']            = $userData['userId'];
        $params['ip']                = $userPosition['ip'];
        $params['city']              = $userPosition['city'];
        $params['region']            = $userPosition['region'];
        $params['areaCode']          = $userPosition['areaCode'];
        $params['dmaCode']           = $userPosition['dmaCode'];
        $params['countryCode']       = $userPosition['countryCode'];
        $params['countryName']       = $userPosition['countryName'];
        $params['continentCode']     = $userPosition['continentCode'];
        $params['latitude']          = $userPosition['latitude'];
        $params['longitude']         = $userPosition['longitude'];
        $params['currencyCode']      = $userPosition['currencyCode'];
        $params['currencySymbol']    = $userPosition['currencySymbol'];
        $params['currencyConverter'] = $userPosition['currencyConverter'];
        $params['loginTime']         = date('Y-m-d H:i:s');
        $params['sessionId']         = session_id();
        $newLogId = $obj -> newLoginLog($params);
        
        if($newLogId && $FRONTEND_token){
            $_SESSION['FRONTEND_TOKEN']             = $FRONTEND_token;
            $_SESSION['FRONTEND_USERID']            = $userData['userId'];
            $_SESSION['FRONTEND_USERNAME']          = $userData['name'];
            
            $returnArr[] = 'success';
            $returnArr[] = 'Login successfull';
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
    echo json_encode($returnArr);
?>
