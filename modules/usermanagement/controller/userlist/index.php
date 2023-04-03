<?php 
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$obj = new adminUser;
$pgntn  = new Page;

$returnArr  = array($_SESSION['ADMIN_USERID']);
$childUser  = getChildIdsByParentUserId($returnArr,$obj,$_SESSION['ADMIN_USERID']);

$ExtraQryStr = ($parent && is_array($childUser) && in_array($parent,$childUser)) ? "parentUserId=".$parent : "userId=".$_SESSION['ADMIN_USERID'];
$ExtraQryStr    .= ($searchkeyword) ? ' and (name LIKE "%'.addslashes($searchkeyword).'%" OR aliasName LIKE "%'.addslashes($searchkeyword).'%" OR email LIKE "%'.addslashes($searchkeyword).'%" OR username LIKE "%'.addslashes($searchkeyword).'%")' : '';

$totalRow = $obj -> existUser($ExtraQryStr);



echo '
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                ';
                    echo ($redirectToBack) ? '<a href="'.$redirectToBack.'" class="btn btn-social-icon btn-dark btn-rounded pt-3"><i class="ti-angle-left"></i></a>&nbsp;' : '';
                    echo $totalRow.' '.$dtactionModuleName['moduleName'].'&nbsp;';
                    echo ($parent) ? '<a class="btn btn-primary btn-sm" href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=credential&parent='.$parent.'&redirect='.base64_encode($redirectString).'"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>' : '';
                echo '</h4>';

                echo ($dtactionModuleName['instruction']) ? '
                <p class="card-description">
                    '.$dtactionModuleName['instruction'].'
                </p>' : '';

                echo '
                <div class="mt-4 mb-5">
                    <form action="" method="get">
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" placeholder="Search" name="searchkeyword" value="'.$searchkeyword.'">
                            </div>
                            <div class="col">
                                <button type="submit" class="btn btn-primary btn-sm">Search</button>
                                <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtaction='.$dtaction.'" class="btn btn-secondary btn-sm">Clear</a>
                                <input type="hidden" name="pageType" value="'.$pageType.'">
                                <input type="hidden" name="dtaction" value="'.$dtaction.'">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>
                                    Sl. No
                                </th>
                                <th>
                                    Name
                                </th>
                                <th>
                                    Child / Sub
                                </th>
                                <th>
                                    Date
                                </th>
                                <th>
                                    Settings
                                </th>
                            </tr>
                        </thead>

                        <tbody id="">
                        ';
                        $orderBy = 'entryDate DESC';
                        $limit = ($perpagevalue) ? $perpagevalue : PEGINATION;
                        $page  = ($page)? $page : 1;
                        $start = $pgntn -> startPegination($page,$limit);
                        $arrData = $obj -> getUser($ExtraQryStr,$start,$limit,'*',$orderBy);

                        if($arrData) {
                            foreach($arrData as $arrKey=>$arrVal) {
                                $strchngto = ($arrVal['status']=='Y') ? 'N' : 'Y';
                                $stsColor = ($arrVal['status']=='Y') ? 'btn-success' : 'btn-danger';
                                $stsIcon = ($arrVal['status']=='Y') ? '<i class="mdi mdi-check"></i>' : '<i class="mdi mdi-window-close"></i>';
                                $subMdlNo = $obj -> countUserByparentUserId($arrVal['userId']);
                                echo '
                                <tr id="'.$arrVal['userId'].'" data-initpos="'.((($page-1)*$limit)+1).'">
                                    <td>'.((($page-1)*$limit)+1+$arrKey).'</td>
                                    <td>'.$arrVal['name'].' ('.$arrVal['username'].')</td>
                                    <td>
                                        <a class="text-decoration-none" href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtaction='.$dtaction.'&parent='.$arrVal['userId'].'&redirect='.base64_encode($redirectString).'">
                                            Sub User ('.$subMdlNo.')
                                        </a>
                                    </td>
                                    <td>'.$arrVal['entryDate'].'</td>
                                    <td>
                                        <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=permission&editid='.$arrVal['userId'].'&redirect='.base64_encode($redirectString).'" class="btn btn-sm btn-primary"><i class="mdi mdi-file-tree"></i></a>
                                        <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=credential&parent='.$arrVal['parentUserId'].'&editid='.$arrVal['userId'].'&redirect='.base64_encode($redirectString).'" class="btn btn-sm btn-primary"><i class="mdi mdi-lock"></i></a>
                                        <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&editid='.$arrVal['userId'].'&redirect='.base64_encode($redirectString).'" class="btn btn-sm btn-primary"><i class="mdi mdi-table-edit"></i></a>
                                        <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=status&chngid='.$arrVal['userId'].'&strchngto='.$strchngto.'&redirect='.base64_encode($redirectString).'" class="btn btn-sm '.$stsColor.' confirmalert" data-title="Are you sure?" data-msg="Record will be hidden in your site or app!">'.$stsIcon.'</a>
                                        <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=delete&deleteid='.$arrVal['userId'].'&redirect='.base64_encode($redirectString).'" class="btn btn-sm btn-danger confirmalert" data-title="Are you sure?" data-msg="Once deleted, you will not be able to recover this imaginary file!"><i class="mdi mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                                ';
                            }
                        }
                        else
                            echo '<tr><td colspan="10" class="text-center">No records found</td></tr>';
                        
                        echo '
                        </tbody>
                    </table>
                </div>
                ';
                include($ROOT_PATH.'/admin/templates/inc/pegination.php');

            echo '    
            </div>
        </div>
    </div>
