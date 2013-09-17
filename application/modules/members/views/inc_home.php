<div class="menuabout1"><img src="themes/treba/images/title_aboutMember.png" width="170" height="24" />
    <ul>
        <?php foreach($categories as $row):?>
        <li><a href="members/category/<?php echo $row->id?>"><?php echo lang_decode($row->name)?></a></li>
        <?php endforeach;?>
    </ul>
</div>