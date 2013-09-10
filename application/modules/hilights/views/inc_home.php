<style type="text/css">
.aviaslider{ 
height:219px; 	/*this changes the height of the image slider*/
width:713px;
overflow: hidden;
position: relative;
background: #fff url(media/js/aviaslider/html/images/layout/preload.gif) center center no-repeat;
margin:0px;
}

.aviaslider li, .aviaslider .featured{
display: block;
width:100%;
height:100%;
position: absolute;
top:0;
left:0;
z-index: 1;
}

.js_active .aviaslider li, .js_active .aviaslider .featured{
display:none;
}

.aviaslider img, .aviaslider a img, .aviaslider a{
border:none;
text-decoration: none;
}

.slidecontrolls{
z-index: 100;
margin: -215px 0 0 565px;
position: relative;
float:left;
}

.slidecontrolls a{
height:20px;
width:18px;
display:block;
cursor: pointer;
background: transparent url(media/js/aviaslider/html/images/layout/controlls.gif) center bottom no-repeat;
float:left;
outline: none;
}

.slidecontrolls a:hover, .slidecontrolls .active_item{
background: transparent url(media/js/aviaslider/html/images/layout/controlls.gif) center top no-repeat;
}

.feature_excerpt{
width: 713px;
position: absolute;
display: block;
bottom: 0;
left:0;
z-index: 2;
padding:14px 15px;
font-size: 11.5px;
line-height:1.5em;
cursor: pointer;
background: #000;
color: #fff;
}

.feature_excerpt strong{
display: block;
font-size: 15px;
padding-bottom: 3px;
}
</style>
	<!-- ########## CSS Files ########## -->	
	<!-- lightbox CSS -->
	<link rel="stylesheet" href="media/js/aviaslider/html/js/prettyPhoto/css/prettyPhoto.css" type="text/css" media="screen" />	
	<!-- ########## end css ########## -->	
	
	
	<!-- JAVASCRIPT GOES HERE -->		
	<script src="media/js/aviaslider/html/js/prettyPhoto/js/jquery.prettyPhoto.js" type="text/javascript"></script>	
	
	<!--this file includes the aviaslider: -->
	<script type='text/javascript' src='media/js/aviaslider/html/js/jquery.aviaSlider.js'></script>
	
	<!--this file includes the activation call for the avia slider. You should edit here: -->
	<script type='text/javascript' src='media/js/aviaslider/html/js/custom.js'></script>

	
			
<ul class='aviaslider' id="frontpage-slider">
	<?php foreach($hilights as $hilight):?>
		<li><a href="<?php echo $hilight->url?>" title=""><img src="uploads/hilight/<?php echo $hilight->image?>" alt="<?php echo $hilight->title?>" /></a></li>
	<?php endforeach;?>
</ul>