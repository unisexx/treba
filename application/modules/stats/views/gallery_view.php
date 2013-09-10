<div class="galleries">
	<div class="header-bar">
		<h1>ภาพถ่ายกิจกรรม</h1>
	</div>
<div id="boxphoto" class="corner">
	<ul class="gallery">
		<?php foreach ($galleries as $gallery):?>
		<li>
			<a rel="lightbox[xxx]" href="<?php echo $gallery->image?>"><?php echo thumb($gallery->image,170,120,0);?></a>
            <div class="txtgallery"><?php echo $gallery->title?></div>
		</li>
		<?php endforeach;?>
	</ul>
	<div class="clear"></div>
	<?php echo $galleries->pagination()?>
</div>
</div>