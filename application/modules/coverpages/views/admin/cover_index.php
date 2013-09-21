<script type="text/javascript">
	$(function(){
		$("input:radio").click(function(){
			var value = 1;
			var id = $(this).val();
			$.post("coverpages/admin/coverpages/approve2/" + id,{active:value}); 
		});
	})
</script>
<h1>หน้าแรก</h1>
<table class="form">
	<tr>
		<th>เปิดแสดงหน้าแรก</th>
		<td><input type="checkbox" name="status" value="approve" <?php echo ($coverpages->status=="approve")?'checked="checked"':'' ?> /></td>
	</tr>
</table>
<?php echo $coverpages->pagination()?>
<table class="list">
	<tr>
		<!-- <th width="70">แสดง</th>
		<th>เริ่มวันที่</th>
		<th>หัวข้อ</th> -->
		<th>รูปภาพ</th>
		<th>โดย</th>
		<th width="90">
			<!-- <a class="btn" href="coverpages/admin/coverpages/form">เพิ่มรายการ</a> -->
		</th>
	</tr>
	<?php foreach($coverpages as $coverpage):?>
		<tr>
			<!-- <td><input type="radio" name="active" value="<?php echo $coverpage->id ?>" <?php echo ($coverpage->active==1)?"checked='checked'":''?> /></td>
			<td><?=$coverpage->start_date?></td>
			<td><?=$coverpage->title?></td> -->
			<td><?php echo thumb("uploads/coverpage/".$coverpage->image,200,false,1)?></td>
			<td><?=$coverpage->user->display?></td>
			<td>
				<a class="btn" href="coverpages/admin/coverpages/form/<?php echo $coverpage->id?>" class="btn">แก้ไข</a>
				<!-- <a class="btn" href="coverpages/admin/coverpages/delete/<?php echo $coverpage->id?>" class="btn" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')">ลบ</a> -->
			</td>
		</tr>
	<?php endforeach;?>
	</table>
<?php echo $coverpages->pagination()?>