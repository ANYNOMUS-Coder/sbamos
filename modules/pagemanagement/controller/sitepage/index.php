<?php 
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$pgObj = new adminPage;
if(!$parent) $parent=0;
?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            <?php
            if($_SESSION['ADMIN_USERTYPE']=='S'){
                ?>
                <div class="panel-heading tableheadng">
                    All pages are listed here
                    <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&parent='.$parent.'&redirect='.base64_encode($redirectString);?>">Add new</a>
                </div>
                <?php
            }
            ?>
                <div class="panel-body">
                    <!--<div class="fixed-table-toolbar">
                        <div class="columns btn-group pull-right">
                            <button title="Refresh" name="refresh" type="button" class="btn btn-default"><i class="glyphicon glyphicon-refresh icon-refresh"></i></button>
                            <button title="Toggle" name="toggle" type="button" class="btn btn-default"><i class="glyphicon glyphicon glyphicon-list-alt icon-list-alt"></i></button>
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
                            <input type="text" placeholder="Search" class="form-control">
                        </div>
                        <div class="pull-right search srchfields">
                            <select class="form-control">
                                <option>Select</option>
                            </select>
                        </div>
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
                                    <div class="th-inner sortable">Page Name<span class="order"><span style="margin: 10px 5px;" class="caret"></span></span>
                                    </div>
                                </th>
                                <!--<th style="">
                                    <div class="th-inner sortable">
                                        Image
                                    </div>
                                </th>-->
                                <th style="">
                                    <div class="th-inner sortable">
                                        Sub Pages
                                    </div>
                                </th>
                                <th style="">
                                    <div class="th-inner sortable">Is Top?</div>
                                </th>
                                <th style="">
                                    <div class="th-inner sortable">Is Footer?</div>
                                </th>
								<th style="">
                                    <div class="th-inner sortable">Is Side?</div>
                                </th>
                                <th style="">
                                    <div class="th-inner sortable">Settings</div>
                                </th>
                            </tr>
                        </thead>
                        <tbody class="tdsortable">
                        <?php
                        $parent      = (is_numeric($parent)) ? $parent : 0;
                        $ExtraQryStr = "parentId=".$parent." order by swapNo"; 
                        $pgData = $pgObj -> getPage($ExtraQryStr,0,999);
                        if($pgData){
                            foreach($pgData as $pk=>$pv){
                                $strchngto  = ($pv['status']=='Y') ? 'N' : 'Y';
                                $strchngtoT = ($pv['isTop']=='Y') ? 'N' : 'Y';
                                $strchngtoF = ($pv['isFooter']=='Y') ? 'N' : 'Y';
								$strchngtoS = ($pv['isSide']=='Y') ? 'N' : 'Y';
                                
                                $stsImg = ($pv['status']=='Y') ? '<svg class="glyph stroked checkmark"><use xlink:href="#stroked-checkmark" /></svg>' : '<svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel" /></svg>';
                                
                                $isTop = ($pv['isTop']=='Y') ? '#00A63F': '#cccccc';
                                $isFooter = ($pv['isFooter']=='Y') ? '#00A63F': '#cccccc';
                                $isSide = ($pv['isSide']=='Y') ? '#00A63F': '#cccccc';
                                ?>
                                <tr id="<?php echo $pv['pageId'];?>">
                                    <!--<td class="bs-checkbox">
                                        <input type="checkbox" name="toolbar1" data-index="0">
                                    </td>-->
                                    <td style=""><?php echo $pk+1;?></td>
                                    <td style="">
                                        <a href="<?php echo ($_SESSION['ADMIN_USERTYPE']=='S') ? $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&editid='.$pv['pageId'].'&redirect='.base64_encode($redirectString) : 'javascript:void(0)';?>">
                                            <?php echo $pv['pageName'];?>
                                        </a>
                                    </td>
                                    <!--<td style="">
                                        <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=image&editid='.$pv['pageId'].'&redirect='.base64_encode($redirectString);?>">
                                            Add
                                        </a>
                                    </td>-->
                                    <td style="">
                                        <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtaction='.$dtaction.'&parent='.$pv['pageId'];?>">
                                            <?php echo $pgObj ->  existPage('parentId='.$pv['pageId']);?>
                                        </a>
                                    </td>
                                    <td><a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=status&dtcontent=top&chngid='.$pv['pageId'].'&strchngto='.$strchngtoT.'&redirect='.base64_encode($redirectString);?>" style="color:<?php echo $isTop;?>; font-weight:bold">T</a></td>
                                    <td><a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=status&dtcontent=footer&chngid='.$pv['pageId'].'&strchngto='.$strchngtoF.'&redirect='.base64_encode($redirectString);?>" style="color:<?php echo $isFooter;?>; font-weight:bold">F</a></td>
									 <td><a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=status&dtcontent=side&chngid='.$pv['pageId'].'&strchngto='.$strchngtoS.'&redirect='.base64_encode($redirectString);?>" style="color:<?php echo $isSide;?>; font-weight:bold">S</a></td>
                                    <td style="">
                                    <?php
                                    /*if($_SESSION['ADMIN_USERTYPE']=='S'){*/
                                        ?>    
                                        <a class="listsetting" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&editid='.$pv['pageId'].'&redirect='.base64_encode($redirectString);?>">
                                            <svg class="glyph stroked pencil">
                                                <use xlink:href="#stroked-pencil" />
                                            </svg>
                                        </a>
                                        <?php
                                    /*}*/
                                    ?>
                                        <a class="listsetting" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=status&chngid='.$pv['pageId'].'&strchngto='.$strchngto.'&redirect='.base64_encode($redirectString);?>">
                                            <?php echo $stsImg;?>
                                        </a>
                                    <?php 
                                    if($_SESSION['ADMIN_USERTYPE']=='S'){
                                        ?>    
                                        <a class="listsetting deletealert" data-alartmsg="Child Pages will be deleted forever" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=delete&deleteid='.$pv['pageId'].'&redirect='.base64_encode($redirectString);?>">
                                            
                                            <svg class="glyph stroked trash">
                                                <use xlink:href="#stroked-trash" />
                                            </svg>
                                        </a>
                                        <?php
                                    }
                                    ?>
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
                    <!--<div class="fixed-table-pagination">
                        <div class="pull-left pagination-detail"><span class="pagination-info">Showing 1 to 10 of 21 rows</span><span class="page-list"><span class="btn-group dropup"><button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button"><span class="page-size">10</span> <span class="caret"></span></button>
                            <ul role="menu" class="dropdown-menu">
                                <li class="active"><a href="javascript:void(0)">10</a></li>
                                <li><a href="javascript:void(0)">25</a></li>
                                <li><a href="javascript:void(0)">50</a></li>
                                <li><a href="javascript:void(0)">100</a></li>
                            </ul>
                            </span> records per page</span>
                        </div>
                        <div class="pull-right pagination">
                            <ul class="pagination">
                                <li class="page-first disabled"><a href="javascript:void(0)">&lt;&lt;</a></li>
                                <li class="page-pre disabled"><a href="javascript:void(0)">&lt;</a></li>
                                <li class="page-number active disabled"><a href="javascript:void(0)">1</a></li>
                                <li class="page-number"><a href="javascript:void(0)">2</a></li>
                                <li class="page-number"><a href="javascript:void(0)">3</a></li>
                                <li class="page-next"><a href="javascript:void(0)">&gt;</a></li>
                                <li class="page-last"><a href="javascript:void(0)">&gt;&gt;</a></li>
                            </ul>
                        </div>
                    </div>-->
                </div>
            </div>
        </div>
    </div>