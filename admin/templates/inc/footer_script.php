<?php if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed"); 

echo '
        <script src="'.$SITE_LOC_PATH.'/admin/templates/vendors/js/vendor.bundle.base.js"></script>
        <script src="'.$SITE_LOC_PATH.'/admin/templates/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>

        <script src = "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>  
        <script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>  
        
        <script src="'.$SITE_LOC_PATH.'/admin/templates/js/jquery.cookie.js"></script>
        <script src="'.$SITE_LOC_PATH.'/admin/templates/js/off-canvas.js"></script>
        <script src="'.$SITE_LOC_PATH.'/admin/templates/js/hoverable-collapse.js"></script>

        <script src="'.$SITE_LOC_PATH.'/admin/templates/vendors/sweetalert/sweetalert.min.js"></script>
        <script src="'.$SITE_LOC_PATH.'/admin/templates/vendors/select2/select2.min.js"></script>
        <script src="'.$SITE_LOC_PATH.'/admin/templates/js/jquery-ui.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>

';

if(!$pageType) {
    echo '
    <script src="'.$SITE_LOC_PATH.'/admin/templates/vendors/chart.js/Chart.min.js"></script>
    <script src="'.$SITE_LOC_PATH.'/admin/templates/vendors/progressbar.js/progressbar.min.js"></script>
    <script src="'.$SITE_LOC_PATH.'/admin/templates/js/dashboard.js"></script>
    <script src="'.$SITE_LOC_PATH.'/admin/templates/js/Chart.roundedBarCharts.js"></script>
    ';
}


echo '
        <script type="text/javascript">
            var SITE_LOC_PATH       = "'.$SITE_LOC_PATH.'";
            var PAGETYPE            = "'.$pageType.'";
            var DTLS                = "'.$dtls.'";
            var DTACTION            = "'.$dtaction.'";
            var MODULE_PATH         = "'.$SITE_LOC_PATH.'/modules";
            var ADMINPEGINATION     = parseInt('.ADMINPEGINATION.');
            var SHOWPEGINATION      = parseInt('.SHOWPEGINATION.');
            var IMG_SIZE_ARR        = '.json_encode($imgSprtArr).';
            var QUERY_STRING_PATH   = "'.$QUERY_STRING_PATH.'";
            var CURRENT_URL         = "'.$CURRENT_URL.'";
            var SRCARRTMP           = [];
            var SRCARRTMP2          = [];
        </script>
        <script src="'.$SITE_LOC_PATH.'/admin/templates/js/template.js"></script>
        <script src="'.$SITE_LOC_PATH.'/admin/templates/js/settings.js"></script>
        <script src="'.$SITE_LOC_PATH.'/admin/templates/js/todolist.js"></script>
        <script src="'.$SITE_LOC_PATH.'/admin/templates/js/file-explorer.js"></script>
        <script src="'.$SITE_LOC_PATH.'/admin/templates/js/cstmscript.js?r=943219"></script>
    </body>

</html>
';

    
/*    
	<script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/bootstrap.min.js"></script>
	<script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/chart.min.js"></script>
	<script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/chart-data.js"></script>
	<script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/easypiechart.js"></script>
	<script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/easypiechart-data.js"></script>
    <script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/zepto.min.js"></script>
	<script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/zepto.dragswap.js"></script>
	<script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/jquery-ui.js"></script>
	<script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/bootstrap-datepicker.js"></script>	
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.15.1/moment.min.js"></script>  
    <script src = "https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/js/bootstrap-datetimepicker.min.js"></script>  
	<script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/bootstrap-select.min.js"></script>	
    <script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/jHtmlArea-0.8.alpha.min.js"></script>
    <script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/jHtmlArea.ColorPickerMenu-0.8.alpha.min.js"></script>
    <script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
	<!--<script type="text/javascript" src="<?php echo $SITE_LOC_PATH;?>/lib/editor/ckeditor/ckeditor.js"></script>
	<script type="text/javascript" src="<?php echo $SITE_LOC_PATH;?>/lib/editor/ckfinder/ckfinder.js"></script>-->
    <script type="text/javascript">
        var SITE_LOC_PATH = "<?php echo $SITE_LOC_PATH;?>";
        var PAGETYPE = "<?php echo $pageType;?>";
        var DTLS = "<?php echo $dtls;?>";
        var DTACTION = "<?php echo $dtaction;?>";
        var MODULE_PATH = "<?php echo $SITE_LOC_PATH.'/modules';?>";
        var ADMINPEGINATION = parseInt(<?php echo ADMINPEGINATION;?>);
        var SHOWPEGINATION = parseInt(<?php echo SHOWPEGINATION;?>);
        var IMG_SIZE_ARR = <?php echo json_encode($imgSprtArr);?>;
        var SRCARRTMP = [];
        var SRCARRTMP2 = [];
    </script>
	<script src="<?php echo $SITE_LOC_PATH;?>/admin/templates/js/custom.js?r=6763432"></script>
</body>

</html>
*/