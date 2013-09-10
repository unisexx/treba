<script type="text/javascript">
	$(document).ready(function(){
		$("ul.column_news li:even").css("border-right","1px dotted #ccc");
	});
</script>
<div class="box" style="position: relative; margin: 10px 0 0 0;">
	<ul class="column_news">
		<?php foreach($informations as $information):?>
			<li>
				<div class="newContent">
					<a href="informations/view/<?php echo $information->id ?>" class="link_news"><?php echo thumb("uploads/information/".$information->image,120,70,1)?><div class="headline_news"><?php echo $information->title?></div> <?php echo strip_tags($information->detail)?></a>
				</div>
					<span class="news_date"><?php echo mysql_to_th($information->created,"S",TRUE)?></span>
				<div class="clear"></div>
			</li>
		<?php endforeach;?>
	</ul>
	<br clear="all">
</div>

<div class="dsNewlist">
	<ul>
		<?php foreach($infos as $info):?>
			<li><a href="informations/view/<?php echo $info->id ?>"><?php echo $info->title?></a></li>
		<?php endforeach;?>
	</ul>
</div>