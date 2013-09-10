<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li><a href="music_videos">มิวสิควีดีโอเพลงเกาหลี</a> <span class="divider">/</span></li>
    <li class="active"><?=$mv->title?></li>
</ul>
<h1><?=$mv->title?></h1>
<?=addThis()?>
    <div class="newcontent mvcontent">
        <?=get_facebook_thumbnail_from_youtube_iframe($mv->video_script)?>
        <?=preg_replace('#</?a(\s[^>]*)?>#i', '', $mv->detail)?>
        <br>
		<div id="dead_link" class="btn btn-mini pull-right">วิดีโอดูไม่ได้ แจ้งไฟล์เสียคลิกที่นี่จ้า</div>
		<br clear="all">
    </div>
<?=fanpage_button();?>
<?=facebook_comment();?>
<input id="vdo_id" type="hidden" value="<?=$mv->id?>">
<input id="url" type="hidden" value="http://www.kpoplover.com<?=$_SERVER['PATH_INFO']?>">
<input id="type" type="hidden" value="mv">