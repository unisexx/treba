<style type="text/css">
.statDownload{margin:0 0 10px 0;}
.statDownload li{list-style-position:inside; margin:0 0 0 13px; line-height:20px;}
</style>
<div class="notices">
	<div class="header-bar">
		<h1>ข้อมูลสถิติ</h1>
	</div>

	<div id="data">
		<!-- <form action="" method="get">
			<p class="search">
				<span class="TxtGray4 B">หัวข้อ :</span>			
				<input type="text" name="titlesearch" style="width:80%;">		
				<input type="submit" value="ค้นหา">
			</p>
		</form>
		<br clear="all">
		-->
		<?php echo $stats->pagination() ?>
		
		<?php foreach($stats as $stat): ?>
		<div>
			<a href="stats/stat_download/<?php echo $stat->id ?>"><h3 style="color:#11698C; font-size: 20px;"><?php echo $stat->title ?></h3></a>
			<ul class="statDownload">
			<?php
				$attach = new Attach_file();
				$attach->where("content_id = ".$stat->id." and module = 'stats'")->get();
				foreach($attach as $item):
			?>
				<li><a href="stats/research_download/<?php echo @$item->id?>"><?=$item->file_name?></a></li>
			<?php endforeach;?>
			</ul>
		</div>
		<div class="clear"></div>
	 	<?php endforeach; ?>
		
		<?php echo $stats->pagination() ?>
	</div>
</div>