</div>
';

/*
<?php 
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$userObj    = new adminUser;

?>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading tableheadng">
                    All users are listed here
                    <?php if($parent) echo '<a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=credential&parent='.$parent.'&redirect='.base64_encode($redirectString).'">Add new</a>';?>
                    <?php if($redirect) echo '<a href="'.$redirectToBack.'">Précédent</a>';?>
                </div>
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
                                    <div class="th-inner sortable">User Name
                                        <!--<span class="order"><span style="margin: 10px 5px;" class="caret"></span></span>-->
                                    </div>
                                </th>
                                <th style="">
                                    <div class="th-inner sortable">Child User</div>
                                </th>
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
                        if(!$parent) 
                            $ExtraQryStr  =  "userId=".$_SESSION['ADMIN_USERID'];
                        else    
                            $ExtraQryStr  =  (in_array($parent,$childUser)) ? "parentUserId=".$parent : "userId=".$_SESSION['ADMIN_USERID'];
                        $userData       = $userObj -> getUser($ExtraQryStr,0,50);
                        if($userData){
                            foreach($userData as $uk=>$uv){
                                $strchngto = ($uv['status']=='Y') ? 'N' : 'Y';
                                $stsImg = ($uv['status']=='Y') ? '<i style="color:#008542" class="fa fa-check" aria-hidden="true"></i>' : '<i style="color:#ff0000" class="fa fa-times" aria-hidden="true"></i>';
                                ?>
                                <tr>
                                    <!--<td class="bs-checkbox">
                                        <input type="checkbox" name="toolbar1" data-index="0">
                                    </td>-->
                                    <td style=""><?php echo $uk+1;?></td>
                                    <td style="">
                                        <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&editid='.$uv['userId'].'&parent='.$uv['parentUserId'].'&redirect='.base64_encode($redirectString);?>">
                                            <?php echo $uv['username'];?>
                                        </a>
                                    </td>
                                    <td style="">
                                        <a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtaction='.$dtaction.'&parent='.$uv['userId'].'&redirect='.base64_encode($redirectString);?>">
                                            <?php echo $userObj -> countUserByparentUserId($uv['userId']);?>
                                        </a>
                                    </td>
                                    <td style=""><?php echo $uv['entryDate'];?></td>
                                    <td style="">
                                        <a class="listsetting" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=permission&editid='.$uv['userId'].'&redirect='.base64_encode($redirectString);?>">
                                            <i class="fa fa-key" aria-hidden="true"></i>
                                        </a>
                                        <a class="listsetting" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&editid='.$uv['userId'].'&redirect='.base64_encode($redirectString);?>">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </a>
                                        <a class="listsetting" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=credential&parent='.$uv['parentUserId'].'&editid='.$uv['userId'].'&redirect='.base64_encode($redirectString);?>">
                                            <i class="fa fa-unlock-alt" aria-hidden="true"></i>
                                        </a>
                                        <a class="listsetting" href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=status&chngid='.$uv['userId'].'&strchngto='.$strchngto.'&redirect='.base64_encode($redirectString);?>">
                                            <?php echo $stsImg;?>
                                        </a>
                                        
                                        <a class="listsetting deletealert" data-alartmsg="Are you sure? " href="<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=delete&deleteid='.$uv['userId'].'&redirect='.base64_encode($redirectString);?>">
                                            
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
    */