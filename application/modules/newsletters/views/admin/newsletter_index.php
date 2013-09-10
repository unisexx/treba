<h1>จดหมายข่าว</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td></tr>
		</table>
	</form>
</div>
<?php include "_menu.php";?>
<?php echo $newsletters->pagination()?>
<table class="list">
	<tr>
		<th>หัวข้อ</th>
		<!-- <th><a rel="lightbox" class="btn" href="newsletters/admin/categories?iframe=true&width=90%&height=90%">หมวดหมู่</a></th> -->
		<th width="90">
			<?php if(permission('newsletters', 'create')):?>
			<a class="btn" href="newsletters/admin/newsletters/form">เพิ่มรายการ</a>
			<?php endif;?>
		</th>
	</tr>
	
	<?php foreach($newsletters as $newsletter):?>
	<tr>
		<td><?php echo $newsletter->title?></td>
		<!-- <td><?php echo anchor('newsletters/admin/newsletters?category_id='.$newsletter->category_id,lang_decode($newsletter->category->name,''))?></td> -->
		<td>
			<?php if(permission('newsletters', 'update')):?>
			<a class="btn" href="newsletters/admin/newsletters/form/<?php echo $newsletter->id?>" >แก้ไข</a>
			<?php endif;?>
			<?php if(permission('newsletters', 'delete')):?>
			<a class="btn" href="newsletters/admin/newsletters/delete/<?php echo $newsletter->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach;?>
	
</table>
<?php echo $newsletters->pagination()?>