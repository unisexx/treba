<div class="newlist">
	<div class="span9">
		<h2 class="header">ข่าวบันเทิงเกาหลีอัพเดท</h2>
		<div class="row">
        <div class="span3">
            <a href="kpop_news/view/<?=$newsHead->slug?>" target="_blank"><?=get_img_from_detail($newsHead->detail,220,265,1,'alt="'.$newsHead->title.'"')?></a>
            <div>
                <a href="kpop_news/view/<?=$newsHead->slug?>" style="color:#fff;" target="_blank"><?=$newsHead->title?></a>
            </div>
        </div>
        <?php foreach($news as $new):?>
            <div class="span2">
                <a href="kpop_news/view/<?=$new->slug?>" target="_blank"><?=get_img_from_detail($new->detail,100,100,1,'alt="'.$new->title.'"')?></a>
                <div>
                	<a href="kpop_news/view/<?=$new->slug?>" target="_blank"><?=$new->title?></a>
                </div>
            </div>
        <?php endforeach;?>
        </div>
        <a href="kpop_news"><div class="right btn btn-mini" type="button">ดูข่าวทั้งหมด</div></a>
	</div>
</div>
