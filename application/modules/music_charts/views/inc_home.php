<div class="row">
<div class="span5">
    <h1 class="h1-title-bg">k-pop chart</h1>
    <div class="line-h1-bg">
    <div class="row">
        <div class="span5">
        	<ol style="height:250px; overflow-y: scroll;">
                <?php foreach($music_charts as $key=>$music_chart):?>
                    <li style='border-bottom: 1px dotted #DDD;'>
                    	<div>
                    		<?=thumb($music_chart->cover,90,90,1,'style="float: left; margin-right: 10px;"')?>
	                    	<a href="music_charts/watch/<?=$chart_category->slug?>/no<?=$music_chart->no?>/<?=$music_chart->slug?>/<?=$music_chart->id?>"><?=$music_chart->artist?> - <?=$music_chart->m_title?></a>
	                    	<br clear="all">
                    	</div>
                    </li>
                <?php endforeach;?>
            </ol>
        </div>
        <br clear="all">
    </div>
    </div>
    <br clear="all">
</div>
</div>