<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

function resizeImagesWithSameAspectRatio($folder, $sizeInfoName, $filename, $imagename, $createtype=array('thumb'),$imgSprtArr,$MEDIA_FILES_ROOT) {
    $image = new ImageResize($filename);
            
    foreach($createtype as $ctv){
        if(in_array($ctv,$imgSprtArr)) {
            echo $sizeInfoName[$ctv]['w'];
            $image->resizeToBestFit($sizeInfoName[$ctv]['w'], $sizeInfoName[$ctv]['h']);
            $image->save($MEDIA_FILES_ROOT.'/'.$folder.'/'.$ctv.'/'.$imagename);
        }
    }
} 

function uploadFile($file, $targetPath, $expectedWidth=false, $expectedHeight=false, $expectedExtention=false, $crop=false) {
    
    $image = new ImageResize($file['tmp_name']);
    
    if($expectedExtention=='JPEG' || $expectedExtention=='JPG')
        $expectedExtention = IMAGETYPE_JPEG;
    elseif($expectedExtention=='PNG')
        $expectedExtention = IMAGETYPE_PNG;
    elseif($expectedExtention=='GIF')
        $expectedExtention = IMAGETYPE_GIF;
    if(!$crop){
        if($expectedWidth && !$expectedHeight){
            $image->resizeToWidth($expectedWidth);
            if(!$expectedExtention) $image->save($targetPath); else $image->save($targetPath,$expectedExtention);
        }    
        elseif(!$expectedWidth && $expectedHeight){
            $image->resizeToHeight($expectedHeight);
            if(!$expectedExtention) $image->save($targetPath); else $image->save($targetPath,$expectedExtention);
        }    
        elseif($expectedWidth && $expectedHeight){
            $image->resizeToBestFit($expectedWidth, $expectedHeight);
            if(!$expectedExtention) $image->save($targetPath); else $image->save($targetPath,$expectedExtention);
        }    
        elseif(!$expectedWidth && !$expectedHeight){
            if(!$expectedExtention) $image->save($targetPath); else $image->save($targetPath,$expectedExtention);
        }
    }
    else{
        if($expectedWidth && $expectedHeight){
            $image->crop($expectedWidth, $expectedHeight);
            if(!$expectedExtention) $image->save($targetPath); else $image->save($targetPath,$expectedExtention);
        }
        elseif(!$expectedWidth && $expectedHeight){
            $expectedWidth = $image->getSourceWidth();
            $image->crop($expectedWidth, $expectedHeight);
            if(!$expectedExtention) $image->save($targetPath); else $image->save($targetPath,$expectedExtention);
        }
        elseif($expectedWidth && !$expectedHeight){
            $expectedHeight = $image->getSourceHeight();
            $image->crop($expectedWidth, $expectedHeight);
            if(!$expectedExtention) $image->save($targetPath); else $image->save($targetPath,$expectedExtention);
        }
        elseif(!$expectedWidth && !$expectedHeight){
            $expectedWidth = $image->getSourceWidth();
            $expectedHeight = $image->getSourceHeight();
            $image->crop($expectedWidth, $expectedHeight);
            if(!$expectedExtention) $image->save($targetPath); else $image->save($targetPath,$expectedExtention);
        }
    }    

    return file_exists($targetPath);
}