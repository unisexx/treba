<div class="notices">
	<div class="header-bar">
		<h1><?=$researches->category->name?></h1>
	</div>

	<div id="data" style="width:639px;">
		<!-- <form action="" method="get">
			<p class="search">
				<span class="TxtGray4 B">หัวข้อ :</span>			
				<input type="text" name="titlesearch" style="width:80%;">		
				<input type="submit" value="ค้นหา">
			</p>
		</form>
		<br clear="all">
		-->
		<?php echo $researches->pagination() ?>
		
		<?php foreach($researches as $research): ?>
		<div class="box-notify <?php echo alternator('','alt');?>"> 
			<div>
				<a href="stats/view/<?php echo $research->id ?>"><h3><?php echo $research->title ?></h3></a>
				<div style="height:32px;overflow:hidden;margin:5px 0px 0px;"><?php echo strip_tags($research->detail) ?></div>
			</div> 
		</div>
		<div class="clear"></div>
	 	<?php endforeach; ?>
		
		<?php echo $researches->pagination() ?>
	</div>
</div>