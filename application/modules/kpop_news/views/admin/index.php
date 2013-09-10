<h1>Kpop New</h1>
<?php echo $news->pagination()?>
<table class="list">
    <tr>
    	<th>สถานะ</th>
        <th>หัวข้อ</th>
        <th>ที่มา</th>
        <th>วันที่</th>
        <th width="90">
            <a class="btn" href="kpop_news/admin/kpop_news/form">เพิ่มรายการ</a>
        </th>
    </tr>
    <?php foreach($news as $new): ?>
    <tr <?php echo cycle()?>>
    	<td><input type="checkbox" name="status" value="<?php echo $new->id ?>" <?php echo ($new->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'' ?> /></td>
        <td><?php echo $new->title;?></td>
        <td><?=$new->source?></td>
        <td><?=mysql_to_th($new->created,'s')?></td>
        <td>
        	<a class="btn" href="kpop_news/admin/kpop_news/form/<?php echo $new->id ?>" >แก้ไข</a>
            <a class="btn" href="kpop_news/admin/kpop_news/delete/<?php echo $new->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
        </td>
        </tr>
    <?php endforeach; ?>
        
    </table>
<?php echo $news->pagination()?>