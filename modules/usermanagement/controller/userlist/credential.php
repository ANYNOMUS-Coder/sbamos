<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$userObj = new adminUser;
if($editid){
    $arrData    = $userObj -> getUserByUserId($editid);
    if($arrData){
        foreach($arrData as $key=>$value){
            $$key = $value;
        }
    }
}
else
    $parentUserId   = ($_POST) ? $parentUserId : $parent;

$emailRestrict = ($_SESSION['ADMIN_USERID']==$editid) ? 'readonly' : '';

echo '
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form elements</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample" action="" method="post">
                    '.$alertMsg.'
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email</label>
                                <input '.$emailRestrict.' class="form-control" name="email" value="'.$email.'" placeholder="Type your email here">
                            </div>
                            <div class="form-group">
                                <label>Username  *</label>
                                <input class="form-control" name="username" value="'.$username.'" placeholder="Type module name here">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Pasword *</label>
                                <input class="form-control" name="orgPassword" value="" placeholder="Type file name here">
                            </div>
                            <div class="form-group">
                                <label>Confirm Pasword *</label>
                                <input class="form-control" name="corgPassword" value="" placeholder="Type file name here">
                            </div>
                        </div>
                    </div>
                    <input type="hidden" name="csrfToken" value="'.formToken('addEditUserCrendential', $CSRF_TOKEN).'"/>
                    <input type="hidden" name="editid" value="'.$userId.'" />
                    <input type="hidden" name="parent" value="'. $parentUserId.'">
                    <input type="hidden" name="SourceForm" value="addEditUserCrendential">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <button type="reset" class="btn btn-info">Reset</button>
                    <a class="btn btn-light" href="'.$redirectToBack.'">Précédent</a>
                    <a class="btn btn-light ms-1" href="'.$SITE_LOC_PATH.'/admin/">Exit</a>
                </form>
            </div>
        </div>
    </div>
</div>
';

/*
?>
<div class="row">
    <div class="col-lg-12">
        <?php echo $alertMsg;?>
        <div class="panel panel-default">
            <form action="" method="post">
                <div class="panel-heading">Form Elements</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Username  *</label>
                            <input class="form-control" name="username" value="<?php echo $username;?>" placeholder="Type module name here">
                        </div>
                        <div class="form-group">
                            <label>Pasword *</label>
                            <input class="form-control" name="orgPassword" value="<?php echo $orgPassword;?>" placeholder="Type file name here">
                        </div>
                        <div class="form-group">
                            <label>Confirm Pasword *</label>
                            <input class="form-control" name="corgPassword" value="<?php echo $corgPassword;?>" placeholder="Type file name here">
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="hidden" name="SourceForm" value="addEditUserCrendential">
                    <input type="hidden" name="editid" value="<?php echo $userId;?>">
                    <input type="hidden" name="parent" value="<?php echo $parentUserId;?>">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $redirectToBack;?>'">Back</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/';?>';">Exit</button>
                </div>
            </form>
        </div>
    </div>
</div>
*/