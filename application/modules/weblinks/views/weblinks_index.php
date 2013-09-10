<script type="text/javascript">
	$(function(){
		$(".tbmedia").hide();
		$(".groupname").click(function(){
			$(this).parent().toggleClass('active').find(".tbmedia").slideToggle();
		});
	})
</script>
<div id="boxknowledge" class="corner">
	<div class="topic"><img src="<?php echo topic("topic_weblink.png") ?>"></div>
		<div id="data" style="margin:5px 0 0 0;">
			<?php foreach($categories as $category):?>
			<div id="mediaitem">
				<div class="groupname"><?php echo lang_decode($category->name,'')?> (<?php echo $category->weblink->limit(5)->get()->result_count()?>)<span class="toggle"></span></div>
				
				<div class="tbmedia">
				<table width="100%"><tbody>
					<?php foreach($category->weblink->order_by('id','desc')->limit(5)->get() as $weblink):?>
					<tr>
						<td>
							<?php if(is_file('uploads/weblinks/'.$weblink->image)): ?>
							<a href="<?php echo $weblink->url?>" target="<?php echo $weblink->target?>">
								<img src="uploads/weblinks/<?php echo $weblink->image?>" height="90" width="98">
							</a>
							<?php endif; ?>
						</td>
						<td style="padding: 10px; font-size:12px;" valign="top">
						<?php echo lang_decode($weblink->description)?>
						<br>
						<a class="link_web B" href="<?php echo $weblink->url?>" target="<?php echo $weblink->target?>"><?php echo $weblink->url?></a>
						</td>
					</tr>
					<?php endforeach;?>
				</table>
				<div align="right"><a href="weblinks/index/<?php echo $category->id?>">ดูทั้งหมด</a></div>
				</div>
				
			</div>
			<?php endforeach;?>
			
		</div><!--data-->
	<div class="tl"></div><div class="tr"></div><div class="bl"></div><div class="br"></div><div class="shadow"></div>
</div><!--boxmedia-page-->
    