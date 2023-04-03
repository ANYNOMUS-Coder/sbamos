<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$cntObj = new viewContent;
$ExtraQryStr = 'parentId=0 and pageId="'.addslashes($pageId).'"';
$cntData = $cntObj -> getMultipleContent($ExtraQryStr,0,999);
if($cntData){
    if(sizeof($cntData)>1){
        ?>
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="main-page">
                            <div class="history-list-warp">
                            <?php
                            foreach($cntData as $cnk=>$cnv){
                                ?>
                                <div class="item-history-post">
                                    <p class="title-history"><span><i class="fa fa-check-circle" aria-hidden="true"></i></span><?php echo $cnv['heading'];?></p>
                                    <?php echo str_replace('{{SITE_LOC_PATH}}',$SITE_LOC_PATH,$cnv['describtion']);?>
                                </div>
                                <?php
                            }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }
    else{
        $cntImg = ($cntData[0]['contentImage'] && file_exists($MEDIA_FILES_ROOT.'/content/large/'.$cntData[0]['contentImage'])) ? $MEDIA_FILES_SRC.'/content/large/'.$cntData[0]['contentImage'] : $STYLE_FILES_SRC.'/images/no-image-content.jpg';
        
        $ExtraQryStr = 'parentId='.$cntData[0]['contentId'].' and pageId="'.addslashes($pageId).'"';
        $subCntData = $cntObj -> getMultipleContent($ExtraQryStr,0,999);
        ?>
        <!--<section class="no-padding">-->
        <section>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="whyus-about">
                            <div class="col-md-6">
                                <div class="left-whyus-h2">
                                    <div class="demo-style-1-warp">
                                        <img src="<?php echo $cntImg;?>" class="img-responsive" alt="<?php echo $cntData[0]['heading'];?>" alt="<?php echo $cntData[0]['heading'];?>">
                                        <?php
                                        if($cntData[0]['headingOnImage']=='Y'){
                                            ?>
                                            <div class="demo-style-1-box-text right">
                                                <p><?php echo $cntData[0]['heading'];?></p>
                                            </div>
                                            <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="">
                                    <div class="iconbox-warp ">
                                        <h3 class="title-mix"><?php echo $cntData[0]['heading'];?></h3>
                                        <?php echo str_replace('{{SITE_LOC_PATH}}',$SITE_LOC_PATH,$cntData[0]['describtion']);
                                        if($cntData[0]['btnName']){
                                            echo '<a rel="nofollow" target="_blank" href="'.$cntData[0]['btnURL'].'" class="btn btn-primary">'.$cntData[0]['btnName'].'</a>';
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="whyus-about col-md-12">
                            <?php
                            if($cntData[0]['subListHeading'] || $cntData[0]['subListCaption']){
                                ?>
                                <div class="title-block text-center title-pd">
                                    <span class="top-title "></span>
                                    <h2><?php echo $cntData[0]['subListHeading'];?></h2>
                                    <p class="sub-title"><?php echo $cntData[0]['subListCaption'];?></p>
                                    <span class="bottom-title"></span>
                                </div>
                                <?php
                            }

                            foreach($subCntData as $scdv){
                                ?>
                                <blockquote>
                                    <h4><?php echo $scdv['heading'];?></h4>
                                    <p><?php echo $scdv['describtion'];?></p>
                                </blockquote>
                                <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php
    }   
}
else
    $generalObj -> redirectToUrl($SITE_LOC_PATH.'/comming-soon/');
?>