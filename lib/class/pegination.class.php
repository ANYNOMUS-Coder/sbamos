<?php
class Page {
    
    function startPegination($page,$limit){
        $page = ($page=='') ? 1 : $page ;
        return ($page-1)*$limit;
    } 
    
    function peginate($totalRow,$showRow,$page,$QUERY_STRING_PATH,$admin='no',$totalBtnShown=9){
        $returnStr = '';
        if($totalRow>$showRow){
            $page = ($page=='') ? 1 : $page ;
            $btnNo = ceil($totalRow/$showRow) ;

            $newQryStrArr = array();
            $qryStrArr = explode('&',$QUERY_STRING_PATH);
            if($admin=='yes')
                $excludeQstnHeaderArr = array('not set up');
            else
                $excludeQstnHeaderArr = array('pageType','dtls','dtaction');
            foreach($qryStrArr as $qsa){
                if(substr($qsa, 0, strrpos($qsa, "=")) != 'page' && !in_array(substr($qsa, 0, strrpos($qsa, "=")),$excludeQstnHeaderArr)) $newQryStrArr[] = $qsa;
            }
            
            $disable_1st = ($page==1) ? 'disabled' : '';
            $disable_lst = ($page==$btnNo) ? 'disabled' : '';
            $returnStr .= '<ul class="pagination pagination-sm justify-content-end">';
            $returnStr .= '<li class="page-item '.$disable_1st.'"><a  class="page-link" href="?'.implode('&',$newQryStrArr).'&page=1">&lt;&lt;</a></li>';
            $returnStr .= '<li class="page-item '.$disable_1st.'"><a  class="page-link" href="?'.implode('&',$newQryStrArr).'&page='.($page-1).'">&lt;</li>'; 
            
            $preNum = (fmod($totalBtnShown,2) == 0) ? ($totalBtnShown/2) : ((($totalBtnShown+1)/2)-1);
            $postNum = $totalBtnShown - ($preNum+1);
            $startBtn = $page - $preNum;
            $endBtn = $page + $postNum;

            $startBtn = ($startBtn<1) ? 1 : $startBtn;
            $startBtn = (($startBtn+$totalBtnShown)>$btnNo && $totalBtnShown<$btnNo) ? ($startBtn-(($startBtn+$totalBtnShown)-$btnNo))+1 : $startBtn;
            $endBtn = ($endBtn>$btnNo) ? $btnNo : $endBtn;
            $endBtn = (($endBtn-$totalBtnShown)<1  && $totalBtnShown<$btnNo) ? ($endBtn+(1-($endBtn-$totalBtnShown)))-1 : $endBtn;
            
            for($p=$startBtn; $p<=$endBtn; $p++){
                $active = ($page==$p) ? 'active' : '';
                $returnStr .= '<li class="page-item '.$active.'"><a class="page-link" href="?'.implode('&',$newQryStrArr).'&page='.$p.'">'.$p.'</a></li>';
            }    

            $returnStr .= '<li class="page-item '.$disable_lst.'"><a class="page-link" href="?'.implode('&',$newQryStrArr).'&page='.($page+1).'">&gt;</a></li>';
            $returnStr .= '<li class="page-item '.$disable_lst.'"><a class="page-link" href="?'.implode('&',$newQryStrArr).'&page='.$btnNo.'">&gt;&gt;</a></li>';
        $returnStr .= '</ul>';
        }
        return $returnStr;
    }    
    
}    
?>