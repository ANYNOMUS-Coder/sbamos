<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); 

if($SourceForm == 'addEditSendeMail' && $submit){

    if($toEmail!=''  && $smtpId!=''  && $emailtemplatesId!=''){
		
		$obj = new adminSendeMail;
		$params = array();
		$params['toEmail'] 			= $toEmail;
		$params['cc']			    = $cc;
		$params['bcc']              = $bcc;
		$params['subject']          = $subject;
		$params['smtpId']           = $smtpId;
		$params['emailtemplatesId'] = $emailtemplatesId;
		$params['smtpMessage']      = $smtpMessage;
		$params['isDeliver']        = 'N';
		
		if($editid){
			$update = $obj -> updateSendeMailBysendEmailId($params,$editid);
			if($update)
				$alertMsg = alert('SUCCESS','SendeMail updated successfully');
			else
				$alertMsg = alert('ERROR','Network error!');
		}
		else{
			$params['entryDate']     = date('Y-m-d H:i:s');
			$params['status']        ='Y';
						
			$insert = $obj -> newSendeMail($params);
			$editid = $insert;
			$alertMsg = alert('SUCCESS','SendeMail created successfully');
		}

		if($_FILES['file']['name']!=''){
            $pathExtn = pathinfo($_FILES['file']['name'],PATHINFO_EXTENSION);
			
            if( in_array($pathExtn, $fileArr) )
            {
				$existArr = $obj -> getSendeMailBysendEmailId($editid);
				
                $fileName  = time().'.'.$pathExtn;            
                $targetPathTo = $MEDIA_FILES_ROOT.'/document/'.$fileName;
                if($existArr['file'] && file_exists($MEDIA_FILES_ROOT.'/document/'.$existArr['file']))
                    unlink($MEDIA_FILES_ROOT.'/document/'.$existArr['file']);
                @move_uploaded_file($_FILES['file']['tmp_name'],$targetPathTo);
                $params = array();
                $params['file'] = $fileName;
                $update = $obj -> updateSendeMailBysendEmailId($params,$editid);
            }
            else
                $alertMsg2 = alert('ERROR','Only '.implode(', ',$fileArr).' are allowed!');
        }
    }
    else
        $alertMsg = alert('ERROR','All * marked fields are mandatory!');
}
?>