<ul class="subtopmenu4" style="padding-top:6px; width:100%;">
    <?php foreach($categories as $row):?>
    <li><a href="members/category/<?php echo $row->id?>"><?php echo lang_decode($row->name)?></a></li>
    <?php endforeach;?>
</ul>