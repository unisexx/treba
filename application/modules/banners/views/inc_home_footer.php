<br clear="all">
<div id="banner-footer">
	<?php foreach($banner468 as $b468):?>
        <a href="<?=$b468->url?>" target="_blank"><img src="<?=$b468->image?>" alt="<?php echo $b468->title?>" width="<?=$b468->width?>" height="<?=$b468->height?>"></a><br clear="all">
    <?php endforeach;?>
    <!-- <a href="tickers/view/2"><div class="ex-banner6"><h4>โฆษณาตำแหน่งนี้ 200/เดือน<br>468px x 60px คลิก</h4></div></a> -->

    <?php foreach($banner125 as $b125):?>
        <a href="<?=$b125->url?>" target="_blank"><img src="<?=$b125->image?>" alt="<?php echo $b125->title?>" width="<?=$b125->width?>" height="<?=$b125->height?>" class="foot-banner"></a>
    <?php endforeach;?>
    <a href="tickers/view/2"><div class="pull-left banner125">โฆษณาตำแหน่งนี้ 200/เดือน<br>125px x 125px คลิก</div></a>
    <!-- <div class="row">
    <div class="span9">
    <a href="tickers/view/2"><div class="pull-left banner125">โฆษณาตำแหน่งนี้ 200/เดือน<br>125px x 125px คลิก</div></a>
    <a href="tickers/view/2"><div class="pull-left banner125">โฆษณาตำแหน่งนี้ 200/เดือน<br>125px x 125px คลิก</div></a>
    <a href="tickers/view/2"><div class="pull-left banner125">โฆษณาตำแหน่งนี้ 200/เดือน<br>125px x 125px คลิก</div></a>
    <a href="tickers/view/2"><div class="pull-left banner125">โฆษณาตำแหน่งนี้ 200/เดือน<br>125px x 125px คลิก</div></a>
    <a href="tickers/view/2"><div class="pull-left banner125">โฆษณาตำแหน่งนี้ 200/เดือน<br>125px x 125px คลิก</div></a>
    </div>
    </div> -->
    
    <?php foreach($banners as $banner):?>
        <a href="<?=$banner->url?>" target="_blank"><?php echo thumb($banner->image,$banner->width,$banner->height,0,'class="foot-banner" alt="'.$banner->title.'"')?></a>
    <?php endforeach;?>
    <br clear="all">
    <br>
    
    <ul class="unstyled">
        <?php foreach($bannertxts as $bannertxt):?>
            <li class="span2"><a href="<?php echo $bannertxt->url?>" title="<?php echo $bannertxt->title?>" alt="<?php echo $bannertxt->title?>" target="_blank"><i class="icon-external-link"></i> <?php echo $bannertxt->title?></a></li>
        <?php endforeach;?>
    </ul>
</div>