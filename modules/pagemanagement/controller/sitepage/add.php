<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$pgObj = new adminPage;
$mdlObj = new adminModules;
$mdlData = $mdlObj -> getModules("parentModuleId=0 and moduleId not in (1,3,12)",0,999999);

if($editid){
    $pgData                 = $pgObj -> getPageById($editid);
    foreach($pgData as $key=>$val){
        $$key = $val;
    }
}
else{
    $moduleId = '14';
    $parentId = ($_POST) ? $parentId : $parent;
}
$targetPathSrc  = $MEDIA_FILES_SRC.'/pageheaderimg/thumb';
?>
<div class="row">
    <div class="col-lg-12">
        <?php echo $alertMsg;?>
        <div class="panel panel-default">
            <form action="" method="post" id="site-page" enctype="multipart/form-data">
                <div class="panel-heading">Form Elements</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php
                            if($_SESSION['ADMIN_USERTYPE']!='S')
                                echo '<input type="hidden" name="parentId" value="'.$parentId.'">';
                            else{
                                echo '<label>Parent Page</label>';
                                $ExtraQryStr = 'parentId=0';
                                $allPgData = $pgObj -> getPage($ExtraQryStr,0,999);
                                ?>
                                <select name="parentId" class="form-control">
                                    <option <?php if($parentId==0) echo 'selected';?> value="0">Mother Page</option>
                                    <?php
                                    foreach($allPgData as $pgd){
                                        if($parentId==$pgd['pageId']) $sltdCls = 'selected'; else $sltdCls = '';
                                        echo '<option '.$sltdCls.' value="'.$pgd['pageId'].'">'.$pgd['pageName'].'</option>';
                                    }
                                    ?>
                                </select>
                                <?php
                            }
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Page Name *</label>
                            <input <?php if($_SESSION['ADMIN_USERTYPE']!='S') echo 'readonly';?> class="form-control" name="pageName" value="<?php echo $pageName;?>" placeholder="Type page name here" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Page Title </label>
                            <input class="form-control" name="subPageName" value="<?php echo $subPageName;?>" placeholder="Type page title here" autocomplete="off">
                        </div>
                        <div class="form-group">
                            <label>Page Caption </label>
                            <input class="form-control" name="pageCaption" value="<?php echo $pageCaption;?>" placeholder="Type page caption here" autocomplete="off">
                        </div>
                    </div>    
                    <div class="col-md-6">    
                        <div class="form-group">
                            <label>Page Icon (Font Awesome) </label>
                            <input <?php if($_SESSION['ADMIN_USERTYPE']!='S') echo 'readonly';?> class="form-control" name="pageIcon_fontAwesome" value="<?php echo $pageIcon_fontAwesome;?>" placeholder="Ex. fa fa-pencil" autocomplete="off">
                            <?php
                            if($pageIcon_fontAwesome) echo '<i class="'.$pageIcon_fontAwesome.'"></i>';
                            ?>
                        </div>
                        <div class="form-group">
                            <label>Page Permalink *</label>
                            <input <?php if($_SESSION['ADMIN_USERTYPE']!='S') echo 'readonly';?> class="form-control" name="permalink" value="<?php echo $permalink;?>" placeholder="Type page permalink here">
                        </div>
                        <div class="form-group">
                            <label>Page URL</label>
                            <input <?php if($_SESSION['ADMIN_USERTYPE']!='S') echo 'readonly';?> class="form-control" name="pageUrl" value="<?php echo $pageUrl;?>" placeholder="Type page redirect url here">
                        </div>
                        <div class="form-group">
                            <label>Page Info</label>
                            <textarea class="form-control" name="pageInfo" placeholder="Type page info in 50 words"><?php echo $pageInfo;?></textarea>
                        </div>
                    </div>
                </div>
                <div class="panel-body">    
                    <hr>
                    <div class="col-md-6 two-row-chkbx">
                        <div class="form-group">
                            <?php
                            if($_SESSION['ADMIN_USERTYPE']!='S')
                                echo '<input type="hidden" name="moduleId" value="'.$moduleId.'">';
                            else{
                                ?>
                                <label>Select Module *</label>
                                <?php
                                foreach($mdlData as $mdlV){
                                    ?>
                                    <div class="checkbox">
                                        <label>
                                            <input <?php if($_SESSION['ADMIN_USERTYPE']!='S') echo 'readonly';?> <?php if($mdlV['moduleId']==$moduleId) echo 'checked="checked"';?> name="moduleId" type="radio" value="<?php echo $mdlV['moduleId'];?>"> <?php echo $mdlV['moduleName'];?>
                                        </label>
                                    </div>
                                    <?php
                                }
                            }
                            ?>
                            <div class="clearfix clear"></div>
                        </div>
                    </div>    
                    <div class="col-md-6">
                        <div class="form-group">
                            <?php echo $alertMsgImg;?>
                            <label>Header Banner</label>
                            <input type="file" name="image">
                            <p class="help-block">Upload JPEG or png image of size <?php echo $imgInfoArr['pageheaderimg']['large']['w'].'*'.$imgInfoArr['pageheaderimg']['large']['h'];?> px.</p>
                            <?php
                            if($image){
                                echo '<img src="'.$targetPathSrc.'/'.$image.'" style="max-height:150px; max-width:100%">';
                            }    
                            ?>
                        </div>
                    </div>    
                </div>
                <div class="panel-body">
                    <hr>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Pick from Bottom Ad Content List</label>
                            <span class="clearfix clear"></span>
                            <ul class="list-group cstm-sort" id="sortable-1">
                            <?php
                            $files = explode(',',$bottomContent);
                            $bottomFiles = glob($STYLE_FILES_ROOT.'/adcontent/bottomcontent/*');
                            foreach($bottomFiles as $bfv ){
                                $fileName = str_replace($STYLE_FILES_ROOT.'/adcontent/bottomcontent/','',$bfv);
                                if(!in_array($fileName,$files)){
                                    ?>
                                    <li class="list-group-item" id="<?php echo $fileName;?>">
                                        <?php echo $fileName;?>
                                        <span class="cnt-drctn"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Drop Bottom Ad Content</label>
                            <input type="hidden" name="bottomContent" value="<?php echo $bottomContent;?>">
                            <span class="clearfix clear"></span>
                            <ul class="list-group cstm-sort" id="sortable-11">
                            <?php
                            if(trim($files[0])){
                                foreach($files as $fv){
                                $fileName = $fv;
                                    ?>
                                    <li class="list-group-item" id="<?php echo $fileName;?>">
                                        <?php echo $fileName;?>
                                        <span class="cnt-drctn"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Pick from Side Ad Content List</label>
                            <span class="clearfix clear"></span>
                            <ul class="list-group cstm-sort" id="sortable-2">
                            <?php
                            $files = explode(',',$sideContent);
                            $sideFiles = glob($STYLE_FILES_ROOT.'/adcontent/sidecontent/*');
                            foreach($sideFiles as $sfv ){
                                $fileName = str_replace($STYLE_FILES_ROOT.'/adcontent/sidecontent/','',$sfv);
                                if(!in_array($fileName,$files)){
                                    ?>
                                    <li class="list-group-item" id="<?php echo $fileName;?>">
                                        <?php echo $fileName;?>
                                        <span class="cnt-drctn"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Drop Side Ad Content</label>
                            <input type="hidden" name="sideContent" value="<?php echo $sideContent;?>">
                            <span class="clearfix clear"></span>
                            <ul class="list-group cstm-sort" id="sortable-22">
                            <?php
                            if(trim($files[0])){
                                foreach($files as $fv){
                                $fileName = $fv;
                                    ?>
                                    <li class="list-group-item" id="<?php echo $fileName;?>">
                                        <?php echo $fileName;?>
                                        <span class="cnt-drctn"><i class="fa fa-chevron-right" aria-hidden="true"></i></span>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="panel-footer">
                    <input type="hidden" name="SourceForm" value="addEditPageList">
                    <input type="hidden" name="editid" value="<?php echo $editid;?>">
                    <input type="submit" class="btn btn-primary" name="submit" value="Submit">
                    <button type="reset" class="btn btn-default">Reset</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $redirectToBack;?>'">Back</button>
                    <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/';?>';">Exit</button>
                </div>
            </form>
        </div>
    </div>
</div>