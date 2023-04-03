<?php 
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$obj = new adminEmailTemplates;
$pgntn  = new Page;
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading tableheadng">
                    <?php 
                    echo ($redirectToBack) ? '<a class="btb btn-sm btn-info" href="'.$redirectToBack.'">Précédent</a>' : '';
                    echo ($isDeleted=='Y') ? '<button class="btn btn-sm" type="button">'.$totalRow.'</button> DELETED Template&nbsp;' : '<button class="btn btn-sm" type="button">'.$totalRow.'</button> Template&nbsp;';
                    echo ($isDeleted=='Y') ? '
                        <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtaction='.$dtaction.'" class="btn btn-success btn-sm pull-right"><i class="fa fa-users" aria-hidden="true"></i> See Template list</a>  
                    ' : '
                        <a class="btn btn-sm btn-primary" href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&redirect='.base64_encode($redirectString).'"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>
                        <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtaction='.$dtaction.'&isDeleted=Y" class="btn btn-danger btn-sm pull-right"><i class="fa fa-trash" aria-hidden="true"></i> See Trush</a>
                    ';
                    ?>
                </div>
                <div class="panel-body">
                   <!--<div class="fixed-table-toolbar">
					<form action="" method="get">
                        <div class="columns btn-group pull-right">
                            <button title="Refresh" name="refresh" type="submit" class="btn btn-default"><i class="glyphicon glyphicon-refresh icon-refresh"></i></button>
                           <!--<button title="Toggle" name="toggle" type="button" class="btn btn-default"><i class="glyphicon glyphicon glyphicon-list-alt icon-list-alt"></i></button>
                            <div title="Columns" class="keep-open btn-group">
                                <button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button"><i class="glyphicon glyphicon-th icon-th"></i> <span class="caret"></span></button>
                                <ul role="menu" class="dropdown-menu srchfieldsdownstng">
                                    <li>
                                        <label>
                                            <input type="checkbox" checked="checked" value="1" data-field="id"> Item ID</label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" checked="checked" value="2" data-field="name"> Item Name</label>
                                    </li>
                                    <li>
                                        <label>
                                            <input type="checkbox" checked="checked" value="3" data-field="price"> Item Price</label>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        
                        <div class="pull-right search srchfields">
								<input name="searchkeyword" type="text" class="form-control" value="<?php echo $searchkeyword;?>"  placeholder="Search by Website or Source or Campaign">
						</div>
						
						<input type="hidden" name="pageType" value="<?php echo $pageType;?>">
						<input type="hidden" name="dtaction" value="<?php echo $dtaction;?>">
					</form>
                    </div>-->
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <!--<th style="width: 36px; " class="bs-checkbox ">
                                    <div class="th-inner ">
                                        <input type="checkbox" name="btSelectAll">
                                    </div>
                                </th>-->
                                <th style="">
                                    <div class="th-inner sortable">Sl. No</div>
                                </th>
                                <th style="">
                                    <div class="th-inner sortable"> Id
                                    </div>
                                </th>
                                <th style="">
                                    <div class="th-inner sortable"> Templates
                                    </div>
                                </th>
								<th style="">
                                    <div class="th-inner sortable">Settings</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $ExtraQryStr = '1';
													
                        $limit = ($perpagevalue) ? $perpagevalue : PEGINATION;
                        $page  = ($page)? $page : 1;
                        $start = $pgntn -> startPegination($page,$limit);
                        $ftrData = $obj ->getEmailTemplates($ExtraQryStr,$start,$limit);
                        $totalRow = $obj -> existEmailTemplates($ExtraQryStr);
									
                        if($ftrData){
                            foreach($ftrData as $bdk=>$bdv){
                                $strchngto = ($bdv['status']=='Y') ? 'N' : 'Y';
                                $stsImg = ($bdv['status']=='Y') ? '<i style="color:#008542" class="fa fa-check" aria-hidden="true"></i>' : '<i style="color:#ff0000" class="fa fa-times" aria-hidden="true"></i>';
                                ?>
                                <tr id="<?php echo $bdv['emailtemplatesId'];?>" >
                                    <!--<td class="bs-checkbox">
                                        <input type="checkbox" name="toolbar1" data-index="0">
                                    </td>-->
                                    <td style=""><?php echo (($page-1)*$limit)+1+$bdk;?></td>
                                    <td style="">
                                        <?php echo $bdv['emailtemplatesId'];?>
                                    </td>
                                    <td>
                                        <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&editid='.$bdv['emailtemplatesId'].'&redirect='.base64_encode($redirectString);?>">
                                            <?php echo $bdv['heading'];?>
                                        </a>
                                    </td>
                                  
																		 
                                    <td style="">
                                        <a title="Edit" class="listsetting" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&editid='.$bdv['emailtemplatesId'].'&redirect='.base64_encode($redirectString);?>">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a title="status" class="listsetting" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=status&chngid='.$bdv['emailtemplatesId'].'&strchngto='.$strchngto.'&redirect='.base64_encode($redirectString);?>">
                                            <?php echo $stsImg;?>
                                        </a>
                                        
                                        <a title="Delete" class="listsetting deletealert" data-alartmsg="Are you sure? " href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=delete&deleteid='.$bdv['emailtemplatesId'].'&redirect='.base64_encode($redirectString);?>">
                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php
                            }
                        }
                        else{
                            ?>
                            <tr><td colspan="10" align="center">No matching records found</td></tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                    <?php include($ROOT_PATH.'/admin/templates/inc/pegination.php');?>
                </div>
            </div>
        </div>
    </div>