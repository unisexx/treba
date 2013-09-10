<h1>เว็บบอร์ด</h1>
<?php include "_menu.php";?>
<?php echo $categories->pagination()?>
<form id="order" action="webboards/admin/webboard_categories/save" method="post">
<table class="list">
	<tr>
		<th>ลำดับที่</th>
		<th>ชื่อกระดานข่าว</th>
		<th>รายละเอียด</th>
		<th width="90">
			<?php if(permission('webboards', 'create')):?>
			<a class="btn" href="webboards/admin/webboard_categories/form" class="tiny">เพิ่มรายการ</a>
			<?php endif;?>
		</th>
	</tr>
	<?php foreach($categories as $category): ?>
	<tr <?php echo cycle()?>>
		<td>
			<input type="text" name="orderlist[]" size="3" value="<?php echo $category->orderlist?>">
			<input type="hidden" name="orderid[]" value="<?php echo $category->id ?>">
		</td>
		<td><?php echo lang_decode($category->name,'th')?></td>
		<td><?php echo $category->description?></td>
		<td>
			<?php if(permission('webboards', 'update')):?>
			<a class="btn" href="webboards/admin/webboard_categories/form/<?php echo $category->id ?>" >แก้ไข</a>
			<?php endif;?>
			<?php if(permission('webboards', 'delete')):?>
			<a class="btn" href="webboards/admin/webboard_categories/delete/<?php echo $category->id?>" onclick="return confirm('<?php echo 'หมวดหมู่ย่อยและบทความทั้งหมดในหมวดนี้จะถูกลบโดยอัตโนมัติ\nยืนยันการลบ'?>')">ลบ</a>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<br>
<input type="submit" value="บันทึก">
</form>
<?php echo $categories->pagination()?>