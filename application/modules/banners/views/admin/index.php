<h1>Banner</h1>
<?php echo $banners->pagination()?>
<form id="order" action="banners/admin/banners/save_orderlist" method="post">
<table class="list">
    <tr>
        <th>แสดง</th>
        <th>ลำดับที่</th>
        <th>ตำแหน่ง</th>
        <th>หมดอายุ</th>
        <th>รูปภาพ</th>
        <th>url</th>
        <th width="90">
            <?php if(permission('hilights', 'create')):?>
            <a class="btn" href="banners/admin/banners/form">เพิ่มรายการ</a>
            <?php endif;?>
        </th>
    </tr>
    <?php foreach($banners as $banner): ?>
    <tr <?php echo cycle()?>>
        <td><input type="checkbox" name="status" value="<?php echo $banner->id ?>" <?php echo ($banner->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'' ?> /></td>
        <td>
            <input type="text" name="orderlist[]" size="3" value="<?php echo $banner->orderlist?>">
            <input type="hidden" name="orderid[]" value="<?php echo $banner->id ?>">
        </td>
        <td><?php echo $banner->position;?></td>
        <td><?php echo DB2Date($banner->end_date)?></td>
        <td><?=thumb($banner->image,false,60,1)?></td>
        <td><?php echo $banner->url;?></td>
        <td>
            <?php if(permission('hilights', 'update')):?>
            <a class="btn" href="banners/admin/banners/form/<?php echo $banner->id?>" >แก้ไข</a> 
            <?php endif;?>
            <?php if(permission('hilights', 'delete')):?>
            <a class="btn" href="banners/admin/banners/delete/<?php echo $banner->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
            <?php endif;?>
        </td>
        </tr>
        <?php endforeach; ?>
    </table>
<input type="submit" value="บันทึก">    
</form>
<?php echo $banners->pagination()?>