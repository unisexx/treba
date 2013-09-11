<div class="notices">
	<div class="header-bar">
		<h1>ข่าวสารอัพเดต</h1>
	</div>

	<div id="data">
		<form action="" method="get">
			<p class="search">
				<span class="TxtGray4 B">หัวข้อ :</span>			
				<input type="text" name="titlesearch" style="width:80%;">		
				<input type="submit" value="ค้นหา">
			</p>
		</form>
		<br clear="all">
		<?php echo $informations->pagination() ?>
		
		<?php foreach($informations as $information): ?>
		<div class="box-notify <?php echo alternator('','alt');?>"> 
			<a href="informations/view/<?php echo $information->id ?>" class="thumb"><img src="<?php echo (is_file('uploads/information/'.$information->image))?'uploads/information/'.$information->image : 'themes/tpso1/images/nophoto.gif' ?>" class="photo" width="77" height="64"></a>
			<div class="box_info">
				<a href="informations/view/<?php echo $information->id ?>"><h3><?php echo $information->title ?></h3></a>
				<div style="height:32px;overflow:hidden;margin:5px 0px 0px;"><?php echo strip_tags($information->detail) ?></div>
			</div> 
		</div>
		<div class="clear"></div>
	 	<?php endforeach; ?>
		
		<?php echo $informations->pagination() ?>
	</div>
</div>