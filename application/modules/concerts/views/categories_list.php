<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li class="active">คอนเสิร์ตเกาหลี</li>
</ul>
<h1>คอนเสิร์ตเกาหลี</h1>
<?php foreach($categories as $category):?>
	<div class="well concert-cat-block">
		<div class="c_content"><a href="concerts/week/<?=$category->id?>">MBC Music Core <?=end(explode(" ",$category->concert_vid->title))?> - <?=$category->title?></a></div>
		<a href="concerts/week/<?=$category->id?>">
		<div class="c_thumb_content">
			<?=thumb("http:".$category->thumb_1,70,50,1)?><?=thumb("http:".$category->thumb_2,70,50,1)?><?=thumb("http:".$category->thumb_3,70,50,1)?><?=thumb("http:".$category->thumb_4,70,50,1)?><?=thumb("http:".$category->thumb_5,70,50,1)?>
		</div>
		</a>
		<br clear="all">
	</div>
<?php endforeach;?>
<?php echo $categories->pagination();?>