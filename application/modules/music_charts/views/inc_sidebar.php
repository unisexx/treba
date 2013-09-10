<div class="sidebar-nav well music-chart">
    <h2>ชาร์ตเพลงเกาหลี <?=(datediff(datetime2date($chart_category->created)) >= -3)?'<span class="label label-mini label-warning">ใหม่</span>':'';?></h2>
    <div class="custom">
          <div class='weektitle'><?=$chart_category->title?></div>
          <table class="table">
              <?php foreach($music_charts as $key=>$music_chart):?>
                <tr>
                    <td><span class="blueranking"><?=$music_chart->no?></span></td>
                    <td>
                        <a href="music_charts/watch/<?=$chart_category->slug?>/no<?=$music_chart->no?>/<?=$music_chart->slug?>/<?=$music_chart->id?>" target="_blank"><?php echo thumb($music_chart->cover,30,30,1,'alt="'.$music_chart->artist.' - '.$music_chart->m_title.'" style="float: left; margin-right: 10px;"')?></a>
                        <a href="music_charts/watch/<?=$chart_category->slug?>/no<?=$music_chart->no?>/<?=$music_chart->slug?>/<?=$music_chart->id?>" target="_blank"><?=$music_chart->artist?> - <?=$music_chart->m_title?></a>
                        <br clear="all">
                    </td>
                </tr>
            <?php endforeach;?>
          </table>
          <div class="more"><a href="music_charts/week/<?=$chart_category->slug?>">ดูทั้งหมด</a></div>
    </div>
</div>