<div class="sidebar-nav well">
    <h2>ซีรีย์เกาหลีซับไทยมาใหม่</h2>
    <div class="custom">
        <ul class="nav nav-tabs" id="seriesTab">
          <li class="active"><a href="#updated">อัพเดท</a></li>
          <li><a href="#onair">ยังไม่จบ</a></li>
          <li><a href="#end">จบแล้ว</a></li>
        </ul>
        <div class="tab-content">
          <div class="tab-pane active" id="updated">
              <ul class="unstyled">
                <?php foreach($vdos as $key=>$vdo):?>
                    <li><a href="vdos/series_online/ดูซีรีย์เกาหลี-<?=clean_url($vdo->category->name)?>-<?=$vdo->title?>-ซับไทย-ออนไลน์-<?=$vdo->id?>" target="_blank"><?=$vdo->category->name?> - <?=$vdo->title?></a> 
					<?php if($vdo->category->end == "end"):?><span class="label label-mini label-success">End</span><?php endif;?>
                	<?=(datediff(datetime2date($vdo->created)) == 0)?'<span class="label label-mini label-warning">ใหม่</span>':'';?></li>
                <?php endforeach;?>
            </ul>
          </div>
          <div class="tab-pane" id="onair">
              <ul class="unstyled">
                    <?php foreach($ocategories as $key=>$category):?>
                        <li><a href="vdos/view/<?=$category->slug?>" target="_blank"><?=$category->name?></a></li>
                    <?php endforeach;?>
              </ul>
          </div>
          <div class="tab-pane" id="end">
            <ul class="unstyled">
                <?php foreach($ecategories as $key=>$category):?>
                    <li><a href="vdos/view/<?=$category->slug?>" target="_blank"><?=$category->name?></a></li>
                <?php endforeach;?>
            </ul>
          </div>
        </div>
    </div>
</div>