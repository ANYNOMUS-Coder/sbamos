<?php
$breadcumb = '<ol class="breadcrumb">';
$breadcumb .= '<li><a href="https://perfectcapitalmarkets.com/"><i class="fa fa-home"></i></a></li>';

if($dtls){
    $breadcumb .= '<li><a href="'.$SITE_LOC_PATH.'/'.$pageType.'/">'.ucwords(strtolower(str_replace('-',' ',$pageType))).'</a></li>';
    $breadcumb .= '<li><a href="'.$SITE_LOC_PATH.'/'.$pageType.'/'.$dtls.'/">'.ucwords(strtolower(str_replace('-',' ',$dtls))).'</a></li>';
    $breadcumb .= '<li class="active">'.ucwords(strtolower(str_replace('-',' ',$dtaction))).'</li>';
}
else{
    if($dtaction){
        $breadcumb .= '<li><a href="'.$SITE_LOC_PATH.'/'.$pageType.'/">'.ucwords(strtolower(str_replace('-',' ',$pageType))).'</a></li>';
        $breadcumb .= '<li class="active">'.ucwords(strtolower(str_replace('-',' ',$dtaction))).'</li>';
    }
    else
        $breadcumb .= '<li class="active">'.ucwords(strtolower(str_replace('-',' ',$pageType))).'</li>';
}
$breadcumb .= '</ol>';
echo $breadcumb;
?>