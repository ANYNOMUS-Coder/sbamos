<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$obj = new adminEmailTemplates;
if($editid){
    $dataArr = $obj -> getEmailTemplatesByemailtemplatesId($editid);
    
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
                            <label> Name *</label>
                            <input class="form-control" name="heading" value="<?php echo $heading;?>" placeholder="Type heading here">
                        </div>
						<div class="form-group">
                            <label> Subject *</label>
                            <input class="form-control" name="subject" value="<?php echo $subject;?>" placeholder="Type email subject here">
                        </div>
						<div class="form-group">
                            <label> Alt Message *</label>
                            <input class="form-control" name="altMessage" value="<?php echo $altMessage;?>" placeholder="Type email alt message here">
                        </div>
						
						<div class="form-group">
                            <label>Message Body *</label>
                            <div class="alert bg-info">
                                <p>The Name of recipents - [[TONAME]]</p>
                                <p>Activation Code URL - [[ACTIVATIONCODEURL]]</p>
                            </div>
                            <textarea id="editor" name="description" class="form-control" rows="3" placeholder="Type describtion here"><?php echo $description;?></textarea>
                        </div>
					</div>
						
					</div>
				</div>
					
                <div class="panel-footer">
                    <input type="hidden" name="SourceForm" value="addEditEmailTemplates">
                    <input type="hidden" name="editid" value="<?php echo $emailtemplatesId;?>">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $redirectToBack;?>'">Back</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/';?>';">Exit</button>
                </div>
            </form>
        </div>
		</div>
    
</div>