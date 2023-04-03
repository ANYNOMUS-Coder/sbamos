<?php if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

if($_SESSION['ADMIN_USERALISENAME'])
    $avatarName =  $_SESSION['ADMIN_USERALISENAME'];
elseif($_SESSION['ADMIN_USERNAME'])
    $avatarName =  $_SESSION['ADMIN_USERNAME'];
else
    $avatarName =  'User';

echo '
    <!-- partial:../../partials/_navbar.html -->
    <nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex align-items-top flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
            <div class="me-3">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-bs-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            </div>
            <div>
            <a class="navbar-brand brand-logo" href="'.$SITE_LOC_PATH.'/admin/">
                <img src="'.$SITE_LOC_PATH.'/admin/templates/images/logo.svg" alt="logo" />
            </a>
            <a class="navbar-brand brand-logo-mini" href="'.$SITE_LOC_PATH.'/admin/">
                <img src="'.$SITE_LOC_PATH.'/admin/templates/images/logo.svg" alt="logo" />
            </a>
            </div>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-top"> 
            ';
            include ('site_heading.php');
        echo '
            <ul class="navbar-nav ms-auto">
                <!--
                <li class="nav-item dropdown d-none d-lg-block">
                    <a class="nav-link dropdown-bordered dropdown-toggle dropdown-toggle-split" id="messageDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false"> Select Category </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="messageDropdown">
                        <a class="dropdown-item py-3" >
                            <p class="mb-0 font-weight-medium float-left">Select category</p>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item preview-item">
                            <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">Bootstrap Bundle </p>
                            <p class="fw-light small-text mb-0">This is a Bundle featuring 16 unique dashboards</p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">Angular Bundle</p>
                            <p class="fw-light small-text mb-0">Everything you’ll ever need for your Angular projects</p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">VUE Bundle</p>
                            <p class="fw-light small-text mb-0">Bundle of 6 Premium Vue Admin Dashboard</p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-item-content flex-grow py-2">
                            <p class="preview-subject ellipsis font-weight-medium text-dark">React Bundle</p>
                            <p class="fw-light small-text mb-0">Bundle of 8 Premium React Admin Dashboard</p>
                            </div>
                        </a>
                    </div>
                </li>
                -->
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator" id="notificationDropdown" href="#" data-bs-toggle="dropdown">
                    <i class="icon-mail icon-lg"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="notificationDropdown">
                    <a class="dropdown-item py-3 border-bottom">
                        <p class="mb-0 font-weight-medium float-left">You have 4 new notifications </p>
                        <span class="badge badge-pill badge-primary float-right">View all</span>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                        <i class="mdi mdi-alert m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                        <h6 class="preview-subject fw-normal text-dark mb-1">Application Error</h6>
                        <p class="fw-light small-text mb-0"> Just now </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                        <i class="mdi mdi-settings m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                        <h6 class="preview-subject fw-normal text-dark mb-1">Settings</h6>
                        <p class="fw-light small-text mb-0"> Private message </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item py-3">
                        <div class="preview-thumbnail">
                        <i class="mdi mdi-airballoon m-auto text-primary"></i>
                        </div>
                        <div class="preview-item-content">
                        <h6 class="preview-subject fw-normal text-dark mb-1">New user registration</h6>
                        <p class="fw-light small-text mb-0"> 2 days ago </p>
                        </div>
                    </a>
                    </div>
                </li>
                <li class="nav-item dropdown"> 
                    <a class="nav-link count-indicator" id="countDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="icon-bell"></i>
                    <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list pb-0" aria-labelledby="countDropdown">
                    <a class="dropdown-item py-3">
                        <p class="mb-0 font-weight-medium float-left">You have 7 unread mails </p>
                        <span class="badge badge-pill badge-primary float-right">View all</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                            <img src="'.$SITE_LOC_PATH.'/admin/templates/images/faces/face10.jpg" alt="image" class="img-sm profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow py-2">
                        <p class="preview-subject ellipsis font-weight-medium text-dark">Marian Garner </p>
                        <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                        <img src="'.$SITE_LOC_PATH.'/admin/templates/images/faces/face12.jpg" alt="image" class="img-sm profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow py-2">
                        <p class="preview-subject ellipsis font-weight-medium text-dark">David Grey </p>
                        <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                        </div>
                    </a>
                    <a class="dropdown-item preview-item">
                        <div class="preview-thumbnail">
                        <img src="'.$SITE_LOC_PATH.'/admin/templates/images/faces/face1.jpg" alt="image" class="img-sm profile-pic">
                        </div>
                        <div class="preview-item-content flex-grow py-2">
                        <p class="preview-subject ellipsis font-weight-medium text-dark">Travis Jenkins </p>
                        <p class="fw-light small-text mb-0"> The meeting is cancelled </p>
                        </div>
                    </a>
                    </div>
                </li>
                <li class="nav-item dropdown d-none d-lg-block user-dropdown">
                    <a class="nav-link" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                    <img class="img-xs rounded-circle" src="'.getAdminAvatar('PROFILE_SSN').'" alt="Profile image"> </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                    <div class="dropdown-header text-center">
                        <img class="img-md rounded-circle" src="'.getAdminAvatar('PROFILE_SSN').'" alt="Profile image">
                        <p class="mb-1 mt-3 font-weight-semibold">'.$avatarName.'</p>
                        <p class="fw-light text-muted mb-0">'.$_SESSION['ADMIN_USERMAIL'].'</p>
                    </div>
                    <a class="dropdown-item" href="'.$SITE_LOC_PATH.'/admin/?pageType=usermanagement&dtls=userlist&dtaction=add&editid='.$_SESSION['ADMIN_USERID'].'&redirect='.base64_encode($redirectString).'"><i class="dropdown-item-icon mdi mdi-account-outline text-primary me-2"></i> My Profile <!--<span class="badge badge-pill badge-danger">1</span>--></a>
                    <a class="dropdown-item" href="'.$SITE_LOC_PATH.'/admin/?pageType=accountmanagement&dtaction=account&redirect='.base64_encode($redirectString).'"><i class="dropdown-item-icon mdi mdi mdi-settings text-primary me-2"></i> Settings</a>
                    <a class="dropdown-item" href="'.$SITE_LOC_PATH.'/admin/?logout=true"><i class="dropdown-item-icon mdi mdi-power text-primary me-2"></i>Sign Out</a>
                    </div>
                </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-bs-toggle="offcanvas">
            <span class="mdi mdi-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
