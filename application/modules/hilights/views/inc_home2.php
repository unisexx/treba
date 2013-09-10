<!-- <script type="text/javascript">
$(document).ready(function(){
	$('.carousel').carousel({
	  interval: 5000
	});
	
	$('div.item:first').addClass('active');
});
</script> -->
<div class="span9">
<div id="myCarousel" class="carousel slide">
  <!-- Carousel items -->
  <div class="carousel-inner" style="height:300px; background:#000;">
  	<?php foreach($hilights as $hilight):?>
  		<div class="item">
  			<a href="vdos/series_online/ดูซีรีย์เกาหลี-<?=clean_url($hilight->category->name)?>-<?=$hilight->title?>-ซับไทย-ออนไลน์-<?=$hilight->id?>">
  			    <div align="center">
  				  <?=get_img_from_detail($hilight->category->detail,500,300,1,"class='img-news'")?>
  				</div>
  				<div class="carousel-caption">
                  <h4><?=$hilight->category->name?> [<?=$hilight->title?>]</h4>
                  <!-- <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p> -->
                </div>
  			</a>
  		</div>
  	<?php endforeach;?>
  </div>
  <!-- Carousel nav -->
  <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
  <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
</div>
</div>