<div id="concert-inc-home">
<div class="span9">
    <h2 class="header">คอนเสิร์ต</h2>
    <div class="row">
        <div class="span4 inc-concert">
            <div><a href="concerts/week/<?=$category->id?>" target="_blank"><?=thumb("http://i3.ytimg.com/sh/6MWdxFRRIpw/showposter.jpg?v=502df764",300,150,1,'alt="MBC Music Core"')?></a></div>
            <div class="lastweektitle">
            <a href="concerts/week/<?=$category->id?>" target="_blank"><h3>MBC Music Core <?=end(explode(" ",$category->concert_vid->title))?> <?=$category->title?> สัปดาห์ล่าสุด <?=(datediff(datetime2date($category->created)) >= -3)?'<span class="label label-mini label-warning">ใหม่</span>':'';?></h3></a>
            </div>
            <div class="c_list">
                <ol>
                    <?php foreach($category->concert_vid->order_by('id','asc')->get() as $vid):?>
                        <li>
                        <div>	<?=thumb("http://img.youtube.com/vi/".getYouTubeIdFromURL($vid->url)."/0.jpg",70,40,1,'alt="'.$vid->title.'" style="float: left; margin-right: 10px;"')?>
                        	<a href="concerts/watch/<?=$vid->slug?>" target="_blank"><?=$vid->title?></a>
                        	<br clear="all">
                        	</div>
                        </li>
                    <?php endforeach;?>
                </ol>
            </div>
        </div>
        <div class="span5">
        	<?php foreach($categories as $category):?>
				<div>
					<div class="c_content"><a href="concerts/week/<?=$category->id?>" target="_blank">MBC Music Core <?=end(explode(" ",$category->concert_vid->title))?> - <?=$category->title?></a></div>
					<a href="concerts/week/<?=$category->id?>" target="_blank">
					<div class="c_thumb_content">
						<?=thumb("http:".$category->thumb_1,70,50,1,'alt="MBC Music Core '.end(explode(" ",$category->concert_vid->title)).'"')?><?=thumb("http:".$category->thumb_2,70,50,1,'alt="MBC Music Core '.end(explode(" ",$category->concert_vid->title)).'"')?><?=thumb("http:".$category->thumb_3,70,50,1,'alt="MBC Music Core '.end(explode(" ",$category->concert_vid->title)).'"')?><?=thumb("http:".$category->thumb_4,70,50,1,'alt="MBC Music Core '.end(explode(" ",$category->concert_vid->title)).'"')?><?=thumb("http:".$category->thumb_5,70,50,1,'alt="MBC Music Core '.end(explode(" ",$category->concert_vid->title)).'"')?>
					</div>
					</a>
					<br clear="all">
				</div>
			<?php endforeach;?>
        </div>
        <br clear="all">
        <a href="concerts"><div class="right btn btn-mini" type="button">ดูคอนเสิร์ตทั้งหมด</div></a>
    </div>
</div>
</div>