';

/*
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <div class="row">
                <div class="col-md-4">
                    <button type="button" class="navbar-toggle collapsed">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
    
                </div>
                <div class="col-md-8">
                    <div class="search_menu_holder">
                        <div class="search_admin">
                            <form role="search">
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Search">
                                </div>
                            </form>
                        </div>
                        <ul class="user-menu">
                            <li class="dropdown pull-right">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <?php
                                    if($_SESSION['ADMIN_USERIMAGE'])
                                        echo '<img class="user-img" src="'.getAdminAvatar().'">';
                                    else
                                        echo '<i class="fa fa-user-circle" aria-hidden="true"></i>';
                                    echo '&nbsp;';
                                    if($_SESSION['ADMIN_USERALISENAME'])
                                        echo $_SESSION['ADMIN_USERALISENAME'];
                                    elseif($_SESSION['ADMIN_USERNAME'])
                                        echo $_SESSION['ADMIN_USERNAME'];
                                    else
                                        echo 'User';
                                    ?>
                                    <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                <!-- <li><a href="#"><svg class="glyph stroked male-user"><use xlink:href="#stroked-male-user"></use></svg> Profile</a></li>-->
                                    <li><a href="<?php echo $SITE_LOC_PATH.'/admin/?pageType=accountmanagement&dtaction=account';?>"><svg class="glyph stroked gear"><use xlink:href="#stroked-gear"></use></svg> Settings</a></li>
                                    <li><a href="<?php echo $SITE_LOC_PATH.'/admin/?logout=true';?>"><svg class="glyph stroked cancel"><use xlink:href="#stroked-cancel"></use></svg> Logout</a></li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div><!-- /.container-fluid -->
</nav>
*/