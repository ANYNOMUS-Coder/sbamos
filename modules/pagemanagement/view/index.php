<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$pObj = new viewPage;
$ExtraQryStr = 'parentId=0 AND status="Y" AND isTop="Y" ORDER BY swapNo';
$pageNo = $pObj -> existPage($ExtraQryStr);
$pData = $pObj -> getPage($ExtraQryStr,0,$pageNo);

echo '<nav><ul class="navi-level-1 active-subcolor">';

foreach($pData as $pv){
    $href= ($pv['pageUrl']) ? $pv['pageUrl'] : $SITE_LOC_PATH.'/'.$pv['permalink'].'/';
    $icon= ($pv['pageIcon_fontAwesome']) ? '<i class="'.$pv['pageIcon_fontAwesome'].'"></i>' : '';
    $sltd= ($pageType==$pv['permalink']) ? 'active' : '';
    
    echo '<li class="'.$sltd.'"><a href="'.$href.'">'.$icon.' '.$pv['pageName'].'</a>';
    
    /*if($pv['pageId']=='57'){
        $aObj = new viewBsnsaccount;
        $ExtraQryStr = '1';
        $subpageNo = $aObj -> existBsnsaccount($ExtraQryStr);
        $subpData = $aObj -> getBsnsaccount($ExtraQryStr,0,$subpageNo);

        if($subpData){
            echo '<ul class="navi-level-2"><div class="overlay1"></div>
                    <li>
                        <div class="menu-in-left-part">
                            <h2><a href="'.$href.'">'.$pv['subPageName'].'</a></h2>
                            <p>'.$pv['pageInfo'].'</p>
                            <div class="space-30"></div>
                            <div class="left-menu-button">
                                <a href="signup.php" class="create-ac">Create Live Account</a>
                                <a href="signup.php" class="try-demo">Try Demo Account</a>
                            </div>
                        </div>
                    </li>';
            $perLiEl = ceil($subpageNo/3) ;
            foreach($subpData as $spk=>$spv){
                $href= $SITE_LOC_PATH.'/'.$pv['permalink'].'/'.$spv['permalink'].'/';
                $icon= ($spv['pageIcon_fontAwesome']) ? '<i class="'.$spv['pageIcon_fontAwesome'].'"></i>' : '<i class="fa fa-caret-right"></i>';
                $sltd= ($dtaction==$spv['permalink']) ? 'active' : '';

                if($spk==0) echo '<li>';
                echo '<div class="mega-menu-box '.$sltd.'">
                            <a href="'.$href.'">
                                <h3><span>'.$icon.'</span> '.$spv['heading'].'</h3>
                                <p>'.$spv['shortDescription'].'</p>
                            </a>
                        </div>';
                if($spk==($subpageNo-1)) 
                    echo '</li>'; 
                else {
                    if((($spk+1)%$perLiEl)==0) 
                        echo '</li><li>'; 
                };
            }
            echo '</ul>';
        }
    }
    else{
        
    }*/
    $ExtraQryStr = 'parentId='.$pv['pageId'].' AND status="Y" AND isTop="Y" ORDER BY swapNo';
    $subpageNo = $pObj -> existPage($ExtraQryStr);
    $subpData = $pObj -> getPage($ExtraQryStr,0,$subpageNo);

    if($subpData){
        echo '<ul class="navi-level-2"><div class="overlay1"></div>
                <li>
                    <div class="menu-in-left-part">
                        <h2><a href="'.$href.'">'.$pv['subPageName'].'</a></h2>
                        <p>'.$pv['pageInfo'].'</p>
                        <div class="space-30"></div>
                        <div class="left-menu-button">
                            <a href="signup.php" class="create-ac">Create Live Account</a>
                            <a href="signup.php" class="try-demo">Try Demo Account</a>
                        </div>
                    </div>
                </li>';
        $perLiEl = ceil($subpageNo/3) ;
        foreach($subpData as $spk=>$spv){
            $href= ($spv['pageUrl']) ? $spv['pageUrl'] : $SITE_LOC_PATH.'/'.$pv['permalink'].'/'.$spv['permalink'].'/';
            $icon= ($spv['pageIcon_fontAwesome']) ? '<i class="'.$spv['pageIcon_fontAwesome'].'"></i>' : '<i class="fa fa-caret-right"></i>';
            $sltd= ($dtaction==$spv['permalink']) ? 'active' : '';

            if($spk==0) echo '<li>';
            echo '<div class="mega-menu-box '.$sltd.'">
                        <a href="'.$href.'">
                            <h3><span>'.$icon.'</span> '.$spv['pageName'].'</h3>
                            <p>'.$spv['pageInfo'].'</p>
                        </a>
                    </div>';
            if($spk==($subpageNo-1)) 
                echo '</li>'; 
            else {
                if((($spk+1)%$perLiEl)==0) 
                    echo '</li><li>'; 
            };
        }
        echo '</ul>';
    }
    
    echo '</li>';
}
echo '</ul></nav>';
?>
