<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li class="active">มิวสิควีดีโอเพลงเกาหลี</li>
</ul>
<h1>มิวสิควีดีโอเพลงเกาหลี</h1>
<div class="row">
    <?php foreach($mvs as $mv):?>
        <div class="span4">
        <div class="clearfix">
        <div class="video-thumb">
            <a href="music_videos/view/<?=$mv->slug?>" target="_blank">
                <div class="thumbnail video">
                    <span class="video-thumb-container">
                        <span class="wrap">
                            <span class="shim"></span>
                            <?=YoutubeIframeConverter($mv->video_script,"thumb")?>
                        </span>
                        <span class="play">Play</span>
                    </span>
                </div>
            </a>
        </div>
        <a href="music_videos/view/<?=$mv->slug?>" target="_blank"><?=$mv->title?></a> <?=(datediff(datetime2date($mv->created)) >= -1)?'<span class="label label-mini label-warning">ใหม่</span>':'';?>
        <div class="author"></div>
        <div class="viewcount"></div>
        </div>
        </div>
        <?php echo alternator('','<br clear="all">');?>
    <?php endforeach;?>
</div>
<?=$mvs->pagination()?>