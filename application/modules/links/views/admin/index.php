<h1>ลิ้งค์</h1>
<?php echo $links->pagination()?>
<table class="list">
	<tr>
		<th>หัวข้อ</th>
		<th>url</th>
		<th width="90">
			<a class="btn" href="links/admin/links/form">เพิ่มรายการ</a>
		</th>
	</tr>
	<?php foreach($links as $row): ?>
	<tr <?php echo cycle()?>>
		<td><?php echo lang_decode($row->title);?></td>
		<td><?php echo $row->url?></td>
		<td>
			<a class="btn" href="links/admin/links/form/<?php echo $row->id?>" >แก้ไข</a>
			<a class="btn" href="links/admin/links/delete/<?php echo $row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
		</tr>
		<?php endforeach; ?>
	</table>
<?php echo $links->pagination()?>