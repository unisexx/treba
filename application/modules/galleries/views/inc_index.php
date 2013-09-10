<link rel="stylesheet" type="text/css" href="media/js/featured-content-slider/style.css" />
<!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" ></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.5.3/jquery-ui.min.js" ></script> -->
<script type="text/javascript">
	$(document).ready(function(){
		$("#featured > ul").tabs({fx:{opacity: "toggle"}}).tabs("rotate", 5000, true);
	});
</script>

<div id="featured" >
	  <ul class="ui-tabs-nav">
	     <?php foreach($galleries as $key=>$gallery):?>
	    	<li class="ui-tabs-nav-item" id="nav-fragment-<?=$key+1?>"><a href="#fragment-<?=$key+1?>"><?php echo thumb($gallery->image,80,50,1)?><span><?php echo $gallery->title?></span></a></li>
	    <?php endforeach;?>
	  </ul>


	<?php foreach($galleries as $key=>$gallery):?>
	<div id="fragment-<?=$key+1?>" class="ui-tabs-panel ui-tabs-hide" style="">
		<?php echo thumb($gallery->image,400,250,1)?>
		 <div class="info" >
			<h2><a href="#" ><?php echo $gallery->title?></a></h2>
			<!-- <p><?php echo $hilight->title?></p> -->
         </div>
    </div>
	<?php endforeach;?>
	</div>
</div>
<br>
<br clear="all">