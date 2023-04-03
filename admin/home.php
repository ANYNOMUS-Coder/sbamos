<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

echo '
    <div class="container-scroller">

        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
            <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                <div class="ps-lg-1">
                <div class="d-flex align-items-center justify-content-between">
                    <p class="mb-0 font-weight-medium me-3 buy-now-text">This projet is under development phase with dummy demo records.</p>
                    <a href="" target="_blank" class="btn me-2 buy-now-btn border-0">Get Live</a>
                </div>
                </div>
                <div class="d-flex align-items-center justify-content-between">
                <a href="'.$SITE_LOC_PATH.'"><i class="mdi mdi-home me-3 text-white"></i></a>
                <button id="bannerClose" class="btn border-0 p-0">
                    <i class="mdi mdi-close text-white me-0"></i>
                </button>
                </div>
            </div>
            </div>
        </div>
        ';

        include ($ROOT_PATH.'/admin/templates/inc/header.php');

echo '

        <div class="container-fluid page-body-wrapper">
            <!-- partial:../../partials/_settings-panel.html -->
            <div class="theme-setting-wrapper">
                <div id="settings-trigger"><i class="ti-settings"></i></div>
                <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border me-3"></div>Light</div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border me-3"></div>Dark</div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
                </div>
            </div>
            ';
            include ($ROOT_PATH.'/admin/templates/inc/sidebar.php');
echo '            
            <div class="main-panel">
                <div class="content-wrapper">
                ';

                if($pageType){
                    $moduleVerify = getVerifiedByPageType($pageTypeModuleName['moduleId'],$permission);
                    if($moduleVerify){
                        if(!$dtls){
                            if($dtaction){
                                $subModuleVerify = getVerifiedByPageType($dtactionModuleName['moduleId'],$permission);
                                if($subModuleVerify){
                                    if(file_exists($ROOT_PATH.'/modules/'.$pageType.'/controller/'.$dtaction.'/content.php')) 
                                        include ($ROOT_PATH.'/modules/'.$pageType.'/controller/'.$dtaction.'/content.php');
                                    include ($ROOT_PATH.'/modules/'.$pageType.'/controller/'.$dtaction.'/index.php');
                                }
                                else
                                    echo 'Access Denied!';
                            }
                            else{
                                $ExtraQryStr = "parentModuleId=".$pageTypeModuleName['moduleId']." and status='Y'";
                                $subModuleData = $generalObj -> getModule($ExtraQryStr,0,999,$permission);
                                if($subModuleData){
                                    echo '
                                    <div class="row">
                                    ';
                                    foreach($subModuleData as $smdv){
                                        $smi = ($smdv['moduleIcon']) ? $smdv['moduleIcon'] : 'mdi-floor-plan';
                                        echo '
                                        <div class="col-md-4 col-lg-3 grid-margin stretch-card">
                                            
                                            <div class="card bg-primary card-rounded">
                                                <div class="card-body pb-0">
                                                    <a class="text-decoration-none" href="'.$SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtaction='.$smdv['nameForDeveloper'].'">
                                                        <h4 class="card-title card-title-dash text-white mb-4">'.$smdv['moduleName'].'</h4>
                                                        <div class="row">
                                                            <div class="col-sm-4">
                                                                <p class="status-summary-ight-white mb-1 text-dark">Record No</p>
                                                                <h2 class="text-info">357</h2>
                                                            </div>
                                                            <div class="col-sm-8">
                                                                <div class="status-summary-chart-wrapper pb-4 text-end">
                                                                    <i class="mdi '.$smi.' icon-lg text-info"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                            
                                        </div>
                                        ';
                                    }
                                    echo '</div>';
                                }
                                else
                                    echo 'No Menus has been permitted!';
                            }
                        }
                        else{
                            $subModuleVerify = getVerifiedByPageType($dtlsModuleName['moduleId'],$permission);
                            if($subModuleVerify){
                                if(file_exists($ROOT_PATH.'/modules/'.$pageType.'/controller/'.$dtls.'/action.php') && $REQUEST_METHOD==='POST') 
                                    include ($ROOT_PATH.'/modules/'.$pageType.'/controller/'.$dtls.'/action.php');
                                include ($ROOT_PATH.'/modules/'.$pageType.'/controller/'.$dtls.'/'.$dtaction.'.php');
                            }
                            else
                                echo 'Access Denied!';
                        }
                    }
                    else
                        echo 'Access Denied!';
                    
                }
                else
                    include ($ROOT_PATH.'/modules/sitehome/controller/dashboardhome/dashboard.php');
                    
                echo '</div>';
                include ($ROOT_PATH.'/admin/templates/inc/footer.php');
            echo '
            </div>
        </div>
    </div>
';