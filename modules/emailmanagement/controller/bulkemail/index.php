<?php 
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$obj    = new adminEmailCampaign;
$rObj   = new adminEmilCampaignReport;
$pgntn  = new Page;
?>
<style>
    .progress {
        margin-bottom: 0px;
        background-color: #212121;
    } 
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading tableheadng">
                E - Mail
                <button class="btn btn-primary btn-sm" onClick="location.href='<?php echo $SITE_LOC_PATH.'/admin/?pageType='.$pageType.'&dtls='.$dtaction.'&dtaction=add&redirect='.base64_encode($redirectString);?>'"><i class="fa fa-plus"></i> New Campaign</button>
            </div>
            <div class="panel-body">
                <div class="fixed-table-toolbar" style="margin-bottom:50px;">
                    <form action="" method="get">
                        <div class="columns btn-group pull-right">
                            <button title="Refresh" name="refresh" type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                        </div>
                        <div class="pull-right search srchfields">
                            <input autocomplete="off" name="searchkeyword" type="text" class="form-control" value="<?php echo $searchkeyword;?>"  placeholder="Search by Campaign Name">
                        </div>
                        <input type="hidden" name="pageType" value="<?php echo $pageType;?>">
                        <input type="hidden" name="dtaction" value="<?php echo $dtaction;?>">
                    </form>
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>
                                <div class="th-inner sortable">Sl. No</div>
                            </th>
                            <th>
                                <div class="th-inner sortable">Campaign</div>
                            </th>
                            <th>
                                <div class="th-inner sortable">Weight</div>
                            </th>
                            <th>
                                <div class="th-inner sortable">Progress</div>
                            </th>
                            <th class="text-center">
                                <div class="th-inner sortable">Control</div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $ExtraQryStr = '1';
                    $ExtraQryStr .= ($searchkeyword) ? ' and campaignName like "%'.$searchkeyword.'%"' : '';

                    $limit = ($perpagevalue) ? $perpagevalue : ADMINPEGINATION;
                    $page  = ($page)? $page : 1;
                    $start = $pgntn -> startPegination($page,$limit);
                    $dtArr = $obj ->  getEmailCampaign($ExtraQryStr,$start,$limit);
                    $totalRow = $obj -> existEmailCampaign($ExtraQryStr);

                    if($dtArr){
                        foreach($dtArr as $dk=>$dv){
                            $ExtraQryStr = 'campaignId="'.$dv['campaignId'].'" and isSended="Y"';
                            $rNo = $rObj -> existEmilCampaignReport($ExtraQryStr);
                            $ExtraQryStr = 'campaignId="'.$dv['campaignId'].'" and isAttempted="Y"';
                            $aNo = $rObj -> existEmilCampaignReport($ExtraQryStr);
                            $ExtraQryStr = 'campaignId="'.$dv['campaignId'].'"';
                            $wNo = $rObj -> existEmilCampaignReport($ExtraQryStr);
                            $prgrs = (($aNo/$wNo)*100);
                            $cntrl = ($dv['campaignStatus']=='NONE' || $dv['campaignStatus']=='PAUSE') ? 'play text-success' : 'pause text-danger';
                            $action = ($dv['campaignStatus']=='NONE' || $dv['campaignStatus']=='PAUSE') ? 'PLAY' : 'PAUSE';
                            
                            echo '<tr data-info="'.$dv['campaignId'].'">
                                        <td>'.((($page-1)*$limit)+1+$dk).'</td>
                                        <td>'.$dv['campaignName'].'</td>
                                        <td class="wght">'.$rNo.'/'.$wNo.'</td>
                                        <td>
                                            <div class="progress">
                                                <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="'.$prgrs.'" aria-valuemin="0" aria-valuemax="100" style="width:'.$prgrs.'%">
                                                    '.$prgrs.'%
                                                </div>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <a class="cmpn-cntrls" data-action="'.$action.'" data-info="'.$dv['campaignId'].'" href=""><i class="fa fa-'.$cntrl.'" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>';
                            
                            if($action=='PAUSE'){
                                ?>
                                <script>
                                    $(function(){ checkCcmpStatus('<?php echo $dv['campaignId'];?>'); });
                                </script>
                                <?php
                            }
                        }
                    }
                    else{
                        ?>
                        <tr><td colspan="10" align="center">No matching records found</td></tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>
                <?php include($ROOT_PATH.'/admin/templates/inc/pegination.php');?>
            </div>
        </div>
    </div>
</div>
<script>
    $(function(){ 
        $(document).on('click',".cmpn-cntrls",function(e){
            e.preventDefault();
            var link = $(this);
            link.html('<i class="fa fa-cog fa-spin fa-fw"></i>');
            var formData = {info:link.attr('data-info'),action:link.attr('data-action'),ajax:'1',SourceForm:'setCmpgnSts'};
            $.post("<?php echo $SITE_LOC_PATH;?>/modules/emailtemplates/controller/bulkemail/action.php", formData, function(data, status){
                if(data.typ=='success') location.reload();
            },'json');
        }); 
    });
    function checkCcmpStatus(info){
        var formData = {info:info,ajax:'1',SourceForm:'checkCmpgnStatus'};
        $.post("<?php echo $SITE_LOC_PATH;?>/modules/emailtemplates/controller/bulkemail/action.php", formData, function(data, status){
            $(document).find('tr[data-info="'+info+'"] .wght').text(data.wght);
            $(document).find('tr[data-info="'+info+'"] .progress-bar-success').attr('aria-valuenow',data.pw);
            $(document).find('tr[data-info="'+info+'"] .progress-bar-success').attr('style','width:'+data.pw+'%');
            $(document).find('tr[data-info="'+info+'"] .progress-bar-success').text(data.pw+'%');
            if(data.reload) location.reload();
            checkCcmpStatus(info);
        },'json');
    }
</script>