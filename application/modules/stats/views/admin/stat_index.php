<script type="text/javascript">
$(function(){	
	$("#horri_menu ul li:eq(1)").addClass("active");
	$("ul.menu li a:contains(วิชาการและสถิติ)").parent().addClass("active");
})
</script>
<h1>วิชาการและสถิติ</h1>
<?php include "_menu.php";?><br>
<?php echo $stats->pagination()?>
<table class="list">
	<tr>
		<th>แสดง</th>
		<th>เริ่มวันที่</th>
		<th>หัวข้อ</th>
		<th>โดย</th>
		<th width="90">
			<?php if(permission('stats', 'create')):?>
			<a class="btn" href="stats/admin/stats/form">เพิ่มรายการ</a>
			<?php endif;?>
		</th>
	</tr>
	<?php foreach($stats as $stat):?>
		<tr <?php echo cycle()?>>
			<td><input type="checkbox" name="status" value="<?php echo $stat->id ?>" <?php echo ($stat->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'' ?> /></td>
			<td><?=DB2Date($stat->start_date)?></td>
			<td><?=$stat->title;?></td>
			<td><?=$stat->user->display?></td>
			<td>
				<?php if(permission('stats', 'update')):?>
				<a class="btn" href="stats/admin/stats/form/<?php echo $stat->id?>" >แก้ไข</a>
				<?php endif;?>
				<?php if(permission('stats', 'delete')):?>
				<a class="btn" href="stats/admin/stats/delete/<?php echo $stat->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
				<?php endif;?>
			</td>
		</tr>
	<?php endforeach;?>
	
</table><br />
<?php echo $stats->pagination()?>
