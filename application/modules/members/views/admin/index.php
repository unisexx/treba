<h1>เกี่ยวกับสมาชิก</h1>
<!-- <div class="search">
	<form method="get">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td><th>หมวดหมู่</th><td><?php echo form_dropdown('category_id',$members->category->get_option(),@$_GET['category_id'],'','ทั้งหมด') ?></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div> -->
<?php echo $members->pagination()?>
<table class="list">
	<tr>
		<!-- <th width="70">แสดง</th> -->
		<th>ชื่อบริษัท</th>
		<th>ชื่อผู้ประกอบการ</th>
		<th>
			<a rel="lightbox" class="btn" href="categories/admin/categories/members?iframe=true&width=90%&height=90%">หมวดหมู่</a>
		</th>
		<th width="90">
			<a class="btn" href="members/admin/members/form">เพิ่มรายการ</a>
		</th>
	</tr>
	<?php foreach($members as $row): ?>
	<tr <?php echo cycle()?>>
		<!-- <td><input type="checkbox" name="status" value="<?php echo $row->id ?>" <?php echo ($row->status=="approve")?'checked="checked"':'' ?> /></td> -->
		<td><?php echo $row->company;?></td>
		<td><?php echo $row->name?></td>
		<td><?php echo anchor('members/admin/members?category_id='.$row->category_id,$row->category->name) ?></td>
		<td>
			<a class="btn" href="members/admin/members/form/<?php echo $row->id?>" >แก้ไข</a>
			<a class="btn" href="members/admin/members/delete/<?php echo $row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $members->pagination()?>