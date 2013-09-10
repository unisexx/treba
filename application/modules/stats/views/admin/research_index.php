<script type="text/javascript">
$(function(){	
	$("#horri_menu ul li:eq(0)").addClass("active");
	$("ul.menu li a:contains(วิชาการและสถิติ)").parent().addClass("active");
})
</script>
<h1>วิชาการและสถิติ</h1>
<?php include "_menu.php";?><br>
<?php echo $researchs->pagination()?>
<table class="list">
	<tr>
		<th>แสดง</th>
		<th>เริ่มวันที่</th>
		<th>หัวข้อ</th>
		<th>โดย</th>
		<th>
			<a rel="lightbox" class="btn" href="categories/admin/categories/researches?iframe=true&width=90%&height=90%">หมวดหมู่</a>
		</th>
		<th width="90">
			<?php if(permission('stats', 'create')):?>
			<a class="btn" href="stats/admin/researchs/form">เพิ่มรายการ</a>
			<?php endif;?>
		</th>
	</tr>
	<?php foreach($researchs as $research):?>
		<tr <?php echo cycle()?>>
			<td><input type="checkbox" name="status" value="<?php echo $research->id ?>" <?php echo ($research->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'' ?> /></td>
			<td><?=DB2Date($research->start_date)?></td>
			<td><?=$research->title;?></td>
			<td><?=$research->user->display?></td>
			<td><?php echo anchor('stats/admin/researches?category_id='.$research->category_id,$research->category->name); ?></td>
			<td>
				<?php if(permission('stats', 'update')):?>
				<a class="btn" href="stats/admin/researches/form/<?php echo $research->id?>" >แก้ไข</a>
				<?php endif;?>
				<?php if(permission('stats', 'delete')):?>
				<a class="btn" href="stats/admin/researches/delete/<?php echo $research->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
				<?php endif;?>
			</td>
		</tr>
	<?php endforeach;?>
	
</table><br />
<?php echo $researchs->pagination()?>
