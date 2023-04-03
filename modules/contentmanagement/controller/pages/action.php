<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); 

if($SourceForm == 'imageCropForm' && $submit){
    if($x1!='' && $y1!='' && $x2!='' && $y2!='' && $width!='' && $height!=''){
        $imgData = $generalObj -> getImageById($editid);
        
        $infoArr = array();
        $infoArr['x1']          = $x1;
        $infoArr['y1']          = $y1;
        $infoArr['x2']          = $x2;
        $infoArr['y2']          = $y2;
        $infoArr['width']       = $width;
        $infoArr['height']      = $height;
        $infoArr['posWidth']    = $posWidth;
        $infoArr['posHeight']   = $posHeight;
        
        $params             = array();
        $params['cropInfo'] = json_encode($infoArr);
        $update             = $generalObj -> updateImageByimgId($params,$editid);
        if($update){ 
            
            copy($MEDIA_FILES_ROOT.'/service/normal/'.$imgData['path'], $MEDIA_FILES_ROOT.'/service/croped/'.$imgData['path']);
            
            $filename = $MEDIA_FILES_ROOT.'/service/croped/'.$imgData['path'];
            // Get dimensions of the original image
            list($current_width, $current_height) = getimagesize($filename);

            // The x and y coordinates on the original image where we
            // will begin cropping the image
            $left   = ($x1/$posWidth)*$current_width;
            $top    = ($y1/$posHeight)*$current_height;

            // This will be the final size of the image (e.g. how many pixels
            // left and down we will be going)
            $crop_width     = ($width/$posWidth)*$current_width;
            $crop_height    = ($height/$posHeight)*$current_height;

            // Resample the image
            $canvas = imagecreatetruecolor($crop_width, $crop_height);
            $current_image = imagecreatefromjpeg($filename);
            imagecopy($canvas, $current_image, 0, 0, $left, $top, $current_width, $current_height);
            imagejpeg($canvas, $filename, 100);
            
            $alertMsg = alert('SUCCESS','Image croped successfully');
            
        }
    }
    else
        $alertMsg = alert('ERROR','Drag image area!');
}

if($SourceForm == 'addImage' && $submit){
    $obj            = new adminServiceList;
    $data           = $obj -> getListById($editid);
    
    $imageCountType = $data['imageCountType'];
    $table = TBL_SERVICE_LIST;
    $targetPath = $ROOT_PATH.'/uploadedfiles/service/normal/';
    
    $imgExtnArr = array('gif','png','jpeg','jpg','JPG','JPEG','PNG','GIF');
    
    if($_FILES['image']['size']>0 && $name!=''){
        
        $path=$_FILES['image']['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        if(in_array($ext, $imgExtnArr)){
            $newFileName = rand(1000,9999).'_'.time().'.'.$ext;
            $imageRow = $generalObj -> countImageInfo($editid,$table);
            if($imageCountType == 'S'){
                if($imageRow==0){
                    if(move_uploaded_file($_FILES['image']['tmp_name'],$targetPath.$newFileName)){
                    
                        $params                 = array();
                        $params['linkId']       = $editid;
                        $params['linkTable']    = $table;
                        $params['name']         = $name;
                        $params['isPrimary']    = 'Y';
                        $params['path']         = $newFileName;
                        $params['status']       = 'Y';
                        $params['swapNo']       = 0;
                        $params['entryDate']    = date('Y-m-d H:i:s');
                        $insert = $generalObj -> newImage($params);
                        
                        if($insert)
                            $alertMsg = alert('SUCCESS','Image inserted successfully');
                        else
                            $alertMsg = alert('ERROR','Error occured while inserting!');
                    }
                    else
                        $alertMsg = alert('ERROR','Error occured while uploading!');
                }
                else
                    $alertMsg = alert('ERROR','Only one image is allowed!');
            }
            elseif($imageCountType == 'M'){
                if(move_uploaded_file($_FILES['image']['tmp_name'],$targetPath.$newFileName)){
                    $params                 = array();
                    $params['linkId']       = $editid;
                    $params['linkTable']    = $table;
                    $params['name']         = $name;
                    $params['isPrimary']    = ($imageRow==0) ? 'Y' : 'N';
                    $params['path']         = $newFileName;
                    $params['status']       = 'Y';
                    $params['swapNo']       = 0;
                    $params['entryDate']    = date('Y-m-d H:i:s');
                    $insert = $generalObj -> newImage($params);
                    if($insert)
                        $alertMsg = alert('SUCCESS','Image inserted successfully');
                    else
                        $alertMsg = alert('ERROR','Error occured while inserting!');
                }
                else
                    $alertMsg = alert('ERROR','Error occured while uploading!');
            }
        }
        else
            $alertMsg = alert('ERROR','Only JPEG or PNG or GIF image supported!');
    }
    else
        $alertMsg = alert('ERROR','All * marked fields are mandatory!');
}

if($SourceForm == 'addEditContent' && $submit){
    if($heading!=''){
        $obj = new adminContent;
        
        $params                     = array();
        $params['pageId']           = $editid;
        $params['parentId']         = ($parentId) ? $parentId : '0';
        $params['heading']          = $heading;
        $params['subHeading']       = $subHeading;
        $params['subListHeading']   = $subListHeading;
        $params['subListCaption']   = $subListCaption;
        $params['describtion']      = $describtion;
        $params['shortDescribtion'] = $shortDescribtion;
        //$params['tw']             = $tw;
        //$params['fb']             = $fb;
        //$params['gp']             = $gp;
        $params['btnName']          = $btnName;
        $params['btnURL']           = $btnURL;
        $params['status']           = $status;
        $params['headingOnImage']   = ($headingOnImage) ? $headingOnImage : 'N';
        
            if($contentId && $obj -> getContentById($contentId)){
                $update = $obj -> updateContentByContentId($params,$contentId);
                if($update)
                    $alertMsg = alert('SUCCESS','Form updated successfully.');
                else
                    $alertMsg = alert('ERROR','Network error!');
            }
            else{
                $params['swapNo']        = '0';
                $params['entryDate']     = date('Y-m-d H:i:s');
                $contentId = $obj -> newContent($params);
                $alertMsg = alert('SUCCESS','Form inserted successfully.');

            }
        
            $targetPath = $ROOT_PATH.'/uploadedfiles/content';
            if($_FILES['contentImage']['name']!=''){
                if(in_array(pathinfo($_FILES['contentImage']['name'],PATHINFO_EXTENSION), $imgTypeArr) ){
                    $contentData = $obj -> getContentById($contentId);
                    $imageName   = time().'-content.'.pathinfo($_FILES['contentImage']['name'],PATHINFO_EXTENSION);
                    
                    foreach($imgInfoArr['content'] as $iik=>$iiv){ 
                        $targetPathTo = $targetPath.'/'.$iik.'/'.$imageName;
                        if($contentData['contentImage']) unlink($targetPath.'/'.$iik.'/'.$contentData['contentImage']);
                        uploadFile($_FILES['contentImage'], $targetPathTo, $iiv['w'],  $iiv['h'], false, true );
                    }

                    $params                       = array();
                    $params['contentImage']       = $imageName;
                    
                    $update = $obj -> updateContentByContentId($params,$contentId);
                } 
                else
                    $alertMsg_CNT = alert('ERROR',implode(',',$imgTypeArr).' are allowd!');
            }
    }
    else
        $alertMsg = alert('ERROR','All * marked fields are mandatory!');
}
?>