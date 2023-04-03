<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

function randomString($length, $type = '') {
    switch($type) {
        case 'num':
        $salt = '1234567890';
        break;
    case 'lower':
        $salt = 'abcdefghijklmnopqrstuvwxyz';
        break;
    case 'upper':
        $salt = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        break;
    case 'alfanumeric':
        $salt = 'abcdefghijklmnopqrstuvwxyz1234567890!@#$%';
        break;
    default:
        $salt = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
        break;
    }
    $rand = '';
    $i = 0;
    while ($i < $length) {
        $num = rand() % strlen($salt);
        $tmp = substr($salt, $num, 1);
        $rand = $rand . $tmp;
        $i++;
    }
    return $rand;
}

function getVerifiedByPageType($mdlId,$permission){
    return (in_array($mdlId,$permission)) ? true : false ;
}


function alert($type,$msg){
    switch($type){
        case 'SUCCESS' :
            $html = '<div class="alert alert-success alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button><strong>Success!</strong>&nbsp;'.$msg.'</div>';
            break;
        case 'ERROR' : 
            $html = '<div class="alert alert-danger alert-dismissible"><button type="button" class="btn-close" data-bs-dismiss="alert"></button><strong>Danger!</strong>&nbsp;'.$msg.'</div>';
    }
    return $html;
}

function gatTime($dateTime){
    return date('d/m/Y', strtotime($dateTime));
}

function formToken($form, $token) {
    return hash_hmac('sha256', $form, $token);
}

function slugify($string, $replace = array(), $delimiter = '-') {

	

  //if (!extension_loaded('iconv')) {
    //throw new Exception('iconv module not loaded');
  //}
  //$oldLocale = setlocale(LC_ALL, '0');
  //setlocale(LC_ALL, 'en_US.UTF-8');
  
  //$clean = iconv('UTF-8', 'ASCII//TRANSLIT', $string);
  $clean = $string;
  
  if (!empty($replace)) {
    $clean = str_replace((array) $replace, ' ', $clean);
  }
  $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
  $clean = strtolower($clean);
  $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);
  $clean = trim($clean, $delimiter);
  //setlocale(LC_ALL, $oldLocale);
  return $clean;
}

function createPermalink($input,$table,$needle,$ExtraQryStr) {
    $obj = new general;
    $permalink = slugify($input);
    return validatePermalink($obj,$permalink,$table,$needle,$ExtraQryStr);
}  

function validatePermalink($obj,$permalink,$table,$needle,$ExtraQryStr1) {
    $ExtraQryStr = $ExtraQryStr1.' and permalink="'.addslashes(trim($permalink)).'"';
    $row = $obj-> countRow($needle,$table,$ExtraQryStr);
    if($row){
        $permaArr = explode('-',$permalink);
        
        if(is_numeric($permaArr[(sizeof($permaArr)-1)])){
            $permalink = $permalink.'-'.($permaArr[(sizeof($permaArr)-1)]+1);
        }
        else 
            $permalink = $permalink.'-1';
        
        validatePermalink($obj,$permalink,$table,$needle,$ExtraQryStr1);
    }
    else
        return $permalink;
}

function  create_captcha_image($ROOT_PATH,$captcheText,$width,$height){
    //echo $ROOT_PATH;
    $im = @imagecreate($width, $height) or die("Cannot Initialize new GD image stream");
    $background_color = imagecolorallocate($im, 255, 255, 255);  
    imagefilledrectangle($im,0,0,$width,$height,$background_color);
    $pixel_color = imagecolorallocate($im, 104,204,30);
    for($i=0;$i<1000;$i++) {
        imagesetpixel($im,rand()%$width,rand()%$height,$pixel_color);
    }
    $text_color = imagecolorallocate($im, 0,0,0);
    imagestring($im, 5, 7, 8,  $captcheText, $text_color);
    imagepng($im,$ROOT_PATH.'/lib/captche/captche.png');
    imagedestroy($im);
}

if(!function_exists("array_column")) {

    function array_column($array,$column_name)
    {

        return array_map(function($element) use($column_name){return $element[$column_name];}, $array);

    }

}

