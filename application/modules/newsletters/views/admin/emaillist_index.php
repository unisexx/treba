<h1>แจ้งข่าวสารทางอีเมล์</h1>

<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>อีเมลล์</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>

<?php include "_menu.php";?>


<br>
<?php echo $newsletters_email_lists->pagination()?>
<table class="list">
	<tr>
		<th>id</th>
		<th>สถานะ</th>
		<th>อีเมล์</th>
		<th>ส่งถึง</th>
		<th width="90">
			<?php if(permission('newsletters', 'create')):?>
			<a class="btn" href="newsletters/admin/newsletters_email_lists/form">เพิ่มรายการ</a>
			<?php endif;?>
		</th>
	</tr>
	
	<?php foreach($newsletters_email_lists as $list):?>
	<tr>
		<td><?=$list->id?></td>
		<td><input type="checkbox" name="status" value="<?php echo $list->id ?>" <?php echo ($list->status=="approve")?'checked="checked"':'' ?> <?php echo (@$_POST['status']=="approve")?'':'' ?> /></td>
		<td><?php echo $list->email?></td>
		<td><?=$list->current?></td>
		<td>
			<?php if(permission('newsletters', 'update')):?>
			<a class="btn" href="newsletters/admin/newsletters_email_lists/form/<?php echo $list->id?>" >แก้ไข</a>
			<?php endif;?>
			<?php if(permission('newsletters', 'delete')):?>
			<a class="btn" href="newsletters/admin/newsletters_email_lists/delete/<?php echo $list->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach;?>
	
</table>
<br>
<?php echo $newsletters_email_lists->pagination()?>