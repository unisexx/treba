<style type="text/css">
.clear{
clear:both;
}

.tab{;
margin:0 auto;
}

.tab div div{
display:none;
padding:10px; height:95px;
}

.tab ul li{
display:inline;
cursor:pointer;
color:#095CA7;
padding:2px 10px;
float:left;
margin:3px 0 0 3px;
}

.tab ul li.active{
color:#5895CB;
}

#linkgroup img{
	border: 1px solid #cccccc;
}

#tab_1{
	display:block;	
}
</style>

<script language="javascript">
$(function(){
	$(".tab ul li:first").addClass('active');
	
	$(".tab ul li").click(function(){
		$(this).addClass("active").siblings().removeClass("active").end().parent() .parent().find("div > div:eq(" + $(this).parent().find('li').index($(this)) + ")").show().siblings().hide();
	});
});
</script>

<img src="<?php echo topic("topic_weblink.png") ?>" width="130" height="18" style="float:left;" />
<div id="linkgroup" class="tab B">
    <ul>
    	<?php foreach($categories as $category):?>
			<li><?php echo lang_decode($category->name,'')?></li>
		<?php endforeach;?>
    </ul>
	<br class="clear">
    <div>
		<?php foreach($categories as $key => $category):?>
			<div id="tab_<?php echo $key + 1?>">
				<MARQUEE width="930" scrollamount='1.5' scrolldelay='1' onmouseover='this.stop();' onmouseout='this.start();'>
				<?php foreach($category->weblink as $weblink):?>
					<a href="<?php echo $weblink->url?>" target="<?php echo $weblink->target?>"><img src="uploads/weblinks/<?php echo $weblink->image?>" alt="<?php echo lang_decode($weblink->title)?>" title="<?php echo lang_decode($weblink->title)?>" width="98" height="90" /></a>
				<?php endforeach;?>
				</MARQUEE>
			</div>
		<?php endforeach;?>
    </div>
</div>