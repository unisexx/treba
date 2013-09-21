<div class="title_sponsor"></div>
<div id="sponsor">
    <ul class="first-and-second-carousel jcarousel-skin-trebabanner">
        <?php foreach($banner_weblinks as $row):?>
            <li><a href="<?php echo $row->url?>" target="_blank"><img src="uploads/weblink/<?php echo $row->image?>" width="120" height="60" alt="" /></a></li>
        <?php endforeach;?>
    </ul>
</div>
<div class="clr"></div>