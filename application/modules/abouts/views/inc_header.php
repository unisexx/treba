<ul class="subtopmenu3" style="padding-top:6px;">
    <?php foreach($abouts as $row):?>
    <li><a href="abouts/view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></li>
    <?php endforeach;?>
</ul>