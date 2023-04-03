<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$pgObj      = new adminPage;
$pgData     = $pgObj -> getPage('status="Y" and moduleId=14 order by swapNo',0,999);

$motherArr  = array();
$childArr   = array();

foreach($pgData as $pv){
       $motherArr[$pv['parentId']][] = $pv;
}
/*echo '<pre>';
print_r($motherArr);
echo '</pre>';*/
if(!empty($motherArr)){
    foreach($motherArr[0] as $mk=>$mv){
        ?>
        <div class="row seperater">
            <div class="col-xs-12 col-md-6 col-lg-3">
                <div class="panel panel-blue panel-widget">
                    <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&editid='.$mv['pageId'].'&redirect='.base64_encode($redirectString);?>">
                        <div class="row no-padding myscreenmenu">
                            <div class="col-sm-3 col-lg-5 widget-left">
                                <svg class="glyph stroked blank document">
                                    <use xlink:href="#stroked-blank-document" />
                                </svg>
                            </div>
                            <div class="col-sm-9 col-lg-7 widget-right">
                                <div class="text-muted"><?php echo $mv['pageName']; ?></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
            <?php
            foreach($motherArr[$mv['pageId']] as $smv){
                ?>
                <div class="col-xs-12 col-md-6 col-lg-3">
                    <div class="panel panel-teal panel-widget">
                        <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&editid='.$smv['pageId'].'&redirect='.base64_encode($redirectString);?>">
                            <div class="row no-padding myscreenmenu">
                                <div class="col-sm-3 col-lg-5 widget-left">
                                    <svg class="glyph stroked blank document">
                                        <use xlink:href="#stroked-blank-document" />
                                    </svg>
                                </div>
                                <div class="col-sm-9 col-lg-7 widget-right">
                                    <div class="text-muted"><?php echo $smv['pageName']; ?></div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
        <?php
    }
}
else
    echo 'No CMS pages are created';
?>