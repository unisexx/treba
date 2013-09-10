<div class="webboard_inchome">
    <div class="span9">
    <h2 class="header">เพลงเกาหลี</h2>
        <div class="row board-music">
        <?php foreach($musics as $music):?>
            <div class="span2">
                <a class="img" href="webboards/view_topic/<?=$music->slug?>/<?=$music->id?>" target="_blank"><?=get_img_from_detail($music->detail,100,100,1,"title='".$music->title."' alt='".$music->title."'")?></a>
                <div>
                    <a href="webboards/view_topic/<?=$music->slug?>/<?=$music->id?>" target="_blank"><?=$music->title?></a>
                </div>
            </div>
            <?=alternator('','','','','<br clear="all">')?>
        <?php endforeach;?>
            <br clear="all">
            <a href="webboards/category/music-room"><div class="right btn btn-mini" type="button">ดูเพลงเกาหลีทั้งหมด</div></a>
        </div>
    </div>
    
    <div class="span9">
    <h2 class="header">แกลอรี่ภาพ</h2>
        <div class="row board-gallery">
        <?php $i=0;?>
        <?php foreach($galleries as $gallery):?>
            <div class="span2">
                <a href="webboards/view_topic/<?=$gallery->slug?>/<?=$gallery->id?>" target="_blank"><?=get_img_from_detail($gallery->detail,120,150,1,'class="img-polaroid" alt="'.$gallery->title.'"')?></a>
                <div>
                    <a href="webboards/view_topic/<?=$gallery->slug?>/<?=$gallery->id?>" target="_blank"><?=$gallery->title?></a> - <?=$gallery->user->username?>
                    <?=(datediff(datetime2date($gallery->created)) == 0)?'<span class="label label-mini label-warning">ใหม่</span>':'';?>
                </div>
            </div>
        <?php $i++;?>
        <?php if($i%4 == 0):?><br clear="all"><?php endif;?>
        <?php endforeach;?><br clear="all">
        <a href="webboards/category/gallery"><div class="right btn btn-mini" type="button">ดูแกลอรี่ภาพทั้งหมด</div></a>
        </div>
    </div>
</div>
<br clear="all">
<div class="webboard_inchome">

    <div class="span4">
    <h2 class="header">ซีรีย์เกาหลี</h2>
        <ul>
        <?php foreach($series as $sery):?>
            <li><a href="webboards/view_topic/<?=$sery->slug?>/<?=$sery->id?>" target="_blank"><?=$sery->title?></a>  - <?=$sery->user->username?> <?=(datediff(datetime2date($sery->created)) == 0)?'<span class="label label-mini label-warning">ใหม่</span>':'';?></li>
        <?php endforeach;?>
        </ul>
    </div>
    
    <div class="span5">
    <h2 class="header">อื่นๆ</h2>
        <ul>
        <?php foreach($alls as $all):?>
            <li><a href="webboards/view_topic/<?=$all->slug?>/<?=$all->id?>" target="_blank">[<?=$all->webboard_category->name?>] <?=$all->title?></a> - <?=$all->user->username?> <?=(datediff(datetime2date($all->created)) == 0)?'<span class="label label-mini label-warning">ใหม่</span>':'';?></li>
        <?php endforeach;?>
        </ul>
    </div>
    <div class="span9">
        <a href="webboards"><div class="right btn btn-mini" type="button">ดูเว็บบอร์ดทั้งหมด</div></a>
    </div>
</div>

