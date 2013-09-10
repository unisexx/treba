<link rel="stylesheet" href="media/js/prettyGallery1.1.1/css/prettyGallery.css" type="text/css" media="screen" title="no title" charset="utf-8" />
<style type="text/css">
	#dsgallery{margin:0 0 0 23px; position:relative;}
	.prettyGallery li{margin:0 2px;}
	.prettyGallery img{border:3px solid #d1d1d1; margin:0 0 0 2px;}
	.pg_previous{position:absolute; left:-10px; top:30px;}
	.pg_next{position:absolute; right:15px; top:30px;}
	.showcast{width:595px; height:395px; border:3px solid #d1d1d1; margin: 0 auto 10px;}
</style>
<script src="media/js/prettyGallery1.1.1/js/jquery.prettyGallery.js" type="text/javascript" charset="utf-8"></script>

<div class="showcast" style="position: relative;">
</div>

<div id="dsgallery">
	<ul class="prettyGallery">
		<?php foreach($galleries as $gallery):?>
			<li>
				<?php echo thumb($gallery->image,105,70,0,"class='small-pic' style='cursor:pointer;'")?>
				<input type="hidden" name="id" value="<?php echo $gallery->id?>">
				<input type="hidden" name="image" value="<?php echo $gallery->image?>">
			</li>
		<?php endforeach;?>
	</ul>
</div>

<script type="text/javascript" charset="utf-8">
	$(document).ready(function(){
		$('.prettyGallery').prettyGallery({
			'navigation':'bottom',
			'itemsPerPage':5
		});
		
		$('.small-pic').click(function(){
			$(this).css('border','3px solid #5d5d5b').parent().siblings().children().css('border','3px solid #d1d1d1');
			var id = $(this).next("input[name='id']").val();
			var image = $(this).next().next("input[name='image']").val();
			$.get('galleries/ajax_district_load',{
				'id' : id,
				'image' : image
			},function(data){
				$('.showcast').html(data).hide().fadeIn();
			});
		});
		
		$('.pg_paging').find('li').eq(1).remove();
		
		$('.prettyGallery li:first img').addClass('first');
		var id = $('img.first').next("input[name='id']").val();
		var image = $('img.first').next().next("input[name='image']").val();
		$.get('galleries/ajax_district_load',{
			'id' : id,
			'image' : image
		},function(data){
			$('.showcast').html(data).hide().fadeIn();
			$('img.small-pic:first').css('border','3px solid #5d5d5b');
		});
	});
</script>