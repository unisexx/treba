<h1>เกี่ยวกับสมาคม</h1>
<?php echo $abouts->pagination()?>
<form id="order" action="abouts/admin/abouts/save_orderlist" method="post">
<table class="list">
    <tr>
        <!-- <th>สถานะ</th> -->
        <th>ลำดับ</th>
        <th>หัวข้อ</th>
        <th>วันที่</th>
        <th width="90">
            <a class="btn" href="abouts/admin/abouts/form">เพิ่มรายการ</a>
        </th>
    </tr>
    <?php foreach($abouts as $row): ?>
    <tr <?php echo cycle()?>>
        <!-- <td><input type="checkbox" name="status" value="<?php echo $new->id ?>" <?php echo ($new->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'' ?> /></td> -->
        <td><input type="text" name="orderlist[]" size="3" value="<?php echo $row->orderlist?>"><input type="hidden" name="orderid[]" value="<?php echo $row->id ?>"></td>
        <td><?php echo lang_decode($row->title)?></td>
        <td><?=mysql_to_th($row->created,'s')?></td>
        <td>
           <a class="btn" href="abouts/admin/abouts/form/<?php echo $row->id ?>" >แก้ไข</a><a class="btn" href="abouts/admin/abouts/delete/<?php echo $row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
        </td>
        </tr>
    <?php endforeach; ?>
        
    </table>
    <input type="submit" value="บันทึก">
</form>
<?php echo $abouts->pagination()?>