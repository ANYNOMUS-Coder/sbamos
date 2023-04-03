<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$obj = new adminSmtpConfiguration;
if($editid){
    $dataArr = $obj -> getSmtpConfigurationBysmtpId($editid);
    
    if($dataArr){
        foreach($dataArr as $key=>$value){
            $$key = $value;
        }
    }
}
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
                            <label> Smtp Host *</label>
                            <input class="form-control" name="smtpHost" value="<?php echo $smtpHost;?>" placeholder="Type smtp host here">
                        </div>
						<div class="form-group">
                            <label> Smtp Username *</label>
                            <input class="form-control" name="smtpUsername" value="<?php echo $smtpUsername;?>" placeholder="Type smtp username here">
                        </div>
						<div class="form-group">
                            <label> Smtp Password *</label>
                            <input class="form-control" name="smtpPassword" value="<?php echo $smtpPassword;?>" placeholder="Type smtp password here">
                        </div>
						<div class="form-group">
                            <label> Smtp Port *</label>
                            <input class="form-control" name="smtpPort" value="<?php echo $smtpPort;?>" placeholder="Type smtp port here">
                        </div>
						<div class="form-group">
                            <label> Smtp Secure</label>
                            <input class="form-control" name="smtpSecure" value="<?php echo $smtpSecure;?>" placeholder="Type smtp secure here">
                        </div>
						<div class="form-group">
                            <label> Smtp From Name *</label>
                            <input class="form-control" name="smtpFromName" value="<?php echo $smtpFromName;?>" placeholder="Type smtp from mail here">
                        </div>
						<div class="form-group">
                            <label> Smtp From Mail *</label>
                            <input class="form-control" name="smtpFromEmail" value="<?php echo $smtpFromEmail;?>" placeholder="Type smtp from mail here">
                        </div>
						<div class="form-group">
                            <label> Smtp Reply Name *</label>
                            <input class="form-control" name="smtpReplyName" value="<?php echo $smtpReplyName;?>" placeholder="Type smtp from mail here">
                        </div>
						<div class="form-group">
                            <label> Smtp Reply Mail *</label>
                            <input class="form-control" name="smtpReplyEmail" value="<?php echo $smtpReplyEmail;?>" placeholder="Type smtp from mail here">
                        </div>
												
					</div>
						
					</div>
				</div>
					
                <div class="panel-footer">
                    <input type="hidden" name="SourceForm" value="addEditSmtpConfiguration">
                    <input type="hidden" name="editid" value="<?php echo $smtpId;?>">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $redirectToBack;?>'">Back</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/';?>';">Exit</button>
                </div>
            </form>
        </div>
		</div>
    
</div>