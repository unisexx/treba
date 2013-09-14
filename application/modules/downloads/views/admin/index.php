<h1>ดาวน์โหลดเอกสาร</h1>
<?php echo $downloads->pagination()?>
<table class="list">
	<tr>
		<th>ชื่อเอกสาร</th>
		<th>ไฟล์แนบ</th>
		<th width="90">
			<a class="btn" href="downloads/admin/downloads/form">เพิ่มรายการ</a>
		</th>
	</tr>
	<?php foreach($downloads as $row): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo lang_decode($row->title);?></td>
		<td><a href="downloads/admin/downloads/download/<?php echo $row->id?>">ดาวน์โหลด</a></td>
		<td>
			<a class="btn" href="downloads/admin/downloads/form/<?php echo $row->id?>" >แก้ไข</a>
			<a class="btn" href="downloads/admin/downloads/delete/<?php echo $row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $downloads->pagination()?>