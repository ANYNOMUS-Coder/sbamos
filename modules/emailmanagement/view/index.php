<?php 
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$faqObj         = new viewFaq;
$contentObj     = new viewContent;
$contentData    = $contentObj -> getMultipleContentByModuleId($pageMl,0,999);
?>
<section class="row missin-benefits">
    <div class="container">
        <div class="row mis-be ipad-width">
            <?php
            if($contentData){
                ?>
                <div class="col-md-6 col-sm-12 col-xs-12 mission-it">
                    <?php 
                    foreach($contentData As $cont){
                        echo '<h3 class="this-title">'.$cont["heading"].'</h3>';
                        echo $cont["describtion"];
                    } 
                    ?>
                </div>
                <?php
            }
            ?>
            <div class="col-md-6 col-sm-12 col-xs-12 benefit-it">
                <h3 class="this-title pl">FAQs</h3>

                <div class="panel-group benefit-accordion" role="tablist" aria-multiselectable="true">
                <?php
                $ExtraQryStr = '1';
                $faqData = $faqObj -> getFaq($ExtraQryStr,0,999);
                if(count($faqData))
                {
                    $faqCount = 0;
                    foreach($faqData as $faqk=>$faq)
                    {
                        $faqCount++;
                        ?>
                        <div class="panel panel-default">
                            <div class="panel-heading" role="tab" id="heading<?php echo $faqk;?>">
                                <h4 class="panel-title">
                                        <a role="button" data-toggle="collapse" data-parent=".benefit-accordion" href="#collapse<?php echo $faqk;?>" aria-expanded="true" aria-controls="collapse<?php echo $faqk;?>">
                                            <?php echo $faq['heading']; ?>
                                        </a>
                                    </h4>
                            </div>
                            <div id="collapse<?php echo $faqk;?>" class="panel-collapse collapse <?php echo ($faqk==0) ? 'in' : '';?>" role="tabpanel" aria-labelledby="heading<?php echo $faqk;?>">
                                <div class="panel-body">
                                    <?php echo $faq['description']; ?>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                else
                    echo 'No data available';
                ?>  
                </div>
            </div>
        </div>
    </div>
</section>