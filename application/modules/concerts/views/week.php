<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li><a href="concerts">คอนเสิร์ตเกาหลี</a> <span class="divider">/</span></li>
    <li class="active">MBC Music Core <?=end(explode(" ",$category->concert_vid->title))?> - <?=$category->title?></li>
</ul>
<link id="facebookThumb" rel="image_src" href="http://i3.ytimg.com/sh/6MWdxFRRIpw/showposter.jpg?v=502df764">
<h1>MBC Music Core <?=end(explode(" ",$category->concert_vid->title))?> - <?=$category->title?></span></h1>
<?=addThis()?>
<div class="watch_online">
    <div>
    		<div class="well">
    				<a href="concerts/watch_all/<?=$category->id?>"><?=thumb("http://i3.ytimg.com/sh/6MWdxFRRIpw/showposter.jpg?v=502df764",300,150,1,'style="float: left; margin-right: 10px;"')?></a>
	            <div>
	            	<div>MBC Music Core <?=end(explode(" ",$category->concert_vid->title))?> - <?=$category->title?></div>
	            	<div><a href="concerts/watch_all/<?=$category->id?>"><div class="btn btn-primary" type="button">ดูทั้งหมด</div></a></div>
	            	<br clear="all">
	            </div>
            </div>
            
        <?php foreach($vids as $vid):?>
        	<div class="well clearfix">
        		<a href="concerts/watch/<?=$vid->slug?>" target="_blank"><?=thumb("http://img.youtube.com/vi/".getYouTubeIdFromURL($vid->url)."/0.jpg",124,70,1,'style="float: left; margin-right: 10px;"')?></a>
	            <div>
	            	<div><a href="concerts/watch/<?=$vid->slug?>" target="_blank"><?=$vid->title?></a></div>
	            	<div class="author"></div>
					<div class="viewcount"></div>
					<input type="hidden" name="youtube_id" value="<?=getYouTubeIdFromURL($vid->url)?>">
	            </div>
            </div>
        <?php endforeach;?>
    </div>
</div>
<?=fanpage_button();?>
<?=facebook_comment();?>