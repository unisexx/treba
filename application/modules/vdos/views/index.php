<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li class="active">ซีรีย์เกาหลีซับไทยออนไลน์</li>
</ul>
<h1>ซีรีย์เกาหลีซับไทยออนไลน์</h1>
<div class="row series-blk">
<?php $i=0;?>
<?php foreach($categories as $category):
    $lastestEP = $category->vdo->where("category_id = ".$category->id)->order_by('orderlist desc , id desc')->get();
?>
<div class="span3">   
    <div class="thumbnail well">
        <a href="vdos/view/<?=$category->slug?>"><?=thumb($category->image,260,180,1,$param = NULL)?></a>
        <div class="caption">
            <h3><?=$category->name?></h3>
            <span class="label"><?=$lastestEP->title?></span> 
            <?=(datediff(datetime2date($lastestEP->created)) == 0)?'<span class="label label-warning">อัพเดท</span>':'';?>
            <?php if($category->end == "end"):?>
                <span class="label label-success">End</span>
            <?php endif;?>
            <div class="btn-toolbar">
                <div class="btn-group">
                    <button class="btn btn-small btn-primary dropdown-toggle" data-toggle="dropdown">ดูซีรีย์ <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                      <?php
                            $episode = new Vdo();
                            $episode->where("category_id = ".$category->id)->order_by('orderlist','asc')->get();
                            foreach($episode as $ep):
                        ?>
                            <li><a href="vdos/series_online/ดูซีรีย์เกาหลี-<?=clean_url($category->name)?>-<?=$ep->title?>-ซับไทย-ออนไลน์-<?=$ep->id?>" target="_blank">ดูซีรีย์เกาหลี <?=$category->name?> - <?=$ep->title?></a></li>
                        <?php endforeach;?>
                    </ul>
                </div>
            <div class="btn-group">
                <a href="vdos/view/<?=$category->slug?>" class="btn btn-small" target="_blank">อ่านเรื่องย่อซีรีย์</a>
            </div>
            </div>
        </div>
    </div>
</div>
<?php echo alternator('', '','<br clear="all">');?>
<?php $i++;?>
<?php endforeach;?>
<br clear="all">
<?php echo $categories->pagination()?>
</div>