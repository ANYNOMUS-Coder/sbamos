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

echo '
<div class="row">
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Form elements</h4>
                <p class="card-description">
                    Basic form elements
                </p>
                <form class="forms-sample" action="" method="post" enctype="multipart/form-data">
                    '.$alertMsg.'
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Full Name  *</label>
                                <input class="form-control" name="name" value="'.$name.'" placeholder="Type full name here">
                            </div>
                            <div class="form-group">
                                <label>Alias Name</label>
                                <input class="form-control" name="aliasName" value="'.$aliasName.'" placeholder="Type alias name here">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Phone</label>
                                <input class="form-control" name="phone" value="'.$phone.'" placeholder="Type phone here">
                            </div>
                            '.$alertMsg2.'
                            <div class="form-group">
                                <label>Upload Profile Image (Size should be '.$imgInfoArr['userImage']['large']['w'].'*'.$imgInfoArr['userImage']['large']['h'].' px)</label>
                                <input class="form-control" type="file" name="userImage">
                            </div>
                            ';
                            echo '<a target="_blank" href="'.getAdminAvatar($userImage,'normal').'"><img src="'.getAdminAvatar($userImage,'large').'"></a>';
                            echo '
                        </div>
                    </div>
                    <input type="hidden" name="csrfToken" value="'.formToken('addEditUser', $CSRF_TOKEN).'"/>
                    <input type="hidden" name="editid" value="'.$userId.'" />
                    <input type="hidden" name="SourceForm" value="addEditUser">
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