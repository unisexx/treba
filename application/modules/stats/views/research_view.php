<div class="notices">
	<div class="header-bar">
		<h1><?=$research->category->name?></h1>
	</div>
	
<div class="corner" id="boxnotify-page">
<div id="data">
<div class="box-notify-detail">
<h2><?php echo $research->title ?></h2>
<?php echo $research->detail ?>
		
		<div class="dl-box">
			<div><span class="f14 B TxtPurple">ดาวน์โหลดเอกสาร</span></div>
				<ul>
				<?php foreach($attachs as $attach):?>
					<?php if($attach):?>
									<li><a href="stats/research_download/<?php echo $attach->id?>" class="hoverZoomLink"><?php echo $attach->file_name?></a></li>
					<?php endif;?>
				<?php endforeach;?>
				</ul>
			</div>
		</div>
		
</div><!--box-notify-detail-->
</div><!--data-->
</div>
</div>