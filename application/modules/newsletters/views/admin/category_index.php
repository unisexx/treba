<h1>หมวดหมู่</h1>

<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>อีเมลล์</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>

<?php echo $categories->pagination()?>
<Br>
<table class="list">
	<tr>
		<th>เผยแพร่</th>
		<th>กลุ่มข่าว</th>
		<th>รายละเอียด</th>
		<th width="90"><a class="btn" href="newsletters/admin/categories/form" class="tiny">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($categories as $category): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $category->id ?>" <?php echo ($category->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'disabled="disabled"' ?> /></td>
		<td><?php echo lang_decode($category->name,'')?></td>
		<td><?php echo $category->description?></td>
		<td>
			<a class="btn" href="newsletters/admin/categories/form/<?php echo $category->id ?>" >แก้ไข</a>
			<a class="btn" href="newsletters/admin/categories/delete/<?php echo $category->id?>" onclick="return confirm('<?php echo 'หมวดหมู่ย่อยและบทความทั้งหมดในหมวดนี้จะถูกลบโดยอัตโนมัติ\nยืนยันการลบ'?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<br>
<?php echo $categories->pagination()?>