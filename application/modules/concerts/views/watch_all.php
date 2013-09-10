<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li><a href="concerts">คอนเสิร์ตเกาหลี</a> <span class="divider">/</span></li>
    <li><a href="concerts/week/<?=$category->id?>">MBC Music Core <?=end(explode(" ",$category->concert_vid->title))?> - <?=$category->title?></a> <span class="divider">/</span></li>
    <li class="active">ดูทั้งหมด</li>
</ul>
<link id="facebookThumb" rel="image_src" href="http://i3.ytimg.com/sh/6MWdxFRRIpw/showposter.jpg?v=502df764">
<h1>MBC Music Core <?=end(explode(" ",$category->concert_vid->title))?> - <?=$category->title?></span></h1>
<?=addThis()?>
<div class="watch_online">
    <div align="center">
        <?php foreach($vids as $vid):?>
            <div class="fetch-vid-blk">
                <h3><a href="concerts/watch/<?=$vid->slug?>"><?=$vid->title?></a></h3>
                <?php $arr = parse_url($vid->url);?>
                <a href="<?php echo $vid->url?>" class="youtube-lazy-link"
                    style="background:url(http://i2.ytimg.com/vi/<?php echo getYouTubeIdFromURL($vid->url)?>/0.jpg) no-repeat 50% 50% black;">
                    <div class="youtube-lazy-link-div"></div>
                    <!-- <iframe width="640" height="390" style="vertical-align:top;" src="http://www.youtube.com/embed/<?php echo getYouTubeIdFromURL($vid->url)?>?<?php echo $arr['query']?>&amp;autoplay=1" frameborder="0" allowfullscreen=""></iframe> -->
                </a>
            </div>
        <?php endforeach;?>
    </div>
</div>
<?=fanpage_button();?>
<?=facebook_comment();?>