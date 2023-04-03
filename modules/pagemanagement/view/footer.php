<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
/*$pObj = new viewPage;
$ExtraQryStr = 'status="Y" AND isFooter="Y" ORDER BY swapNo';
$pageNo = $pObj -> existPage($ExtraQryStr);
$pData = $pObj -> getPage($ExtraQryStr,0,$pageNo);
if($pData){
    echo '<ul>';
    foreach($pData as $pv){
        $href= ($pv['pageUrl']) ? $pv['pageUrl'] : 'https://perfectcapitalmarkets.com/'.$pv['permalink'].'/';
        $sltd= ($pageType==$pv['permalink']) ? 'active' : '';
        echo '<li><a href="'.$href.'">'.$pv['pageName'].'</a></li>';
    }
    echo '</ul>';
}*/
?>
<ul>
    <li><a href="https://perfectcapitalmarkets.com/company-history.php">Our history<div class="ripple-container"></div></a></li>
    <li><a href="https://perfectcapitalmarkets.com/our-values.php">Our Values</a></li>
    <li><a href="https://perfectcapitalmarkets.com/partner-with-us.php">Partner With Us</a></li>
    <li><a href="https://perfectcapitalmarkets.com/faq.php">FAQS</a></li>
</ul>
