<script type="text/javascript">
	$(document).ready(function(){
		$("ul.column_news li:even").css("border-right","1px dotted #ccc");
	});
</script>
<div class="box" style="position: relative;">
	<ul class="column_news">
		<?php foreach($informations as $information):?>
			<li>
				<div class="newContent">
					<a href="informations/view/<?php echo $information->id ?>" class="link_news"><?php echo (is_file('uploads/information/'.$information->image))? thumb("uploads/information/".$information->image,120,70,1) :' <img src=themes/tpso1/images/nophoto.gif width=120 height=70> ';?><div class="headline_news"><?php echo $information->title?></div> <?php echo strip_tags($information->detail)?></a>
				</div>
					<span class="news_date"><?php echo mysql_to_th($information->created,"S",TRUE)?></span>
				<div class="clear"></div>
			</li>
		<?php endforeach;?>
	</ul>
	
	<div class="news_list2">
		<ul class="news_list">
		<?php foreach($infos as $info):?>
			<li><a href="informations/view/<?php echo $info->id ?>"><?php echo $info->title?></a></li>
		<?php endforeach;?>
		</ul>
	</div>
	<br clear="all">
</div>