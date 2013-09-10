<h1>Music Chart DB</h1>
<?php include('_menu.php') ?>
<?php echo $music_dbs->pagination()?>
<table class="list">
    <tr>
        <th>รูป</th>
        <th>เพลง</th>
        <th>นักร้อง</th>
        <th width="90">
            <a class="btn" href="music_charts/admin/music_charts/music_db_form">เพิ่มรายการ</a>
        </th>
    </tr>
    <?php foreach($music_dbs as $row): ?>
    <tr <?php echo cycle()?>>
        <td>
            <!-- <img src="<?php echo $row->cover;?>" width="50" height="50"> -->
            <?php echo thumb($row->cover,50,50,false)?>
        </td>
        <td><?php echo $row->m_title;?></td>
        <td><?php echo $row->artist?></td>
        <td>
            <a class="btn" href="music_charts/admin/music_charts/music_db_form/<?php echo $row->id ?>" >แก้ไข</a>
            <a class="btn" href="music_charts/admin/music_charts/music_db_delete/<?php echo $row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
        </td>
        </tr>
    <?php endforeach; ?>
        
    </table>
<?php echo $music_dbs->pagination()?>