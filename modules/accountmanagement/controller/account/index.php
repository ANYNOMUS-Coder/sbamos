<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$acntObj    = new adminAccount;

if($REQUEST_METHOD=='POST') include ('action.php');

$editid     = 1;
if($editid){
    $acntData           = $acntObj -> getAccountByAccountId($editid);
    foreach($acntData as $ak=>$av){
        $$ak = $av;
    }
    $targetPathSrc      = $MEDIA_FILES_SRC.'/content/thumb';
}

echo '
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form elements</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                    '.$alertMsg.'
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Site Name *</label>
                                <input class="form-control" name="siteName" value="'.$siteName.'" placeholder="Type site name here">
                            </div>
                            <div class="form-group">
                                <label>Site Email *</label>
                                <input class="form-control" name="siteEmail" value="'.$siteEmail.'" placeholder="Type site email here">
                            </div>
                            <div class="form-group">
                                <label>Site Phone</label>
                                <input class="form-control" name="sitePhone" value="'.$sitePhone.'" placeholder="Type site phone here">
                            </div>
                            <div class="form-group">
                                <label>Site Info</label>
                                <textarea name="siteDescribtion" class="form-control txtareahght" rows="3" placeholder="Type your site info as introducer here">'.$siteDescribtion.'</textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Site Address</label>
                                <textarea name="siteAddress" class="form-control txtareahght" rows="3" placeholder="Type site address here">'.$siteAddress.'</textarea>
                            </div>
                        
                            
                            <div class="form-group">
                                <label>Site Logo</label>
                                <input type="file" name="siteLogo">
                                <p class="help-block">Upload JPEG or png image of size '.$imgInfoArr['siteLogo']['large']['w'].'*'.$imgInfoArr['siteLogo']['large']['h'].' px.</p>
                                ';
                                if($siteLogo){
                                    echo '<img src="'.$targetPathSrc.'/'.$siteLogo.'" style="max-height:150px; max-width:100%">';
                                }    
                        echo '
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="csrfToken" value="'.formToken('addEditAccount', $CSRF_TOKEN).'"/>
                    <input type="hidden" name="editid" value="'.$editid.'" />
                    <input type="hidden" name="SourceForm" value="addEditAccount">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <button type="reset" class="btn btn-info">Reset</button>
                    <a class="btn btn-light" href="'.$redirectToBack.'">Précédent</a>
                    <a class="btn btn-light ms-1" href="'.$SITE_LOC_PATH.'/admin/">Exit</a>
                    
                </form>
            </div>
        </div>
    </div>
</div>
';

