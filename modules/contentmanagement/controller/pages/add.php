<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$cntObj     = new adminContent;
$cntData    = $cntObj -> getContent('pageId='.addslashes($editid).' order by swapNo',0,999);
$motherArr  = array();
foreach($cntData as $cv){
       $motherArr[$cv['parentId']][] = $cv;
}

/*echo '<pre>';
print_r($motherArr);
echo '</pre>';*/

?>
<div class="row">
    <div class="col-lg-12">
        <?php echo $alertMsg;?>
        <div class="panel panel-default">
            <?php 
            if($contentId){
                $indvCntData = $cntObj -> getContentById($contentId);
                if($indvCntData){
                    foreach($indvCntData as $indk=>$indv){
                        $$indk = $indv;
                    }
                    $targetPathSrc      = $MEDIA_FILES_SRC.'/content/thumb';
                }    
            }    
            else{
                $headingOnImage = 'N';
            }
            if($_SESSION['ADMIN_USERTYPE']=='S' || $contentId)
                include ('content-form.php'); 
            ?>
        </div>
        <?php include ('content-list-view.php'); ?>
    </div>
</div>