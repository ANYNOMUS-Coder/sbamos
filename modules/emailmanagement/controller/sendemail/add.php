<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$obj = new adminSendeMail;
$sObj = new adminSmtpConfiguration;
$eObj = new adminEmailTemplates;
if($editid){
    $dataArr = $obj -> getSendeMailBysendEmailId($editid);
    if($dataArr){
        foreach($dataArr as $key=>$value){
            $$key = $value;
        }
    }
}
$ExtraQryStr = 'status="Y"';
$allSite = $sObj -> getSmtpConfiguration($ExtraQryStr,0,999);
$allEmail = $eObj -> getEmailTemplates($ExtraQryStr,0,999);
?>   

<div class="row">
    <div class="col-lg-12">
        <?php echo $alertMsg;?>
        <div class="panel panel-default">
            <form action="" method="post" enctype="multipart/form-data">
                <div class="panel-heading">Form Elements</div>
                
				<div class="panel-body">
					<div class="col-md-12">
					<div class="col-md-12">
						<div class="form-group">
                            <label> To Mail  *</label>
                            <input class="form-control" name="toEmail" value="<?php echo $toEmail;?>" placeholder="Type to mail here">
                        </div>
						<div class="form-group">
                            <label> Cc</label>
                            <input class="form-control" name="cc" value="<?php echo $cc;?>" placeholder="Type cc here">
                        </div>
						<div class="form-group">
                            <label> Bcc </label>
                            <input class="form-control" name="bcc" value="<?php echo $bcc;?>" placeholder="Type bcc here">
                        </div>
						<div class="form-group">
                            <label> Subject </label>
                            <input class="form-control" name="subject" value="<?php echo $subject;?>" placeholder="Type subject here">
                        </div>
						<div class="form-group">
                            <label> Choose Smtp Configuration *</label>
                            <select class="form-control" name="smtpId">
								<option value="">Select </option>
								<?php 
								foreach($allSite as $av){
									$selected = ($av['smtpId']==$smtpId) ? 'selected':'' ;
									echo '<option '.$selected.' value="'.$av['smtpId'].'">'.$av['smtpUsername'].'</option>';
								}
								?>
						  </select>
                        </div>
						<div class="form-group">
                            <label> Choose Templates *</label>
                            <select class="form-control" name="emailtemplatesId">
								<option value="">Select </option>
								<?php 
								foreach($allEmail as $av){
									$selected = ($av['emailtemplatesId']==$emailtemplatesId) ? 'selected':'' ;
									echo '<option '.$selected.' value="'.$av['emailtemplatesId'].'">'.$av['heading'].'</option>';
								}
								?>
						   </select>
                        </div>
						
						<div class="form-group">
                            <label> Smtp Message </label>
                            <input class="form-control" name="smtpMessage" value="<?php echo $smtpMessage;?>" placeholder="Type smtp message here">
                        </div>
						<div class="form-group">
                            <?php echo $alertMsg2;?>
                            <label>Upload File</label>
                            <input type="file" name="file">
                            <p class="help-block">Upload file <?php echo $fileArr['document'];?></p>
                            <?php if($file) echo '<a target="_blank" href="'.$MEDIA_FILES_SRC.'/document/'.$file.'">Uploaded Document</a>'; ?>
                        </div>
												
					</div>
						
					</div>
				</div>
					
                <div class="panel-footer">
                    <input type="hidden" name="SourceForm" value="addEditSendeMail">
                    <input type="hidden" name="editid" value="<?php echo $sendEmailId;?>">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $redirectToBack;?>'">Back</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/';?>';">Exit</button>
                </div>
            </form>
        </div>
		</div>
    
</div>