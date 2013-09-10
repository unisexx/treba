<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li><a href="concerts">คอนเสิร์ตเกาหลี</a> <span class="divider">/</span></li>
    <li><a href="concerts/week/<?=$vid->concert_category->id?>">MBC Music Core <?=end(explode(" ",$vid->title))?> -  <?=$vid->concert_category->title?></a> <span class="divider">/</span></li>
    <li class="active"><?=$vid->title?></li>
</ul>

<h1><?=$vid->title?></span></h1>
<?=addThis()?>
<link id="facebookThumb" rel="image_src" href="http://img.youtube.com/vi/<?=getYouTubeIdFromURL($vid->vdo_script)?>/0.jpg">
<div class="watch_online">
    <div align="center">
        <div><?=get_vdo($vid->vdo_script)?></div>
    </div>
</div>
<?=fanpage_button();?>
<?=facebook_comment();?>