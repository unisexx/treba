<div class="galleries">
	<div class="header-bar">
		<h1>ภาพกิจกรรม</h1>
	</div>
	<div id="boxphoto" class="corner" style="padding-bottom:10px;">
		<ul class="gallery">
			<?php foreach ($categories as $category):?>
			<li>
				<a href="stats/view2/<?php echo $category->id?>"><span class="clip_image"></span><?php echo thumb($category->gallery->order_by("id","random")->get()->image,170,120,0,"alt='image' title='$category->name'");?></a>
                <div class="txtgallery"><?php echo $category->name?></span></div>
                <div class="qtyphoto">
                	<?php if($category->gallery->result_count() == "1"):?>
					(1 image)
					<?php else:?>
					(<?php echo $category->gallery->result_count()?> images)
					<?php endif;?>
				</div>
			</li>
			<?php echo alternator('','','<div class="clear"></div>') ?></php>
			<?php endforeach;?>
		</ul>
		<div class="clear"></div>
	</div>
</div>