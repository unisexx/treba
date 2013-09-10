<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li class="active">ข่าวบันเทิงเกาหลีอัพเดท</li>
</ul>
<h1>ข่าวบันเทิงเกาหลีอัพเดท</h1>
<div class="newlist row">
    <?php foreach($news as $new):?>
        <div class="span9 well">
            <a href="kpop_news/view/<?=$new->slug?>" target="_blank"><?=get_img_from_detail($new->detail,180,135,1,"class='img-news'")?></a>
            <iframe src="https://www.facebook.com/plugins/like.php?app_id=136698876474938&href=http://www.kpoplover.com/kpop_news/view/<?=$new->slug?>&send=true&layout=box_count&width=55&show_faces=false&action=like&colorscheme=light&font&height=61" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:55px; height:61px; float:right;" allowTransparency="true"></iframe>
            <h3><a href="kpop_news/view/<?=$new->slug?>" target="_blank"><?=$new->title?></a></h3>
            <?=(datediff(datetime2date($new->created)) == 0)?'<span class="label label-warning">'.mysql_to_th($new->created,'s').'</span>':'<span class="label">'.mysql_to_th($new->created,'s').'</span>';?>
            <div class="short-detail"><?=strip_tags($new->detail);?></div>
        </div>
    <?php endforeach;?>
    <br clear="all">
    <?php echo $news->pagination();?>
</div>
