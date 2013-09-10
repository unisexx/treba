<div class="span9">
	<h2 class="header">มิวสิควีดีโอ</h2>
	<?php foreach($mvs as $mv):?>
	    <?php echo alternator('','<br clear="all">');?>
	    <div class="span4">
	    <div class="clearfix">
		<div class="video-thumb">
			<a href="music_videos/view/<?=$mv->slug?>" target="_blank">
				<div class="thumbnail video">
					<span class="video-thumb-container">
						<span class="wrap">
							<span class="shim"></span>
							<?=YoutubeIframeConverter($mv->video_script,"thumb",'alt="'.$mv->title.'"')?>
						</span>
						<span class="play">Play</span>
					</span>
				</div>
			</a>
		</div>
		<a href="music_videos/view/<?=$mv->slug?>" target="_blank"><?=$mv->title?></a> <?=(datediff(datetime2date($mv->created)) >= -1)?'<span class="label label-mini label-warning">ใหม่</span>':'';?>
		<div class="author"></div>
		<div class="viewcount"></div>
		</div>
		</div>
	<?php endforeach;?>
	<a href="music_videos"><div class="right btn btn-mini" type="button">ดู MV ทั้งหมด</div></a>
	<br clear="all">
</div>