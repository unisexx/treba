<div class="calendar">
	<div class="header-bar"><h1>ปฏิทินกิจกรรม</h1></div>
	<div id="data">
		<h2><?php echo $calendar->title?><br /> <span class="dType f10">ประเภท: <span class="<?=$calendar->className?>"><?php echo $type ?></span> เริ่ม <?php echo mysql_to_th($calendar->start) ?> ถึง  <?php echo mysql_to_th($calendar->end) ?></h2>
		<?php echo $calendar->detail ?>
    </div>
</div>