<h1>Concert</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>อัลบั้ม</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $categories->pagination()?>
<form id="order" action="concerts/admin/concert_categories/save_orderlist" method="post">
<table class="list">
	<tr>
		<th width="70">แสดง</th>
		<th>ลำดับ</th>
		<th>ประเภท</th>
		<th>เรื่อง</th>
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
		<td>
		    <?php $orlist = explode(" ", $category->title)?>
		    <input type="text" name="orderlist[]" size="1" value="<?=($category->orderlist == 0)?$orlist[1]:$category->orderlist;?>"><input type="hidden" name="orderid[]" value="<?php echo $category->id ?>">
		</td>
		<td><?=$category->type?></td>
		<td><?php echo $category->title?></td>
		<td style="text-align:center;"><?php echo $category->concert_vid->result_count();?></td>
		<td>
			<a class="btn" href="concerts/admin/concert_vids/index/<?php echo $category->id?>">จัดการวีดิทัศน์</a><br /><br />
			<?php if(permission('vdos', 'update')):?>
			<a class="btn" href="concerts/admin/concert_categories/form/<?php echo $category->id ?>" >แก้ไข</a>
			<?php endif;?>
			<?php if(permission('vdos', 'delete')):?>
			<a class="btn" href="concerts/admin/concert_categories/delete/<?php echo $category->id?>" onclick="return confirm('<?php echo 'หมวดหมู่ย่อยและบทความทั้งหมดในหมวดนี้จะถูกลบโดยอัตโนมัติ\nยืนยันการลบ'?>')">ลบ</a>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach; ?>
</table><br>
<input type="submit" value="บันทึก">
</form>
<?php echo $categories->pagination()?>