function getChildIdsByParentUserId(&$returnArr,$obj,$userId,$ExtraQry=1){
    $ExtraQryStr = "parentUserId=".addslashes($userId)." and ".$ExtraQry;
    $childUser = $obj -> getUser($ExtraQryStr,0,999);
    foreach($childUser as $uv){
        $returnArr[] = $uv['userId'];
        getChildIdsByParentUserId($returnArr,$obj,$uv['userId'],$ExtraQry);
    }
    return $returnArr;
}

function halfHourTimes() {
  $formatter = function ($time) {
    if ($time % 3600 == 0) {
      return date('ga', $time);
    } else {
      return date('g:ia', $time);
    }
  };
  $halfHourSteps = range(0, 47*1800, 1800);
  return array_map($formatter, $halfHourSteps);
}

function  validatePhone($phone){
    if(is_numeric($phone) && strlen($phone)<20 && $phone>0)
		return true;
	else
		return false;
}

function  validateIndiaPhone($phone){
    if(is_numeric($phone) && strlen($phone)==10 && $phone>0)
		return true;
	else
		return false;
}


function  validateName($name){
    if (!preg_match("/^[a-zA-Z ]*$/",$name))
        return false;
    else
        return true;
}

function  validateEmail($email){
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        return false;
    else
        return true;
}

function  validateWebsite($website){
    if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website))
        return false;
    else
        return true;
}

function  validateDate($date){
    if (!preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/",$date))
        return false;
    else
        return true;
}
function  validateCardExpiry($date){
    if (!preg_match("/^(0[1-9]|1[0-2])-[0-9]{4}$/",$date))
        return false;
    else
        return true;
}
function  validateTime($date){
    if (!preg_match("/^(0[0-9]|1[0-9]|2[0-3]):(0[0-9]|[1-5][0-9]):(0[0-9]|[1-5][0-9])$/",$date))
        return false;
    else
        return true;
}
function objectToArray($d) {
    if (is_object($d)) {
        // Gets the properties of the given object
        // with get_object_vars function
        $d = get_object_vars($d);
    }

    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return array_map(__FUNCTION__, $d);
    }
    else {
        // Return array
        return $d;
    }
}
function arrayToObject($d) {
    if (is_array($d)) {
        /*
        * Return array converted to object
        * Using __FUNCTION__ (Magic constant)
        * for recursive call
        */
        return (object) array_map(__FUNCTION__, $d);
    }
    else {
        // Return object
        return $d;
    }
}

require ROOT_PATH.'/lib/sendgrid/sendgrid-php.php';
function sendMailAdvanced($toArr,$ccArr=false,$bccArr=false,$subject,$message,$fromname=SMTP_FROMNAME,$fromemail=SMTP_FROMEMAIL,$attachmentlocation=false) { 
    
    $email = new \SendGrid\Mail\Mail();
    $email->setFrom($fromemail, $fromname);
    
    if(sizeof($toArr)) {
        $toEmails = array();
        while (list ($key, $val) = each ($toArr)) {
            $toEmails[$val] = ucfirst(reset(explode('@',$val)));
        }
        $email->addTos($toEmails);
    }
    else {
        $email->addTo($toArr[0], ucfirst(reset(explode('@',$toArr[0]))));
    }
    
    if($ccArr) {
        if(sizeof($ccArr)) {
            $ccEmails = array();
            while (list ($key, $val) = each ($ccArr)) {
                $ccEmails[$val] = ucfirst(reset(explode('@',$val)));
            }
            $email->addCcs($ccEmails);
        }
        else {
            $email->addCc($ccArr[0], ucfirst(reset(explode('@',$ccArr[0]))));
        }
    }
    
    if($bccArr) {
        if(sizeof($bccArr)) {
            $bccEmails = array();
            while (list ($key, $val) = each ($bccArr)) {
                $bccEmails[$val] = ucfirst(reset(explode('@',$val)));
            }
            $email->addCcs($bccEmails);
        }
        else {
            $email->addCc($bccArr[0], ucfirst(reset(explode('@',$bccArr[0]))));
        }
    }
    
    if($attachmentlocation) {
        if  (sizeof( $attachmentlocation )) {
            $attachments = array();
            foreach ($attachmentlocation as $attachment ) {
                $file_encoded = base64_encode(file_get_contents($attachment['file']));
                $fileName = pathinfo($attachment['file'], PATHINFO_FILENAME).'.'.pathinfo($attachment['file'], PATHINFO_EXTENSION);
                $attachments[] = array (
                    $file_encoded,
                    $attachment['type'],
                    $attachment['nm'],
                    "attachment"
                );
            }
            $email->addAttachments($attachments);
        }
        /*else {
            $file_encoded = base64_encode(file_get_contents($attachmentlocation[0]['file']));
            $fileName = pathinfo($attachmentlocation[0]['file'], PATHINFO_FILENAME).'.'.pathinfo($attachmentlocation[0]['file'], PATHINFO_EXTENSION);
            $mail->addAttachment(
                $file_encoded,
                $attachmentlocation[0]['type'],
                $fileName,
                "attachment"
            );
        }*/
    }
    
    $email->setSubject($subject);
    $email->addContent(
        "text/html", $message
    );
    $sendgrid = new \SendGrid(SMTP_PASSWORD);
    $response = $sendgrid->send($email);
    
    return array(
        'status' => $response->statusCode(),
        'headers' => $response->headers(),
        'message' => $response->body()
    );
}

