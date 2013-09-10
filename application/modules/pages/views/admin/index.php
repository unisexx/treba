<h1>Pages</h1>
<?php echo $pages->pagination()?>
<table class="list">
    <tr>
        <th>สถานะ</th>
        <th>หัวข้อ</th>
        <th>วันที่</th>
        <th width="90">
            <a class="btn" href="pages/admin/pages/form">เพิ่มรายการ</a>
        </th>
    </tr>
    <?php foreach($pages as $page): ?>
    <tr <?php echo cycle()?>>
        <td><input type="checkbox" name="status" value="<?php echo $page->id ?>" <?php echo ($page->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'' ?> /></td>
        <td><?php echo $page->title;?></td>
        <td><?=mysql_to_th($page->created,'s')?></td>
        <td>
            <a class="btn" href="pages/admin/pages/form/<?php echo $page->id ?>" >แก้ไข</a>
            <a class="btn" href="pages/admin/pages/delete/<?php echo $page->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
        </td>
        </tr>
    <?php endforeach; ?>
        
    </table>
<?php echo $pages->pagination()?>