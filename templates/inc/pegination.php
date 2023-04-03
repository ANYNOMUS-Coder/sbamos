<?php
    $pageBtns = $pgntn -> peginate($totalRow,$limit,$page,$QUERY_STRING_PATH);    
    echo $pageBtns;
?>


<?php /*
<div class="fixed-table-pagination">
    <?php if($totalRow>PEGINATION) {?>
    <div class="pull-left pagination"><span class="pagination-info">Showing <?php echo (($limit*($page-1))+1) .' to '. ($limit*$page) .' of '. $totalRow; ?> rows </span><span class="page-list"><span class="btn-group dropup"><button data-toggle="dropdown" class="btn btn-default dropdown-toggle" type="button"><span class="page-size"><?php echo ($perpagevalue) ? $perpagevalue : PEGINATION;?></span> <span class="caret"></span></button>
        <ul role="menu" class="dropdown-menu">
            <li <?php if($perpagevalue==PEGINATION || !$perpagevalue) echo 'class="active"';?>><a href="<?php echo $CURRENT_URL.'?perpagevalue='.PEGINATION;?>"><?php echo PEGINATION;?></a></li>
            <li <?php if($perpagevalue==60) echo 'class="active"';?>><a href="<?php echo $CURRENT_URL.'?perpagevalue=60';?>">60</a></li>
            <li <?php if($perpagevalue==80) echo 'class="active"';?>><a href="<?php echo $CURRENT_URL.'?perpagevalue=80';?>">80</a></li>
            <li <?php if($perpagevalue==100) echo 'class="active"';?>><a href="<?php echo $CURRENT_URL.'?perpagevalue=100';?>">100</a></li>
            <li <?php if($perpagevalue==150) echo 'class="active"';?>><a href="<?php echo $CURRENT_URL.'?perpagevalue=150';?>">150</a></li>
            <li <?php if($perpagevalue==300) echo 'class="active"';?>><a href="<?php echo $CURRENT_URL.'?perpagevalue=300';?>">300</a></li>
            <li <?php if($perpagevalue==500) echo 'class="active"';?>><a href="<?php echo $CURRENT_URL.'?perpagevalue=500';?>">500</a></li>
        </ul>
        </span> records per page</span>
    </div>
    <?php }?>
    <div class="pull-right pagination">
    <?php
        $pageBtns = $pgntn -> peginate($totalRow,$limit,$page,$QUERY_STRING_PATH);    
        echo $pageBtns;
    ?>
    </div>
</div>
*/?>