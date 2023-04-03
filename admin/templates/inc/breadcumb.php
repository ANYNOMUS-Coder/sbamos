<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

if($pageType) {
    
    echo '
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb border-0 p-0 m-0">
            <li class="breadcrumb-item"><a class="text-decoration-none" href="'.$SITE_LOC_PATH.'/admin/">Home</a></li>
            ';
            if($dtls) {
                
                echo '<li class="breadcrumb-item"><a class="text-decoration-none" href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageTypeModuleName['nameForDeveloper'].'">'.$pageTypeModuleName['moduleName'].'</a></li>
                <li class="breadcrumb-item"><a class="text-decoration-none" href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageTypeModuleName['nameForDeveloper'].'&dtaction='.$dtlsModuleName['nameForDeveloper'].'">'.$dtlsModuleName['moduleName'].'</a></li>
                <li class="breadcrumb-item active" aria-current="page">'.ucfirst($dtaction).'</li>';
            }
            else {
                if(!$dtaction){

                    echo ($pageType) ? '<li class="breadcrumb-item active" aria-current="page">' : '';
                    echo $pageTypeModuleName['moduleName'].'</li>';   
                }
                else {
                    
                    echo '<li class="breadcrumb-item"><a class="text-decoration-none" href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageTypeModuleName['nameForDeveloper'].'">'.$pageTypeModuleName['moduleName'].'</a></li>
                    <li class="breadcrumb-item active" aria-current="page">'.$dtactionModuleName['moduleName'].'</li>';
                }
            }

        echo '
        </ol>
    </nav>
    ';
}