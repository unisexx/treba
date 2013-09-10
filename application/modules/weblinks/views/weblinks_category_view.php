<div id="boxmedia-page" class="corner">
	<div class="topic"><img src="<?php echo topic("topic_weblink.png") ?>"></div>
		<div id="data" style="margin:5px 0 0 0;">

			<div id="mediaitem">
				<div class="groupname"><?php echo lang_decode($categories->name,'')?></div>
				
				<div class="tbmedia">
				<table><tbody>
					<?php foreach($categories->weblink->get_page(limit()) as $weblink):?>
					<tr>
						<td><a href="<?php echo $weblink->url?>" target="<?php echo $weblink->target?>"><img src="uploads/weblinks/<?php echo $weblink->image?>" height="90" width="98"></a></td>
						<td style="padding: 10px; font-size:12px;" valign="top">
						<?php echo lang_decode($weblink->description)?>
						<br>
						<a class="link_web B" href="<?php echo $weblink->url?>" target="<?php echo $weblink->target?>"><?php echo $weblink->url?></a>
						</td>
					</tr>
					<?php endforeach;?>
				</table>
				<?php echo $categories->weblink->pagination()?>
				</div>
				
			</div>
			
		</div><!--data-->
	<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="shadow"></div>
</div><!--boxmedia-page-->
    