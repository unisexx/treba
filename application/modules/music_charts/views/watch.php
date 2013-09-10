<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li><a href="music_charts">K-pop Chart</a> <span class="divider">/</span></li>
    <li><a href="music_charts/week/<?=$music_chart->music_chart_category->slug?>"><?=$music_chart->music_chart_category->title?></a> <span class="divider">/</span></li>
    <li class="active"><?=$music_chart->artist?> - <?=$music_chart->m_title?></li>
</ul>
<h1><?=$music_chart->artist?> - <?=$music_chart->m_title?></h1>
<?=addThis()?>
<div class="watch_online">
    <div align="center">
        <link rel="image_src" href="http://img.youtube.com/vi/<?=getYouTubeIdFromURL($music_chart->vdo_url)?>/0.jpg">
        <?php echo get_vdo($music_chart->vdo_url)?>
    </div>
</div>
<?=fanpage_button();?>
<?=facebook_comment();?>