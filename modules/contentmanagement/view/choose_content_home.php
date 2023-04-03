<?php
if(!defined("RUNNING_SCRIPT")) die("No Direct Access Allowed");
$cntObj = new viewContent;
$cntData = $cntObj -> getContentByPageId(33);
?>

<section class="story_div">
<?php
if($cntData){
?>
	<section class="choice_part">
		<div class="col-md-10 col-md-push-1">
			<div class="container">
			<div class="col-md-6 col-sm-6 col-xs-12">
				<div class="choice_img"><img src="<?php echo $MEDIA_FILES_SRC; ?>/content/large/<?php echo $cntData['contentImage']; ?>" alt="" /></div>
			</div>
			<div class="col-md-6 col-sm-6 col-xs-12">
				<h3><?php echo $cntData['heading']; ?></h3>
				<?php echo $cntData['describtion']; ?>
			</div>
		</div>
		</div>
	</section>
<?php
}
else
    echo 'No content available';
?>    
</section>