/*
?>
<div class="row">
    <div class="col-lg-12">
        <?php echo $alertMsg;?>
        <div class="panel panel-default">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="panel-heading">Form Elements</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Site Name *</label>
                            <input class="form-control" name="siteName" value="<?php echo $siteName;?>" placeholder="Type site name here">
                        </div>
                        <div class="form-group">
                            <label>Site Info</label>
                            <textarea name="siteDescribtion" class="form-control" rows="3" placeholder="Type your site info as introducer here"><?php echo $siteDescribtion;?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Site Phone</label>
                            <input class="form-control" name="sitePhone" value="<?php echo $sitePhone;?>" placeholder="Type site phone here">
                        </div>
                        <div class="form-group">
                            <label>Site Email</label>
                            <input class="form-control" name="siteEmail" value="<?php echo $siteEmail;?>" placeholder="Type site email here">
                        </div>
                        <div class="form-group">
                            <label>Site Address</label>
                            <textarea name="siteAddress" class="form-control" rows="3" placeholder="Type site address here"><?php echo $siteAddress;?></textarea>
                        </div>
                        <h4 style="border-bottom: solid 1px">Branch Office</h4>
                        <!--<div class="form-group">
                            <label>Site Phone</label>
                            <input class="form-control" name="sitePhone2" value="<?php echo $sitePhone2;?>" placeholder="Type branch office phone here">
                        </div>-->
                        <div class="form-group">
                            <label>Site Email</label>
                            <input class="form-control" name="siteEmail2" value="<?php echo $siteEmail2;?>" placeholder="Type branch office email here">
                        </div>
						
                        <!--<div class="form-group">
                            <label>Site Address</label>
                            <textarea name="siteAddress2" class="form-control" rows="3" placeholder="Type branch office address here"><?php echo $siteAddress2;?></textarea>
                        </div>-->                    
                        
                        <div class="form-group">
                            <label>Working Hours</label>
                            <textarea name="workingHours" class="form-control" rows="3" placeholder="Type working hours here"><?php echo $workingHours;?></textarea>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                        <div class="form-group">
                            <label>Site Logo</label>
                            <input type="file" name="siteLogo">
                            <p class="help-block">Upload JPEG or png image of size <?php echo $imgInfoArr['siteLogo']['large']['w'].'*'.$imgInfoArr['siteLogo']['large']['h'];?> px.</p>
                            <?php
                            if($siteLogo){
                                echo '<img src="'.$targetPathSrc.'/'.$siteLogo.'" style="max-height:150px; max-width:100%">';
                            }    
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Risk Warning</label>
                            <textarea name="riskWarning" class="form-control" rows="3" placeholder="Type your site risk warning here"><?php echo $riskWarning;?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Legal Declaration</label>
                            <textarea name="legalDeclaration" class="form-control" rows="3" placeholder="Type your site Legal Declaration here"><?php echo $legalDeclaration;?></textarea>
                        </div>
                        <div class="form-group">
                            <label>Universal Diposite USD to INR Conversion Rate</label>
                            <input type="text" name="depositeusdinr" class="form-control" rows="3" placeholder="Type your universal diposite USD to INR conversion rate here" value="<?php echo $depositeusdinr;?>">
                        </div>
                        <div class="form-group">
                            <label>Universal Withdraw USD to INR Conversion Rate</label>
                            <input type="text" name="withdrawusdinr" class="form-control" rows="3" placeholder="Type your universal withdraw USD to INR conversion rate here" value="<?php echo $withdrawusdinr;?>">
                        </div>
                        <hr>
                        <div class="form-group">
                            <label>W-Fix Diposite USD to INR Conversion Rate</label>
                            <input type="text" name="wfixdepositeusdinr" class="form-control" rows="3" placeholder="Type your wfix diposite USD to INR conversion rate here" value="<?php echo $wfixdepositeusdinr;?>">
                        </div>
                        <div class="form-group">
                            <label>W-Fix Withdraw USD to INR Conversion Rate</label>
                            <input type="text" name="wfixwithdrawusdinr" class="form-control" rows="3" placeholder="Type your wfix withdraw USD to INR conversion rate here" value="<?php echo $wfixwithdrawusdinr;?>">
                        </div>
                	</div>
                </div>
                <div class="panel-body">
					<hr>
					<div class="col-md-6">
						<div class="form-group">
                            <label>Site Facebook URL</label>
                            <input class="form-control" name="fb" value="<?php echo $fb;?>" placeholder="Type facebook page here">
                        </div>
                        <div class="form-group">
                            <label>Site Google URL</label>
                            <input class="form-control" name="gp" value="<?php echo $gp;?>" placeholder="Type google page here">
                        </div>
                        <div class="form-group">
                            <label>Site Twitter URL</label>
                            <input class="form-control" name="tw" value="<?php echo $tw;?>" placeholder="Type twwitter page here">
                        </div>
                        <!--<div class="form-group">
                            <label>Site Pinterest URL</label>
                            <input class="form-control" name="pt" value="<?php echo $pt;?>" placeholder="Type pinterest page here">
                        </div>-->
                        <!--<div class="form-group">
                            <label>Site Linkedin URL</label>
                            <input class="form-control" name="li" value="<?php echo $li;?>" placeholder="Type file name here">
                        </div>-->
                        <div class="form-group">
                            <label>Site Youtube URL</label>
                            <input class="form-control" name="yt" value="<?php echo $yt;?>" placeholder="Type youtube chanel name here">
                        </div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
                            <label>Active Traders</label>
                            <input class="form-control" name="activeTraders" value="<?php echo $activeTraders;?>" placeholder="Type active traders here">
                        </div>
						<div class="form-group">
                            <label>Expert Advisors</label>
                            <input class="form-control" name="expertAdvisors" value="<?php echo $expertAdvisors;?>" placeholder="Type  expert advisors here">
                        </div>
						<div class="form-group">
                            <label>Awards Winning </label>
                            <input class="form-control" name="awardsWinning" value="<?php echo $awardsWinning;?>" placeholder="Type  awards winning here">
                        </div>
						<div class="form-group">
                            <label>Years Of Excellence</label>
                            <input class="form-control" name="yearsOfExcellence" value="<?php echo $yearsOfExcellence;?>" placeholder="Type  years of excellence here">
                        </div>
					</div>
				</div>	
                <div class="panel-body">
					<hr>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Pick from Bottom Ad Content List</label>
                            <span class="clearfix clear"></span>
                            <ul class="list-group cstm-sort" id="sortable-1">
                            <?php
                            $files = explode(',',$bottomContent);
                            $bottomFiles = glob($STYLE_FILES_ROOT.'/adcontent/bottomcontent/*');
                            foreach($bottomFiles as $bfv ){
                                $fileName = str_replace($STYLE_FILES_ROOT.'/adcontent/bottomcontent/','',$bfv);
                                if(!in_array($fileName,$files) && $fileName!='Custom Ad'){
                                    ?>
                                    <li class="list-group-item" id="<?php echo $fileName;?>">
                                        <?php echo $fileName;?>
                                        <span class="cnt-drctn"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Drop Bottom Ad Content</label>
                            <input type="hidden" name="bottomContent" value="<?php echo $bottomContent;?>">
                            <span class="clearfix clear"></span>
                            <ul class="list-group cstm-sort" id="sortable-11">
                            <?php
                            if(trim($files[0])){
                                foreach($files as $fv){
                                	$fileName = $fv;
                                    ?>
                                    <li class="list-group-item" id="<?php echo $fileName;?>">
                                        <?php echo $fileName;?>
                                        <span class="cnt-drctn"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="hidden" name="SourceForm" value="addEditAccount">
                    <input type="hidden" name="editid" value="<?php echo $editid;?>">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType;?>'">Back</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/';?>';">Exit</button>
                </div>
            </form>
        </div>
    </div>
</div>
*/