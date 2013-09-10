<?php foreach($banners as $banner):?>
    <?php if($banner->image):?>
        <a href="<?=$banner->url?>" target="_blank"><img class="side-banner" alt="<?php echo $banner->title?>" width="<?=$banner->width?>" height="<?=$banner->height?>" src="<?=$banner->image?>"></a>
    <?php else:?>
        <a href="<?=$banner->url?>" target="_blank"><object width="<?=$banner->width?>" height="<?=$banner->height?>" data="<?=$banner->media?>"></object></a>
    <?php endif;?>
<?php endforeach;?>
        
<a href="tickers/view/2"><div id="ex-banner1"><h4>โฆษณาตำแหน่งนี้ 200/เดือน<br>220px x 100px คลิก</h4></div></a>
<br>