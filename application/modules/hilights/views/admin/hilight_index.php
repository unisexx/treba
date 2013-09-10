<h1>ไฮไลท์</h1>
<?php echo $hilights->pagination()?>
<table class="list">
	<tr>
		<th>แสดง</th>
		<th>รูปภาพ</th>
		<th>หัวข้อ</th>
		<th>โดย</th>
		<th width="90">
			<?php if(permission('hilights', 'create')):?>
			<a class="btn" href="hilights/admin/hilights/form">เพิ่มรายการ</a>
			<?php endif;?>
		</th>
	</tr>
	<?php foreach($hilights as $hilight): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $hilight->id ?>" <?php echo ($hilight->status=="approve")?'checked="checked"':'' ?> /></td>
		<td><?php echo thumb("uploads/hilight/".$hilight->image,200,66,1)?></td>
		<td><?php echo $hilight->title;?></td>
		<td><?php echo $hilight->user->display?></td>
		<td>
			<?php if(permission('hilights', 'update')):?>
			<a class="btn" href="hilights/admin/hilights/form/<?php echo $hilight->id?>" >แก้ไข</a> 
			<?php endif;?>
			<?php if(permission('hilights', 'delete')):?>
			<a class="btn" href="hilights/admin/hilights/delete/<?php echo $hilight->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
			<?php endif;?>
		</td>
		</tr>
		<?php endforeach; ?>
		
	</table>
<?php echo $hilights->pagination()?>