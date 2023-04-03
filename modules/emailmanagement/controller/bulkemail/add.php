<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");

$_SESSION['CMPGN_STS'] = 'WAITING';
$_SESSION['CMPGN_PRG'] = 0;
$_SESSION['CMPGN_TIME'] = 0;

$obj = new adminEmailCampaign;
$tObj = new adminEmailTemplates;
if($editid){
    $dataArr = $obj -> getEmailCampaignBycampaignId($editid);
    if($dataArr){
        foreach($dataArr as $key=>$value){
            $$key = $value;
        }
    }
}
$ExtraQryStr = 'status="Y"';
$tArr = $tObj -> getEmailTemplates($ExtraQryStr,0,999);
?>
<style>
    .to-mail-container {
        border: solid 1px #FFF;
        height: 293px;
        overflow-y: scroll;
    }
    .to-mail-container > span {
        background: #dadada;
        padding: 3px 5px;
        font-size: 11px;
        color: #444;
        display: inline-block;
        margin: 1px 0px 1px 2px;
    }
    .ccmp-cntr .panel-body {
        background: #FFF;
    }
    .ccmp-cntr .panel-heading h4 {
        color: #FFF;
    }
    .ccmp-cntr .panel-heading h6 {
        color: #a7dfff;
    }
</style>
<div class="row">
    <div class="col-lg-12">
        <div class="cmpgn-rslt">
            <div class="panel panel-default">
                <form id="createCampaignForm" action="" method="post" enctype="multipart/form-data">
                    <div class="panel-heading">Form Elements</div>
                    <div class="panel-body">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Campaign Name </label>
                                <input required type="text" class="form-control" name="campaignName" value="<?php echo $campaignName;?>" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <h4>To?<button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#chooseMailBulk">Click here to Add</button></h4>
                                <h6>0 Selected</h6>
                                <div class="to-mail-container"></div>    
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>From Name </label>
                                <input required type="text" class="form-control" name="fromName" value="<?php echo $fromName;?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>From email </label>
                                <div class="input-group margin-bottom-sm">
                                    <input required type="text" class="form-control" name="fromEmail" value="<?php echo $fromEmail;?>" autocomplete="off">
                                    <span class="input-group-addon">@nlvx.com</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Reply Name </label>
                                <input required type="text" class="form-control" name="replyName" value="<?php echo $replyName;?>" autocomplete="off">
                            </div>
                            <div class="form-group">
                                <label>Reply email </label>
                                <div class="input-group margin-bottom-sm">
                                    <input required type="text" class="form-control" name="replyEmail" value="<?php echo $replyEmail;?>" autocomplete="off">
                                    <span class="input-group-addon">@nlvx.com</span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Email Template</label>
                                <select required class="form-control" name="emailTemplate" autocomplete="off">
                                    <option value="">Select</option>
                                    <?php
                                    foreach($tArr as $tk=>$tv) {
                                        echo '<option value="'.$tv['emailtemplatesId'].'">'.$tv['heading'].'</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="panel-footer">
                        <input type="hidden" name="SourceForm" value="addEditEmailCampaign">
                        <input type="hidden" name="ajax" value="1">
                        <input type="hidden" name="editid" value="<?php echo $campaignId;?>">
                        <input type="submit" class="btn btn-primary" name="submit" value="Submit" >
                        <button type="reset" class="btn btn-default">Reset</button>
                        <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $redirectToBack;?>'">Back</button>
                        <button type="reset" class="btn btn-default" onclick="window.location.href='<?php echo $SITE_LOC_PATH.'/admin/';?>';">Exit</button>
                    </div>
                </form>
            </div>
        </div>    
	</div>
</div>

<div id="chooseMailBulk" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Select User</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="form-group">
							<select class="form-control" name="isActivated" autocomplete="off">
                                <option value="">Is Activated ?</option>
                                <option value="Y">ACT: Yes</option>
                                <option value="N">ACT: No</option>
                            </select>
						</div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
							<select class="form-control" name="initialDepositeStatus" autocomplete="off">
                                <option value="">Is Paid ?</option>
                                <option value="Y">PAY: Yes</option>
                                <option value="N">PAY: No</option>
                            </select>
						</div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button id="svBtn" type="button" class="btn btn-info btn-sm">Save</button>
                <button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Dismiss</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function(){
        $("#chooseMailBulk").on('hidden.bs.modal', function(){
            $('select[name="isActivated"]').val('');
            $('select[name="initialDepositeStatus"]').val('');
            $('#svBtn').html('Save');
        });
        $(document).on('click',"#svBtn",function(){
            $('#svBtn').html('Please Wait...');
            var isActivated = $('select[name="isActivated"]').val();
            var initialDepositeStatus = $('select[name="initialDepositeStatus"]').val();
            var formData = {isActivated:isActivated,initialDepositeStatus:initialDepositeStatus,ajax:'1',SourceForm:'getAllEmail'};
            $.post("<?php echo $SITE_LOC_PATH;?>/modules/emailtemplates/controller/bulkemail/action.php", formData, function(data, status){
                $(".to-mail-container").prev('h6').html(data.length+' selected.')
                $.each(data, function(index, item) {
                    $(".to-mail-container").append('<span><input type="hidden" name="email[]" value="'+item+'">'+item+'</span>');
                });
                $("#chooseMailBulk").modal("hide");
            },'json');
        });
        $(document).on('submit',"#createCampaignForm",function(e){
            e.preventDefault();
            var form = $(this);
            var formVal = form.serialize();
            
            $('.cmpgn-rslt').html('<div class="panel panel-primary ccmp-cntr">'+
                                        '<div class="panel-heading">'+
                                            '<h4>Creating Campaign ...</h4>'+
                                            '<h6>Keep patience. This will take several time.</h6>'+
                                        '</div>'+
                                        '<div class="panel-body">'+
                                            '<h6 class="ccmp-cntr-status">PROGRESS STATUS</h6>'+
                                            '<div class="progress">'+
                                                '<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width:0%">'+
                                                    '0% Complete'+
                                                '</div>'+
                                            '</div>'+
                                            '<h4>Estimated Time: <span class="ccmp-cntr-time">1.25 Minute</span></h4>'+
                                        '</div>'+
                                    '</div>');
            checkCcmpStatus();
            
            $.ajax({
                type: "POST",
                url: "<?php echo $SITE_LOC_PATH;?>/modules/emailtemplates/controller/bulkemail/action.php",
                data: formVal,
                catch: false,
                dataType: 'json',
                success: function (data) {
                    if(data.typ==='success') window.location.href = '<?php echo $SITE_LOC_PATH;?>/admin/?pageType=emailtemplates&dtaction=bulkemail';
                },
                error: function (data) {
                    alert('Network error');
                }
            });
        });
    });
    function checkCcmpStatus(){
        var formData = {ajax:'1',SourceForm:'checkSessionStatus'};
        $.post("<?php echo $SITE_LOC_PATH;?>/modules/emailtemplates/controller/bulkemail/action.php", formData, function(data, status){
            console.log(data);
            $('.cmpgn-rslt .ccmp-cntr-status').text(data.status);
            $('.cmpgn-rslt .progress-bar-success').attr('aria-valuenow',data.pw);
            $('.cmpgn-rslt .progress-bar-success').attr('style','width:'+data.pw+'%');
            $('.cmpgn-rslt .progress-bar-success').text(data.pw+'% Completed');
            $('.cmpgn-rslt .ccmp-cntr-time').text(data.time);
            checkCcmpStatus();
        },'json');
    }
</script>