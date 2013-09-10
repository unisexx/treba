<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li><a href="kpop_news">ข่าวบันเทิงเกาหลีอัพเดท</a> <span class="divider">/</span></li>
    <li class="active"><?=$new->title?></li>
</ul>
<h1><?=$new->title?></h1>
<?=addThis()?>
    <div class="newcontent">
        <?=get_facebook_thumbnail($new->detail)?>
        <?=preg_replace('#</?a(\s[^>]*)?>#i', '', $new->detail)?>
    </div>
<?=fanpage_button();?>
<?=facebook_comment();?>
<h2>ข่าวบันเทิงเกาหลีอื่นๆที่น่าสนใจ</h2>
<?php foreach($ralates as $row):?>
    <div class="span4">
        <blockquote>
        <a class="pull-left" href="kpop_news/view/<?=$row->slug?>" style="margin-right:5px;"><?=get_img_from_detail($row->detail,40,40,1)?></a>
        <a href="kpop_news/view/<?=$row->slug?>"><?=$row->title?></a>
        </blockquote>
    </div>
    <?php echo alternator('','<br clear="all">');?>
<?php endforeach;?>