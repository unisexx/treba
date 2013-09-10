<script type="text/javascript">
	$(document).ready(function(){
		$(".dBlock").css
	});
</script>
<div class="calendar">
	<div class="header-bar"><h1>ปฏิทินกิจกรรม</h1></div>
	<div id="data">
		<?php foreach($calendars as $key=>$calendar):?>
			<div class="dBlock">
				<h2><?php echo $calendar->title?><br /> <span class="dType f10">ประเภท: <span class="<?=$calendar->className?>"><?php echo $type[$calendar->className] ?></span> เริ่ม <?php echo mysql_to_th($calendar->start) ?> ถึง  <?php echo mysql_to_th($calendar->end) ?></span> </h2>
			<?php echo $calendar->detail ?>
			</div>
		<?php endforeach;?>
    </div>
</div>