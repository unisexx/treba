<h1>วีดิทัศน์</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>อัลบั้ม</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $categories->pagination()?>
<table class="list">
	<tr>
		<th width="70">แสดง</th>
		<!-- <th>เริ่มวันที่</th> -->
		<th>สถานะ</th>
		<th>เรื่อง</th>
		<th>โดย</th>
		<th style="text-align:center;" width="90">จำนวนวีดิทัศน์</th>
		<th width="90">
			<?php if(permission('vdos', 'create')):?>
			<a class="btn" href="vdos/admin/categories/form" class="tiny">เพิ่มรายการ</a>
			<?php endif;?>
		</th>
	</tr>
	<?php foreach($categories as $category): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $category->id ?>" <?php echo ($category->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'' ?> /></td>
		<!-- <td><?=DB2Date($category->start_date)?></td> -->
		<td><?=($category->end == "end")?'<span class="e-green" style="padding:0 3px; border-radius:3px;"> จบแล้ว </span>':'<span class="e-red" style="padding:0 3px; border-radius:3px;"> ยังไม่จบ </span>';?></td>
		<td><?php echo $category->name?></td>
		<td><?php echo $category->user->display?></td>
		<td style="text-align:center;"><?php echo $category->vdos->result_count();?></td>
		<td>
			<a class="btn" href="vdos/admin/vdos/index/<?php echo $category->id?>">จัดการวีดิทัศน์</a><br /><br />
			<?php if(permission('vdos', 'update')):?>
			<a class="btn" href="vdos/admin/categories/form/<?php echo $category->id ?>" >แก้ไข</a>
			<?php endif;?>
			<?php if(permission('vdos', 'delete')):?>
			<a class="btn" href="vdos/admin/categories/delete/<?php echo $category->id?>" onclick="return confirm('<?php echo 'หมวดหมู่ย่อยและบทความทั้งหมดในหมวดนี้จะถูกลบโดยอัตโนมัติ\nยืนยันการลบ'?>')">ลบ</a>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $categories->pagination()?>