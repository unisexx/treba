<h1>เว็บบอร์ด</h1>
<?php include "_menu.php";?><br>
<table class="list">
	<tr>
		<th>ชื่อกลุ่ม</th>
		<th>ระดับการโพสต์</th>
		<th>รูปประจำกลุ่ม</th>
		<th width="90"><a class="btn" href="webboards/admin/webboard_post_levels/form" class="tiny">เพิ่มรายการ</a></th>
		
		<?php foreach ($webboard_post_levels as $webboard_post_level):?>
			<tr <?php echo cycle()?>>
				<td><?php echo $webboard_post_level->name ?></td>
				<td><?php echo $webboard_post_level->post ?></td>
				<td><img src="uploads/webboards/<?php echo $webboard_post_level->image ?>"></td>
				<td>
					<a class="btn" href="webboards/admin/webboard_post_levels/form/<?php echo $webboard_post_level->id?>" >แก้ไข</a> 
					<a class="btn" href="webboards/admin/webboard_post_levels/delete/<?php echo $webboard_post_level->id?>" onclick="return confirm('<?php echo lang('confirm_delete');?>')">ลบ</a></td>
			</tr>
		<?php endforeach; ?>
		
	</tr>
	
</table>