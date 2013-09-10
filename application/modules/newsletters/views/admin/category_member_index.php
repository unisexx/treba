<h1>สมาชิกในกลุ่มข่าว</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>กลุ่มข่าว</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php include "_menu.php";?>

<?php echo $categories->pagination()?>
<br>
<table class="list">
	<tr>
		<th>กลุ่มข่าว</th>
		<th><center><a href="newsletters/admin/categories/member_view" >จำนวนสมาชิก</a></center></th>
		<th><center><a href="newsletters/admin/categories/email_view" >ไม่ได้เป็นสมาชิก</a></center></th>
		<th width="90"><a class="btn" href="newsletters/admin/categories/form" class="tiny">เพิ่มรายการ</a></th>
	</tr>
	<?php foreach($categories as $category): ?>
		<tr <?php echo cycle()?>>
			<td><?php echo lang_decode($category->name,'')?></td>
			<td><center><a href="newsletters/admin/categories/member_view/<?php echo $category->id?>"><?php echo $user->where("newsletter like '%".$category->id."%'")->get()->result_count();?></a></center></td>
			<td><center><a href="newsletters/admin/categories/email_list_view/<?php echo $category->id?>"><?php echo $email_count = $email_list->where("newsletter like '%".$category->id."%'")->get()->result_count();?></a></center></td>
			<td>
				<a class="btn" href="newsletters/admin/categories/form/<?php echo $category->id ?>" >แก้ไข</a>
				<a class="btn" href="newsletters/admin/categories/delete/<?php echo $category->id?>" onclick="return confirm('<?php echo 'หมวดหมู่ย่อยและบทความทั้งหมดในหมวดนี้จะถูกลบโดยอัตโนมัติ\nยืนยันการลบ'?>')">ลบ</a>
			</td>
		</tr>
	<?php endforeach; ?>
</table>
<br>
<?php echo $categories->pagination()?>