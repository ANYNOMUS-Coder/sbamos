<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); 
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
                            <label>Type Image Name *</label>
                            <input class="form-control" name="name" value="<?php echo $name;?>" placeholder="Type image name here">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Select Image *</label>
                            <input type="file" name="image">
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <input type="hidden" name="SourceForm" value="addImage">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $redirectToBack;?>'">Back</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/';?>';">Exit</button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-md-12 imgresarea">
    <?php
    $imageData = $generalObj -> getImageByTableAndLinkId(1,$editid,TBL_SERVICE_LIST, 0, 999);
    foreach($imageData as $iv){
        $crpericon = (file_exists($MEDIA_FILES_ROOT.'/service/croped/'.$iv['path'])) ? 'checkmark' : 'cancel';
        ?>
        <div class="imagesngl">
            <div class="croperror">
                <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtls.'&dtaction=image-crop&editid='.$iv['imgId'].'&redirect='.$redirectToBack;?>">
                    <svg class="glyph stroked <?php echo $crpericon;?>"><use xlink:href="#stroked-<?php echo $crpericon;?>"/></svg>
                </a>
            </div>
            <?php if($iv['isPrimary']=='Y'){?>
            <div class="primary">
                <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark" /></svg>
            </div>
            <?php } ?>
            <div class="fadeslider"></div>
            <img alt="<?php echo $iv['name'];?>" title="<?php echo $iv['name'];?>" src="<?php echo $MEDIA_FILES_SRC.'/service/normal/'.$iv['path'];?>">
            <div class="settings">
                <a class="listsetting" href="">
                    <svg class="glyph stroked key "><use xlink:href="#stroked-key"/></svg>
                </a>
                <a class="listsetting" href="">
                    <svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark" /></svg>
                </a>
                <a class="listsetting deletealert" data-alartmsg="Are you sure? " href="">
                    <svg class="glyph stroked trash"><use xlink:href="#stroked-trash" /></svg>
                </a>
            </div>
        </div>
        <?php
    }
    ?>
    </div>
</div>