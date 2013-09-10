<h1>Music Video</h1>
<?php echo $mvs->pagination()?>
<table class="list">
    <tr>
    	<th>สถานะ</th>
        <th>หัวข้อ</th>
        <th>url</th>
        <th width="90">
            <a class="btn" href="music_videos/admin/music_videos/form">เพิ่มรายการ</a>
        </th>
    </tr>
    <?php foreach($mvs as $mv): ?>
    <tr <?php echo cycle()?>>
    	<td><input type="checkbox" name="status" value="<?php echo $mv->id ?>" <?php echo ($mv->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'' ?> /></td>
        <td><?php echo $mv->title;?></td>
        <td><a href="<?=$mv->url?>" target="_blank"><?=$mv->url?></a></td>
        <td>
        	<a class="btn" href="music_videos/admin/music_videos/form/<?php echo $mv->id ?>" >แก้ไข</a>
            <a class="btn" href="music_videos/admin/music_videos/delete/<?php echo $mv->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
        </td>
        </tr>
    <?php endforeach; ?>
        
    </table>
<?php echo $mvs->pagination()?>