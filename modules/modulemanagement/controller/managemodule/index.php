<?php 
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$obj = new adminModules;
$pgntn  = new Page;

$ExtraQryStr    =  (is_numeric($parent)) ? "parentModuleId=".$parent : "parentModuleId=0";
$ExtraQryStr    .= ($searchkeyword) ? ' and moduleName LIKE "%'.addslashes($searchkeyword).'%"' : '';

$totalRow = $obj -> existModule($ExtraQryStr);

echo '
<div class="row">
    <div class="col-lg-12 grid-margin">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">
                ';
                    echo ($redirectToBack) ? '<a href="'.$redirectToBack.'" class="btn btn-social-icon btn-dark btn-rounded pt-3"><i class="ti-angle-left"></i></a>&nbsp;' : '';
                    echo $totalRow.' '.$dtactionModuleName['moduleName'].'&nbsp;';
                    echo '<a class="btn btn-primary btn-sm" href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&parent='.$parent.'&redirect='.base64_encode($redirectString).'"><i class="fa fa-plus" aria-hidden="true"></i> Add new</a>';
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
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>
                                    Sl. No
                                </th>
                                <th>
                                    Module Name
                                </th>
                                <th>
                                    Sub Modules
                                </th>
                                <th>
                                    Module Identity
                                </th>
                                <th>
                                    Settings
                                </th>
                            </tr>
                        </thead>

                        <tbody id="sortable">
                        ';
                        $orderBy = 'swapNo ASC';
                        $limit = ($perpagevalue) ? $perpagevalue : PEGINATION;
                        $page  = ($page)? $page : 1;
                        $start = $pgntn -> startPegination($page,$limit);
                        $arrData = $obj -> getModules($ExtraQryStr,$start,$limit,'*',$orderBy);

                        foreach($arrData as $arrKey=>$arrVal) {
                            $strchngto = ($arrVal['status']=='Y') ? 'N' : 'Y';
                            $stsColor = ($arrVal['status']=='Y') ? 'btn-success' : 'btn-danger';
                            $stsIcon = ($arrVal['status']=='Y') ? '<i class="mdi mdi-check"></i>' : '<i class="mdi mdi-window-close"></i>';
                            $subMdlNo = $obj -> countModulesByParentModuleId($arrVal['moduleId']);
                            echo '
                            <tr id="'.$arrVal['moduleId'].'" data-initpos="'.((($page-1)*$limit)+1).'">
                                <td>'.((($page-1)*$limit)+1+$arrKey).'</td>
                                <td>'.$arrVal['moduleName'].'</td>
                                <td>
                                    <a class="text-decoration-none" href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtaction='.$dtaction.'&parent='.$arrVal['moduleId'].'&redirect='.base64_encode($redirectString).'">
                                        Sub Module ('.$subMdlNo.')
                                    </a>
                                </td>
                                <td>'.$arrVal['nameForDeveloper'].'</td>
                                <td>
                                    <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&editid='.$arrVal['moduleId'].'&redirect='.base64_encode($redirectString).'" class="btn btn-sm btn-primary"><i class="mdi mdi-table-edit"></i></a>
                                    <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=status&chngid='.$arrVal['moduleId'].'&strchngto='.$strchngto.'&redirect='.base64_encode($redirectString).'" class="btn btn-sm '.$stsColor.' confirmalert" data-title="Are you sure?" data-msg="Record will be hidden in your site or app!">'.$stsIcon.'</a>
                                    <a href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=delete&deleteid='.$arrVal['moduleId'].'&redirect='.base64_encode($redirectString).'" class="btn btn-sm btn-danger confirmalert" data-title="Are you sure?" data-msg="Once deleted, you will not be able to recover this imaginary file!"><i class="mdi mdi mdi-delete"></i></a>
                                </td>
                            </tr>
                            ';
                        }
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