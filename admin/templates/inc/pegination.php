<?php 
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

echo '
<div class="row">';
    $totalRow = $recordNo;
    if($totalRow>ADMINPEGINATION) {
        $ppv = ($perpagevalue) ? $perpagevalue : ADMINPEGINATION;
        $ppvArr = [ADMINPEGINATION,100,200,500];
        echo '
        <div class="col-md-6 d-flex flex-row align-items-center">
            <p class="m-0">Showing '.(($limit*($page-1))+1) .' to '. ($limit*$page) .' of '. $totalRow.' rows </p>
            <div class="dropdown ms-1 me-1">
                <button class="btn btn-danger btn-sm dropdown-toggle" type="button" id="dropdownMenuSizeButton3" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    '.$ppv.'
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuSizeButton3">
                ';
                foreach($ppvArr as $ppvv) {
                    $ppvAtive = ($ppv==$ppvv) ? 'active' : '';
                    echo '<a class="dropdown-item '.$ppvAtive.'" href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtaction='.$dtaction.'&perpagevalue='.$ppvv.'">'.$ppvv.'</a>';
                }
                echo '
                </div>
            </div>
            <p class="m-0"> records per page</p>
        </div>
        ';
    }
    $pageBtns = $pgntn -> peginate($totalRow,$limit,$page,$QUERY_STRING_PATH,'yes');
    echo '
    <div class="col-md-6">
        <nav aria-label="Page navigation example">
            '.$pageBtns.'
        </nav>
    </div>
</div>';