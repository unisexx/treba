<script type="text/javascript">
	$(window).load(function(){
		$("#boxnotify-page img").each(function(){
			var width = $(this).width();
			if(width > 600){
				$(this).width(600);
			}
		});
	});
</script>
<div class="notices">
	<div class="header-bar">
		<h1>ข่าวสารอัพเดต</h1>
	</div>
	
<div class="corner" id="boxnotify-page">
<div id="data">
<div class="box-notify-detail">
<h2><?php echo lang_decode($information->title) ?></h2>
<strong class="TxtGray2">ประกาศ ณ วันที่ <?php echo mysql_to_th($information->approve_date,'F') ?></strong> 

<div id="observe" style="text-align: center;margin:25px 0px;">
<img src="<?php echo (is_file('uploads/information/'.$information->image))?'uploads/information/'.$information->image : 'themes/tpso1/images/nophoto.gif' ?>" class="photo">	
</div><!--observe-->
<?php echo lang_decode($information->detail) ?>
</div><!--box-notify-detail-->
</div><!--data-->
</div>
</div>