<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); 

if($SourceForm == 'addEditSmtpConfiguration' && $submit){

    if($smtpHost!=''  && $smtpUsername!=''  && $smtpPassword!=''  && $smtpPort!=''  && $smtpFromName!=''  && $smtpFromEmail!=''  && $smtpReplyName!=''  && $smtpReplyEmail!='' ){
		
		$obj = new adminSmtpConfiguration;
		$params = array();
		$params['smtpHost'] 			  = $smtpHost;
		$params['smtpUsername']			  = $smtpUsername;
		$params['smtpPassword']           = $smtpPassword;
		$params['smtpPort']               = $smtpPort;
		$params['smtpSecure']             = $smtpSecure;
		$params['smtpFromName']           = $smtpFromName;
		$params['smtpFromEmail']          = $smtpFromEmail;
		$params['smtpReplyName']          = $smtpReplyName;
		$params['smtpReplyEmail']         = $smtpReplyEmail;
		
				
		if($editid){
			$update = $obj -> updateSmtpConfigurationBysmtpId($params,$editid);
			if($update)
				$alertMsg = alert('SUCCESS','SmtpConfiguration updated successfully');
			else
				$alertMsg = alert('ERROR','Network error!');
		}
		else{
            $params['isActivated']   = 'N';
			$params['entryDate']     = date('Y-m-d H:i:s');
			$params['status']        = 'Y';
			$insert = $obj -> newSmtpConfiguration($params);
			$editid = $insert;
			$alertMsg = alert('SUCCESS','SmtpConfiguration created successfully');
		}
    }
    else
        $alertMsg = alert('ERROR','All * marked fields are mandatory!');
}
?>