<div class="galleries">
	<div class="header-bar">
		<h1>วิดิทัศน์</h1>
	</div>
	<div id="boxphoto" class="corner">
		<ul class="gallery">
			<?php foreach ($vdos as $vdo):?>
			<li class="vdoBlock">
				<a rel="lightbox[xxx]" href="galleries/ajax_vdo_load/<?php echo $vdo->id?>?ajax=true&width=420&height=315"><?php echo thumb($vdo->cover_pic,170,120,0);?></a>
	            <div class="txtgallery"><?php echo $vdo->title?></div>
			</li>
			<?php endforeach;?>
		</ul>
		<div class="clear"></div>
		<?php echo $vdos->pagination()?>
	</div>
</div>