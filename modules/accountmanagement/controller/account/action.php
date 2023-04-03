<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); 

$formToken = formToken($SourceForm,$_SESSION['CSRF_TOKEN']);
if (hash_equals($formToken, $_POST['csrfToken'])) {
    if($SourceForm == 'addEditAccount' && $submit){
        if($siteName && $siteEmail){

            if(validateEmail($siteEmail)) {
                $obj = new adminAccount;
                $params = array();
                $params['siteName']             = $siteName;
                $params['siteDescribtion']      = $siteDescribtion;
                $params['sitePhone']            = $sitePhone;
                $params['sitePhone2']           = $sitePhone2;
                $params['siteEmail']            = $siteEmail;
                $params['siteEmail2']           = $siteEmail2;
                $params['workingHours']         = $workingHours;
                $params['siteCurrencySymbol']   = $siteCurrencySymbol;
                $params['sitePaymentId']        = $sitePaymentId;
                $params['siteSuccessPath']      = $siteSuccessPath;
                $params['siteFailurePath']      = $siteFailurePath;
                $params['siteAddress']          = $siteAddress;
                $params['siteAddress2']         = $siteAddress2;
                $params['fb']                   = $fb;
                $params['gp']                   = $gp;
                $params['tw']                   = $tw;
                $params['li']                   = $li;
                $params['yt']                   = $yt;
                $params['pt']                   = $pt;
                $params['riskWarning']          = $riskWarning;
                $params['legalDeclaration']     = $legalDeclaration;
                $params['activeTraders']     	= $activeTraders;
                $params['expertAdvisors']     	= $expertAdvisors;
                $params['awardsWinning']     	= $awardsWinning;
                $params['yearsOfExcellence']    = $yearsOfExcellence;
                $params['bottomContent']        = $bottomContent;
                $params['depositeusdinr']       = $depositeusdinr;
                $params['withdrawusdinr']       = $withdrawusdinr;
                $params['wfixdepositeusdinr']   = $wfixdepositeusdinr;
                $params['wfixwithdrawusdinr']   = $wfixwithdrawusdinr;
                $params['wdthAssistAmnt']       = $wdthAssistAmnt;
                $params['wdthAssistMood']       = $wdthAssistMood;
                $params['dpstAssistAmnt']       = $dpstAssistAmnt;
                $params['dpstAssistMood']       = $dpstAssistMood;
                
                $update = $obj -> updateAccountByAccountId($params,$editid);
                if($update)
                    $alertMsg = alert('SUCCESS','Account updated successfully');
                else
                    $alertMsg = alert('ERROR','Network error!');
                
                $targetPath = $ROOT_PATH.'/uploadedfiles/content';
                if($_FILES['siteLogo']['name']!=''){
                    if(in_array(pathinfo($_FILES['siteLogo']['name'],PATHINFO_EXTENSION), $imgTypeArr) ){
                        $siteData = $obj -> getAccountByAccountId($editid);
                        $imageName  = time().'-sitelogo.'.pathinfo($_FILES['siteLogo']['name'],PATHINFO_EXTENSION);

                        foreach($imgInfoArr['siteLogo'] as $iik=>$iiv){
                            $targetPathTo = $targetPath.'/'.$iik.'/'.$imageName;
                            if($siteData['siteLogo']) unlink($targetPath.'/'.$iik.'/'.$siteData['siteLogo']);
                            uploadFile($_FILES['siteLogo'], $targetPathTo, $iiv['w'],  $iiv['h'], false, false );
                        }

                        $params                   = array();
                        $params['siteLogo']       = $imageName;
                        $update = $obj -> updateAccountByAccountId($params,$editid);
                    } 
                    else
                        $alertMsg_BC = alert('ERROR',implode(',',$imgTypeArr).' are allowd!');
                }
            }
            else
                $alertMsg = alert('ERROR','Invalid email!');
        }
        else
            $alertMsg = alert('ERROR','All * marked fields are mandatory!');
    }
}
else
    $alertMsg = alert('ERROR','Invalid token!');