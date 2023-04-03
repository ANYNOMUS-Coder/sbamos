<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
foreach($motherArr[0] as $mv){        
    $strchngto = ($mv['status']=='Y') ? 'N' : 'Y';
    $stsImg = ($mv['status']=='Y') ? '<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark" /></svg>' : '<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel" /></svg>';
    ?>
    <div class="panel panel-default">
        <div class="panel-heading tableheadng">
            <?php echo $mv['heading'];?>
            <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtls.'&dtaction='.$dtaction.'&editid='.$mv['pageId'].'&contentId='.$mv['contentId'].'&redirect='.$redirect;?>">Edit</a>
            
            <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtls.'&dtaction=status&chngid='.$mv['contentId'].'&strchngto='.$strchngto.'&redirect='.base64_encode($redirectString);?>"><?php echo $stsImg.'Status';?></a>
            <?php if($_SESSION['ADMIN_USERTYPE']=='S') {?>
            <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtls.'&dtaction=delete&deleteid='.$mv['contentId'].'&redirect='.base64_encode($redirectString);?>" class="deletealert" data-alartmsg="Are you sure?">Delete</a>
            <?php } ?>
        </div>
        <?php if($motherArr[$mv['contentId']]){ ?>
        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th style="">
                            <div class="th-inner sortable">Sl. No</div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Page Heading<span class="order"><span style="margin: 10px 5px;" class="caret"></span></span>
                            </div>
                        </th>
                        <!--<th style="">
                            <div class="th-inner sortable">
                                Image
                            </div>
                        </th>-->
                        <th style="">
                            <div class="th-inner sortable">Created Date</div>
                        </th>
                        <th style="">
                            <div class="th-inner sortable">Settings</div>
                        </th>
                    </tr>
                </thead>
                <tbody>
                <?php                
                foreach($motherArr[$mv['contentId']] as $smk=>$smv){
                    $strchngto = ($smv['status']=='Y') ? 'N' : 'Y';
                    $stsImg = ($smv['status']=='Y') ? '<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark" /></svg>' : '<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel" /></svg>';
                    ?>
                    <tr>
                        <td style=""><?php echo $smk+1;?></td>
                        <td style="">
                            <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtls.'&dtaction='.$dtaction.'&editid='.$smv['pageId'].'&contentId='.$smv['contentId'].'&redirect='.$redirect;?>">
                                <?php echo $smv['heading'];?>
                            </a>
                        </td>
                        <!--<td style="">
                            <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=image&editid='.$smv['contentId'].'&redirect='.base64_encode($redirectString);?>">
                                Add
                            </a>
                        </td>-->
                        <td style=""><?php echo gatTime($smv['entryDate']);?></td>
                        <td style="">
                            <a class="listsetting" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtls.'&dtaction='.$dtaction.'&editid='.$smv['pageId'].'&contentId='.$smv['contentId'].'&redirect='.$redirect;?>">
                                <svg class="glyph stroked pencil">
                                    <use xlink:href="#stroked-pencil" />
                                </svg>
                            </a>
                            <a class="listsetting" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtls.'&dtaction=status&chngid='.$smv['contentId'].'&strchngto='.$strchngto.'&redirect='.base64_encode($redirectString);?>">
                                <?php echo $stsImg;?>
                            </a>

                            <a class="listsetting deletealert" data-alartmsg="Are you sure?" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtls.'&dtaction=delete&deleteid='.$smv['contentId'].'&redirect='.base64_encode($redirectString);?>">

                                <svg class="glyph stroked trash">
                                    <use xlink:href="#stroked-trash" />
                                </svg>
                            </a>
                        </td>
                    </tr>
                    <?php
                }                
                ?>
                </tbody>
            </table>
        </div>
        <?php } ?>
    </div>
    <?php
    }
?>
