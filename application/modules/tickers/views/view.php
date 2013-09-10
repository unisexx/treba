<ul class="breadcrumb">
    <li><a href="">Home</a> <span class="divider">/</span></li>
    <li><a href="">ประกาศ</a> <span class="divider">/</span></li>
    <li class="active"><?=$ticker->title?></li>
</ul>
<h1><?=$ticker->title?></h1>
<?=addThis()?>
    <div class="newcontent">
        <?=get_facebook_thumbnail($ticker->detail)?>
        <?=$ticker->detail?>
    </div>
<?=fanpage_button();?>
<?=facebook_comment();?>