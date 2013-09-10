<h1><a href="music_charts/admin/music_charts">Music Chart</a> » <?php echo $category->title?></h1>

<form action="music_charts/admin/music_charts/save/<?php echo $category->id?>" method="post" enctype="multipart/form-data" id="gallery_form">
<table class="form">
    <tr>
        <th>หัวข้อ :</th>
        <td colspan="2"><input class="full" type="text" name="title" value="<?php echo $category->title?>"></td>
    </tr>
    <?php if($category->id != ""):?>
        <?php foreach($musics as $music):?>
            <tr>
                <th>อันดับที่ :</th>
                <td>
                    <input type="text" name="no[]" value="<?php echo $music->no?>" style="width: 30px;">
                    <input type="hidden" name="music_id[]" value="<?php echo $music->id?>">
                </td>
                <td><?php echo $music->artist?> - <?php echo $music->m_title?></td>
                <td>
                    <select name="music_chart_db_id[]">
                        <option value="0">--- เลือกเพลง ---</option>
                        <?php foreach($music_dbs as $mdb):?>
                            <option value="<?php echo $mdb->id?>" <?php echo ($mdb->id == $music->music_chart_db_id)?"selected":"";?>><?php echo $mdb->artist?> - <?php echo $mdb->m_title?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
        <?php endforeach;?>
    <?php else:?>
        <?php for ($i=1; $i<=100; $i++):?>
            <tr>
                <th>อันดับที่ :</th>
                <td><input type="text" name="no[]" value="<?php echo $i?>" style="width: 30px;"></td>
                <td>
                    <select name="music_chart_db_id[]">
                        <option>--- เลือกเพลง ---</option>
                        <?php foreach($music_dbs as $mdb):?>
                            <option value="<?php echo $mdb->id?>"><?php echo $mdb->m_title?> - <?php echo $mdb->artist?></option>
                        <?php endforeach;?>
                    </select>
                </td>
            </tr>
        <?php endfor;?>
    <?php endif;?>
    <tr>
        <th></th>
        <td>
            <?php echo form_referer() ?>
            <input type="submit" value="บันทึก">
        </td>
    </tr>
</table>
</form>