function currencyConverter($from_currency, $to_currency, $amount) {
    $from_Currency = urlencode($from_currency);
    $to_Currency = urlencode($to_currency);
    $encode_amount = urlencode($amount);
    $get = file_get_contents("https://www.google.com/finance/converter?a=$encode_amount&from=$from_Currency&to=$to_Currency");
    $get = explode("<span class=bld>",$get);
    $get = explode("</span>",$get[1]);
    $converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
    return $converted_currency;
}

use Brick\PhoneNumber\PhoneNumber;
use Brick\PhoneNumber\PhoneNumberParseException;
require ROOT_PATH.'/lib/PHONEvalidation/vendor/autoload.php';
function validateAdvPhone($fullnumber) {
    $number = PhoneNumber::parse($fullnumber);
    return ($number->isValidNumber()) ? true : false;
}
function getRegionCodeByPhone($fullnumber) {
    $number = PhoneNumber::parse($fullnumber);
    return $number->getRegionCode();
}
function getCountryCodeByPhone($fullnumber) {
    $number = PhoneNumber::parse($fullnumber);
    return $number->getCountryCode();
}
function getNationalNumberByPhone($fullnumber) {
    $number = PhoneNumber::parse($fullnumber);
    return $number->getNationalNumber();
}

function sendSms($to, $msg, $from='DEMOOO') {
    $to = (is_array($to)) ? implode(',',$to) : $to;
    $ch = curl_init();  
    $url = "http://198.15.103.106/API/pushsms.aspx?loginID=".SMS_GW_UN."&password=".SMS_GW_PW."&mobile=".$to."&text=".urlencode($msg)."&senderid=".$from."&route_id=1&Unicode=0";
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
}

function smsReport($id) {
    $ch = curl_init();  
    $url = "http://198.15.103.106/API/GetReport.aspx?loginID=".SMS_GW_UN."&password=".SMS_GW_PW."&TransactionID=".$id;
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    $output=curl_exec($ch);
    curl_close($ch);
    return $output;
}

function sendSinglePushNotifications($deviceId,$title,$message) {
    $headers=array(
        'Authorization:key='.FCM_KEY,
        'Content-Type:application/json'
    );
    $fields=array('to'=>$deviceId,
        'notification'=>array('title'=>$title,'body'=>$message,'sound'=>'true','vibrate'=> 1,'largeIcon'=> 'large_icon','smallIcon' => 'small_icon'));
    $payload=json_encode($fields);

    $curl_session = curl_init();
    curl_setopt($curl_session, CURLOPT_URL, FCM_PATH);
    curl_setopt($curl_session, CURLOPT_POST, true);
    curl_setopt($curl_session, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl_session, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl_session, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl_session, CURLOPT_IPRESOLVE, CURLOPT_IPRESOLVE_V4);
    curl_setopt($curl_session, CURLOPT_POSTFIELDS, $payload);
    $result=curl_exec($curl_session);
    
    return $result;
}

