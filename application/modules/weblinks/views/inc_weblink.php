<div class="<?php echo lang('title_weblink');?>"></div>
<div class="<?php echo lang('titlewelink1');?>"></div>
<div id="weblink">
<!-- <div class="btn_readAll" style="margin-top:25px; margin-right:10px;"></div> -->
    <ul class="first-and-second-carousel jcarousel-skin-treba" style="margin-top:20px !important;">
        <?php foreach($broker_weblinks as $row):?>
            <li><a href="<?php echo $row->url?>" target="_blank"><img src="uploads/weblink/<?php echo $row->image?>" width="89" height="52" alt="" /></a></li>
        <?php endforeach;?>
    </ul>
  <div class="line4"></div>
  <div class="<?php echo lang('titlewelink2');?>"></div>
  <!-- <div class="btn_readAll" style="margin-top:20px; margin-right:10px;"></div> -->
    <ul class="first-and-second-carousel jcarousel-skin-treba" style="margin-top:15px !important;>
        <?php foreach($consumer_weblinks as $row):?>
            <li><a href="<?php echo $row->url?>" target="_blank"><img src="uploads/weblink/<?php echo $row->image?>" width="89" height="52" alt="" /></a></li>
        <?php endforeach;?>
    </ul>
</div>