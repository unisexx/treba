<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>

<h1><a href="music_charts/admin/music_charts/music_db">Music Chart DB</a> » <?php echo $music->title?></h1>

<form action="music_charts/admin/music_charts/music_db_save/<?php echo $music->id?>" method="post" enctype="multipart/form-data" id="gallery_form">
<table class="form">
    <tr>
        <th>รูป :</th>
        <td>
            <!-- <input class="full" type="text" name="artist" value="<?php echo $music->cover?>"> -->
            <input type="text" class="full" name="cover" value="<?php echo $music->cover?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'galleries')" />
        </td>
    </tr>
    <tr>
        <th>เพลง :</th>
        <td><input class="full" type="text" name="m_title" value="<?php echo $music->m_title?>"></td>
    </tr>
    <tr>
        <th>นักร้อง :</th>
        <td><input class="full" type="text" name="artist" value="<?php echo $music->artist?>"></td>
    </tr>
    <tr>
        <th>youtube url :</th>
        <td><textarea class="full" name="vdo_url"><?php echo $music->vdo_url?></textarea></td>
    </tr>
    <tr>
        <th></th>
        <td>
            <?php echo form_referer() ?>
            <input type="submit" value="บันทึก">
        </td>
    </tr>
</table>
</form>