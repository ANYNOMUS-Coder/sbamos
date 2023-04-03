<?php $RUNNING_SCRIPT= $_POST['RUNNING_SCRIPT']; if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

echo '
<div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
    <div class="content-wrapper d-flex align-items-center auth px-0">
        <div class="row w-100 mx-0">
        <div class="col-lg-4 mx-auto">
            <div class="auth-form-light text-left py-5 px-4 px-sm-5">
            <div class="brand-logo">
                <img src="'.$SITE_LOC_PATH.'/admin/templates/images/logo.svg" alt="logo">
            </div>
            <h4>Hello! let\'s get started</h4>
            <h6 class="fw-light">Sign in to continue.</h6>
            <form class="pt-3" id="admin_login_form" method="post">
                <span class="show_msg"></span>
                <div class="form-group">
                    <input type="text" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Username" name="username">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control form-control-lg" id="exampleInputPassword1" placeholder="Password" name="password">
                </div>
                <div class="mt-3">
                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">SIGN IN</button>
                    <input type="hidden" name="csrfToken" value="'.formToken('login5845875', $CSRF_TOKEN).'"/>
                    <input type="hidden" name="redirectUrl" value="'.$SITE_LOC_PATH.'/admin/?'.$QUERY_STRING_PATH.'"/>
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                        <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        Keep me signed in
                        </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <!--<div class="mb-2">
                    <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                        <i class="ti-facebook me-2"></i>Connect using facebook
                    </button>
                </div>
                <div class="text-center mt-4 fw-light">
                    Don\'t have an account? <a href="register.html" class="text-primary">Create</a>
                </div>-->
            </form>
            </div>
        </div>
        </div>
    </div>
    <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
';