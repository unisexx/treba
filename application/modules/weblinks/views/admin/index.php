<h1>ลิ้งค์รูปภาพ</h1>
<?php echo $weblinks->pagination()?>
<table class="list">
	<tr>
		<!-- <th width="70">แสดง</th> -->
		<th>รูปภาพ</th>
		<th>url</th>
		<th>
			<!-- <a rel="lightbox" class="btn" href="categories/admin/categories/weblinks?iframe=true&width=90%&height=90%">หมวดหมู่</a> -->
		</th>
		<th width="90">
			<a class="btn" href="weblinks/admin/weblinks/form">เพิ่มรายการ</a>
		</th>
	</tr>
	<?php foreach($weblinks as $row): ?>
	<tr <?php echo cycle()?>>
		<!-- <td><input type="checkbox" name="status" value="<?php echo $row->id ?>" <?php echo ($row->status=="approve")?'checked="checked"':'' ?> /></td> -->
		<td><img src="uploads/weblink/<?php echo $row->image?>" width="60"></td>
		<td><?php echo $row->url?></td>
		<td><?php echo anchor('weblinks/admin/weblinks?category_id='.$row->category_id,$row->category->name) ?></td>
		<td>
			<a class="btn" href="weblinks/admin/weblinks/form/<?php echo $row->id?>" >แก้ไข</a>
			<a class="btn" href="weblinks/admin/weblinks/delete/<?php echo $row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $weblinks->pagination()?>