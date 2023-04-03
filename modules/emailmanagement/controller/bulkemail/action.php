<?php
if($_POST['ajax']=='1')
    include ('../../../../ext_include.php');
else
    if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); 

$rsltArr = array();
if($SourceForm == 'getAllEmail'){
    $obj = new adminSiteUser;
    $ExtraQryStr = '1';
    $ExtraQryStr .= (trim($isActivated)) ? ' and isActivated="'.$isActivated.'"' : '';
    $ExtraQryStr .= (trim($initialDepositeStatus)) ? ' and initialDepositeStatus="'.$initialDepositeStatus.'"' : '';
    $dataArr = $obj -> getSiteUserWithoutLimit($ExtraQryStr,'email');
    $rsltArr = array_column($dataArr,'email');
    echo json_encode($rsltArr);
}
elseif($SourceForm == 'checkCmpgnStatus'){
    $obj    = new adminEmailCampaign;
    $rObj   = new adminEmilCampaignReport;
    
    $ExtraQryStr = 'campaignId="'.$info.'" and isSended="Y"';
    $rNo = $rObj -> existEmilCampaignReport($ExtraQryStr);
    $ExtraQryStr = 'campaignId="'.$info.'" and isAttempted="Y"';
    $aNo = $rObj -> existEmilCampaignReport($ExtraQryStr);
    $ExtraQryStr = 'campaignId="'.$info.'"';
    $wNo = $rObj -> existEmilCampaignReport($ExtraQryStr);
    $prgrs = (($aNo/$wNo)*100);
    
    $cmpgn = $obj -> getEmailCampaignBycampaignId($info,'campaignStatus');
    $reload = ($cmpgn['campaignStatus']=='PAUSE') ? true : false;
    
    $rsltArr = array(
        'wght' => $rNo.'/'.$wNo,
        'pw' => $prgrs,
        'reload' => $reload
    );
    echo json_encode($rsltArr);
}
elseif($SourceForm == 'checkSessionStatus'){
    $rsltArr = array(
        'status' => $_SESSION['CMPGN_STS'],
        'pw' => $_SESSION['CMPGN_PRG'],
        'time' => $_SESSION['CMPGN_TIME']
    );
    echo json_encode($rsltArr);
}
elseif($SourceForm == 'addEditEmailCampaign'){
    
    if(is_array($email) && $fromName && $fromEmail && $replyName && $replyEmail && $emailTemplate && $campaignName) {
        $_SESSION['CMPGN_STS'] = 'INITIALIZING...';
        $obj    = new adminEmailCampaign;
        
        $tObj   = new adminEmailTemplates;
        $tArr   = $tObj -> getEmailTemplatesByemailtemplatesId($emailTemplate);
        
        $mailFrom = array(
            'from_name'=>$fromName,
            'from_mail'=>$fromEmail
        );
        
        $mailReply = array(
            'reply_name'=>$replyName,
            'reply_mail'=>$replyEmail
        );
        
        $params = array();
        $params['campaignName']     = $campaignName;
        $params['subject']          = $tArr['subject'];
        $params['mailBody']         = $tArr['description'];
        $params['mailFrom']         = json_encode($mailFrom);
        $params['mailReply']        = json_encode($mailReply);
        $params['campaignStatus']   = 'NONE';
        $params['campaignBy']       = $_SESSION['ADMIN_USERID'];
        $params['entryDate']        = date('Y-m-d H:i:s');
        $cmpgnIns = $obj -> newEmailCampaign($params);
        if($cmpgnIns) {
            $_SESSION['CMPGN_STS'] = 'PROCESSING...';
            $rObj = new adminEmilCampaignReport;
            $c=0;
            $ct = sizeof($email);
            $timeOne = date_create(date('Y-m-d H:i:s'));
            foreach($email as $toEmail) {
                $params = array();
                $params['campaignId']  = $cmpgnIns;
                $params['toEmail']     = $toEmail;
                $params['smtpResult']  = 'Pending';
                $params['sendDate']    = 'Pending';
                $params['isSended']    = 'N';
                $params['entryDate']   = date('Y-m-d H:i:s');
                $rIns = $rObj -> newEmilCampaignReport($params);
                $c = ($rIns) ? $c+1 : $c;
                
                $timeTwo = date_create(date('Y-m-d H:i:s'));
                $diff = date_diff($timeOne,$timeTwo);
                
                $_SESSION['CMPGN_PRG'] = (($c/$ct)*100);
                $_SESSION['CMPGN_TIME'] = $diff->format("%R %H Hour %I Minutes %S Seconds");
            }
            $rsltArr['typ'] = 'success';
        }
    }
    echo json_encode($rsltArr);
}
elseif($SourceForm == 'setCmpgnSts'){
    if($info && $action) {
        $obj = new adminEmailCampaign;
        $params = array();
        $params['campaignStatus'] = $action;
        $upd = $obj -> updateEmailCampaignBycampaignId($params,$info);
        $rsltArr['typ'] = ($upd) ? 'success' : 'error';
    }
    echo json_encode($rsltArr);
}