function ip_info($ip = NULL, $purpose = "location", $deep_detect = TRUE) {
    $output = NULL;
    if (filter_var($ip, FILTER_VALIDATE_IP) === FALSE) {
        $ip = $_SERVER["REMOTE_ADDR"];
        if ($deep_detect) {
            if (filter_var(@$_SERVER['HTTP_X_FORWARDED_FOR'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
            if (filter_var(@$_SERVER['HTTP_CLIENT_IP'], FILTER_VALIDATE_IP))
                $ip = $_SERVER['HTTP_CLIENT_IP'];
        }
    }
    $purpose    = str_replace(array("name", "\n", "\t", " ", "-", "_"), NULL, strtolower(trim($purpose)));
    $support    = array("country", "countrycode", "state", "region", "city", "location", "address");
    $continents = array(
        "AF" => "Africa",
        "AN" => "Antarctica",
        "AS" => "Asia",
        "EU" => "Europe",
        "OC" => "Australia (Oceania)",
        "NA" => "North America",
        "SA" => "South America"
    );
    if (filter_var($ip, FILTER_VALIDATE_IP) && in_array($purpose, $support)) {
        $ipdat = @json_decode(file_get_contents("http://www.geoplugin.net/json.gp?ip=" . $ip));
        if (@strlen(trim($ipdat->geoplugin_countryCode)) == 2) {
            switch ($purpose) {
                case "location":
                    $output = array(
                        "city"           => @$ipdat->geoplugin_city,
                        "state"          => @$ipdat->geoplugin_regionName,
                        "country"        => @$ipdat->geoplugin_countryName,
                        "country_code"   => @$ipdat->geoplugin_countryCode,
                        "continent"      => @$continents[strtoupper($ipdat->geoplugin_continentCode)],
                        "continent_code" => @$ipdat->geoplugin_continentCode
                    );
                    break;
                case "address":
                    $address = array($ipdat->geoplugin_countryName);
                    if (@strlen($ipdat->geoplugin_regionName) >= 1)
                        $address[] = $ipdat->geoplugin_regionName;
                    if (@strlen($ipdat->geoplugin_city) >= 1)
                        $address[] = $ipdat->geoplugin_city;
                    $output = implode(", ", array_reverse($address));
                    break;
                case "city":
                    $output = @$ipdat->geoplugin_city;
                    break;
                case "state":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "region":
                    $output = @$ipdat->geoplugin_regionName;
                    break;
                case "country":
                    $output = @$ipdat->geoplugin_countryName;
                    break;
                case "countrycode":
                    $output = @$ipdat->geoplugin_countryCode;
                    break;
            }
        }
    }
    return $output;
}

function getKeyByValueMultyArr($arr, $field, $value) {
    return array_search($value, array_column($arr, $field));
}

function isDigits(string $s, int $minDigits = 1, int $maxDigits = 30): bool {
    return preg_match('/^[0-9]{'.$minDigits.','.$maxDigits.'}\z/', $s);
}

function timezoneList()
{
    $timezoneIdentifiers = DateTimeZone::listIdentifiers();
    $utcTime = new DateTime('now', new DateTimeZone('UTC'));
 
    $tempTimezones = array();
    foreach ($timezoneIdentifiers as $timezoneIdentifier) {
        $currentTimezone = new DateTimeZone($timezoneIdentifier);
 
        $tempTimezones[] = array(
            'offset' => (int)$currentTimezone->getOffset($utcTime),
            'identifier' => $timezoneIdentifier
        );
    }
 
    // Sort the array by offset,identifier ascending
    usort($tempTimezones, function($a, $b) {
		return ($a['offset'] == $b['offset'])
			? strcmp($a['identifier'], $b['identifier'])
			: $a['offset'] - $b['offset'];
    });
 
	$timezoneList = array();
    foreach ($tempTimezones as $tz) {
		$sign = ($tz['offset'] > 0) ? '+' : '-';
		$offset = gmdate('H:i', abs($tz['offset']));
        //$timezoneList[$tz['identifier']] = str_replace('/',' - ',$tz['identifier']).' (UTC ' . $sign . $offset . ')';
        $timezoneList[] = array(
            'key' => $tz['identifier'],
            'value' => str_replace('/',' - ',$tz['identifier']).' (UTC ' . $sign . $offset . ')'
        ); 
    }
 
    return $timezoneList;
}

function convertTimeZone($timezone) {
    $currentTimezone = new DateTimeZone($timezone);
    $utcTime = new DateTime('now', new DateTimeZone('UTC'));
    $offset = (int)$currentTimezone->getOffset($utcTime);
    $sign = ($offset > 0) ? '+' : '-';
	$offset = gmdate('H:i', abs($offset));
    return array(
        'key' => $timezone,
        'value' => str_replace('/',' - ',$timezone).' (UTC ' . $sign . $offset . ')'
    );
}

function getDatesFromRange($start, $end, $format = 'Y-m-d') {
      
    // Declare an empty array
    $array = array();
      
    // Variable that store the date interval
    // of period 1 day
    $interval = new DateInterval('P1D');
  
    $realEnd = new DateTime($end);
    $realEnd->add($interval);
  
    $period = new DatePeriod(new DateTime($start), $interval, $realEnd);
  
    // Use loop to store date into array
    foreach($period as $date) {                 
        $array[] = $date->format($format); 
    }
  
    // Return the array elements
    return $array;
}

function getAdminAvatar($file='PROFILE_SSN',$size='thumb') {
    $file = ($file=='PROFILE_SSN') ? $_SESSION['ADMIN_USERIMAGE'] : $file;
    if(
        $file && 
        file_exists(MEDIA_FILES_ROOT.'/user/'.$size.'/'.$file)
    )
        $img = MEDIA_FILES_SRC.'/user/'.$size.'/'.$file;
    else {
        $searchArr = ['[w]','[h]','[bc]','[fc]','[txt]'];
        $replaceArr = [
            (IMG_INFO_ARR['userImage'][$size]['w']) ? IMG_INFO_ARR['userImage'][$size]['w'] : NORMAL_FILE_W,
            (IMG_INFO_ARR['userImage'][$size]['h']) ? IMG_INFO_ARR['userImage'][$size]['h'] : NORMAL_FILE_H,
            NO_FILE_BACK_COLOR,
            NO_FILE_FONT_COLOR,
            'NA'
        ];
        $img = str_replace($searchArr, $replaceArr, NO_FILE_URL);
    }
        
    return $img;
}

function formatSizeUnits($bytes){
    if ($bytes >= 1073741824){
        $bytes = number_format($bytes / 1073741824, 2) . ' GB';
    }
    elseif ($bytes >= 1048576){
        $bytes = number_format($bytes / 1048576, 2) . ' MB';
    }
    elseif ($bytes >= 1024){
        $bytes = number_format($bytes / 1024, 2) . ' KB';
    }
    elseif ($bytes > 1){
        $bytes = $bytes . ' bytes';
    }
    elseif ($bytes == 1){
        $bytes = $bytes . ' byte';
    }
    else{
        $bytes = '0 bytes';
    }

    return $bytes;
}

function imageUpload($target_dir,$files) {

    $filename       = time();
    $imageFileType  = pathinfo($files["imageFile"]["name"],PATHINFO_EXTENSION);
    $name           = $filename.".".$imageFileType;
    $target_file    = $target_dir . $name;

    $upload = move_uploaded_file($files["imageFile"]["tmp_name"], $target_file);

    return array(
        'status' => $upload,
        'name' => $name
    );
}

function printr($arr) {
    echo '<pre>';
    print_r($arr);
    echo '</pre>';
}