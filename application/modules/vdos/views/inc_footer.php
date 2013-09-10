<?php foreach($vdos as $key=>$vdo):?>
    <li><a href="vdos/series_online/ดูซีรีย์เกาหลี-<?=clean_url($vdo->category->name)?>-<?=$vdo->title?>-ซับไทย-ออนไลน์-<?=$vdo->id?>" target="_blank"><?=$vdo->category->name?> - <?=$vdo->title?></a> 
    <?php if($vdo->category->end == "end"):?><span class="label label-mini label-success">End</span><?php endif;?>
    <?=(datediff(datetime2date($vdo->created)) == 0)?'<span class="label label-mini label-warning">ใหม่</span>':'';?></li>
<?php endforeach;?>