<?php if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

echo '
<ul class="navbar-nav">
    <li class="nav-item font-weight-semibold d-none d-lg-block ms-0">
        <h1 class="welcome-text"><span id="welcome-text"></span>, <span class="text-black fw-bold">'.$avatarName.'</span></h1>
        ';
        include ('breadcumb.php');
    echo '
        <!--<h3 class="welcome-sub-text fw-bolder text-primary">'.$pageTypeModuleName['moduleName'].'</h3>-->
    </li>
</ul>
';

/*
<h1 class="page-header">
    <?php 
    if($dtaction){
        if($dtls)
            echo ucfirst($dtaction).' '.ucfirst($dtlsModuleName['moduleName']);
        else
            echo ucfirst($dtactionModuleName['moduleName']);
    }
    else{
        if($pageType)
            echo ucfirst($pageTypeModuleName['moduleName']);
        else
            echo 'Dashboard';
    }
    ?>
</h1>
*/