<?php if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");?>
<form action="" method="post" id="site-content-form" enctype="multipart/form-data">
    <div class="panel-heading">
        <?php if($_SESSION['ADMIN_USERTYPE']=='S') {?>
        Manage Content - <?php echo ($indvCntData) ? 'Edit '.$indvCntData['heading'].' or <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtls.'&dtaction='.$dtaction.'&editid='.$editid.'&redirect='.$redirect.'">Add new form</a>' : 'Add new';?>  
        <?php } ?>
    </div>
    <div class="panel-body">
        <div class="col-md-6">
            <div class="form-group">
                <label>Content Heading *</label>
                <input class="form-control" name="heading" value="<?php echo $heading;?>" placeholder="Type content heading here">
            </div>
            
            <!--<div class="form-group">
                <label>Sub Heading</label>
                <input class="form-control" name="subHeading" value="<?php echo $subHeading;?>" placeholder="Type content sub heading here">
            </div>-->
            <?php if($_SESSION['ADMIN_USERTYPE']=='S') 
            {
                ?>
                <div class="form-group">
                    <label>Parent Content</label>

                    <select class="form-control" name="parentId" <?php if($parentId==0 && $indvCntData) echo 'disabled';?> >
                        <option value="0">Mother Content</option>
                        <?php
                        foreach($motherArr[0] as $mv){ 
                            ?>
                            <option <?php if($parentId==$mv['contentId'] ) echo 'selected';?> value="<?php echo $mv['contentId'];?>"><?php echo $mv['heading'];?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <?php 
            } 
            else 
                echo '<input type="hidden" name="parentId" value="'.$mv['contentId'].'">';
            ?>
            <!--<div class="form-group">
                <label>Swap No</label>
                <input class="form-control" name="swapNo" value="<?php echo $swapNo;?>" placeholder="Type swapNo">
            </div>-->
            <div class="form-group">
                <label>Content Image</label>
                <input type="file" name="contentImage">
                <p class="help-block">Upload JPEG or png image of size <?php echo $imgInfoArr['content']['large']['w'].'*'.$imgInfoArr['content']['large']['h']?> px</p>
                <?php
                if($contentImage){
                    echo '<img src="'.$targetPathSrc.'/'.$contentImage.'" style="max-height:150px; max-width:100%">';
                }    
                ?>
            </div>
            <div class="form-group">
                <label>Sub list heading </label>
                <input class="form-control" name="subListHeading" value="<?php echo $subListHeading;?>" placeholder="Type sub list heading here">
            </div>
            <div class="form-group">
                <label>Sub list caption</label>
                <input class="form-control" name="subListCaption" value="<?php echo $subListCaption;?>" placeholder="Type sub list caption here">
            </div>
            <!--<div class="form-group">
                <label>Twitter Link</label>
                <input class="form-control" name="tw" value="<?php echo $tw;?>" placeholder="Type content twitter link here">
            </div>
            <div class="form-group">
                <label>Facebook Link</label>
                <input class="form-control" name="fb" value="<?php echo $fb;?>" placeholder="Type content facebook link here">
            </div>
            <div class="form-group">
                <label>Google Plus Link</label>
                <input class="form-control" name="gp" value="<?php echo $gp;?>" placeholder="Type content google plus link here">
            </div>-->
            <div class="form-group">
                <label>Button Name</label>
                <input class="form-control" name="btnName" value="<?php echo $btnName;?>" placeholder="Type content button name here">
            </div>
            <div class="form-group">
                <label>Button URL</label>
                <input class="form-control" name="btnURL" value="<?php echo $btnURL;?>" placeholder="Type content button url here">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option <?php if($status=='Y' ) echo 'selected';?> value="Y">Active</option>
                    <option <?php if($status=='N' ) echo 'selected';?> value="N">Inactive</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <!--<div class="form-group">
                <label>Short describtion</label>
                <textarea name="shortDescribtion" class="form-control" id="short_describtion" rows="3" placeholder="Type short description here"><?php echo $shortDescribtion;?></textarea>
            </div>-->
            <div class="form-group">
                <label>Describtion</label>
                <textarea name="describtion" class="form-control" id="describtion" rows="3" placeholder="Type description here"><?php echo $describtion;?></textarea>
            </div>
            <div class="form-group">
                <label>Heading on Image ?</label>
                <label class="radio-inline"><input value="Y" <?php if($headingOnImage=='Y') echo 'checked';?> type="radio" name="headingOnImage">Yes</label>
                <label class="radio-inline"><input value="N" <?php if($headingOnImage=='N') echo 'checked';?> type="radio" name="headingOnImage">No</label>
            </div>
        </div>
    </div>
    <div class="panel-footer">
        <input type="hidden" name="SourceForm" value="addEditContent">
        <input type="hidden" name="contentId" value="<?php echo $contentId;?>">
        <input type="submit" class="btn btn-primary" name="submit" value="Submit">
        <button type="reset" class="btn btn-default">Reset</button>
        <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $redirectToBack;?>'">Back</button>
        <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/';?>';">Exit</button>
    </div>
</form>
