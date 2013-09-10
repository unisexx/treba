<h1>Music Chart</h1>
<?php include('_menu.php') ?>
<?php echo $categories->pagination()?>
<table class="list">
    <tr>
        <th>สถานะ</th>
        <th>หัวข้อ</th>
        <th width="90">
            <a class="btn" href="music_charts/admin/music_charts/form">เพิ่มรายการ</a>
        </th>
    </tr>
    <?php foreach($categories as $row): ?>
    <tr <?php echo cycle()?>>
        <td><input type="checkbox" name="status" value="<?php echo $row->id ?>" <?php echo ($row->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'' ?> /></td>
        <td><?php echo $row->title;?></td>
        <td>
            <a class="btn" href="music_charts/admin/music_charts/form/<?php echo $row->id ?>" >แก้ไข</a>
            <a class="btn" href="music_charts/admin/music_charts/delete/<?php echo $row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
        </td>
        </tr>
    <?php endforeach; ?>
        
    </table>
<?php echo $categories->pagination()?>