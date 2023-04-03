<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); 

if($SourceForm == 'addEditEmailTemplates' && $submit){

    if($heading!=''  && $subject!=''  && $altMessage!=''  && $description!='' ){
		
		$obj = new adminEmailTemplates;
		$params = array();
		$params['heading'] 				= $heading;
		$params['subject'] 				= $subject;
		$params['altMessage'] 			= $altMessage;
		$params['description']			= $description;
				
		if($editid){
			$update = $obj -> updateEmailTemplatesByemailtemplatesId($params,$editid);
			if($update)
				$alertMsg = alert('SUCCESS','Email Templates are updated successfully');
			else
				$alertMsg = alert('ERROR','Network error!');
		}
		else{
			$params['entryDate']     = date('Y-m-d H:i:s');
			$params['status']        = 'Y';
			$insert = $obj -> newEmailTemplates($params);
			$editid = $insert;
			$alertMsg = alert('SUCCESS','EmailTemplates created successfully');
		}
    }
    else
        $alertMsg = alert('ERROR','All * marked fields are mandatory!');
}
?>