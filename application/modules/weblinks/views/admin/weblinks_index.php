<h1>เว็บลิ้งค์</h1>
<div class="search">
	<form method="get">
		<table class="form">
			<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_GET['search']))?$_GET['search']:'' ?>" /></td>
			<th>หมวดหมู่</th><td><?php echo form_dropdown('category_id',$weblinks->category->get_option(),@$_GET['category_id'],'','ทั้งหมด') ?></td>
			<td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $weblinks->pagination()?><br>
<table class="list" id="weblinks-list">
	<tr>
		<th>ชื่อเว็บ</th>
		<th>URL</th>
		<!-- <th>โดย</th> -->
		<th><a rel="lightbox" class="btn" href="categories/admin/categories/weblinks?iframe=true&width=90%&height=90%">หมวดหมู่</a></th>
		<th width="90">
			<?php if(permission('weblinks', 'create')):?>
			<a class="btn" href="weblinks/admin/weblinks/form">เพิ่มรายการ</a>
			<?php endif;?>
		</th>
	</tr>
	<?php foreach ($weblinks as $weblink):?>
	<tr <?php echo cycle()?>>
		<td><?php echo $weblink->title?></td>
		<td><?php echo $weblink->url?></td>
		<!-- <td><?php echo $weblink->user->display?></td> -->
		<td><?php echo anchor('weblinks/admin/weblinks?category_id='.$weblink->category_id,$weblink->category->name) ?></td>
		<td>
			<?php if(permission('weblinks', 'update')):?>
			<a class="btn" href="weblinks/admin/weblinks/form/<?php echo $weblink->id?>" >แก้ไข</a> 
			<?php endif;?>
			<?php if(permission('weblinks', 'delete')):?>
			<a class="btn" href="weblinks/admin/weblinks/delete/<?php echo $weblink->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach; ?>
</table><br>
<?php echo $weblinks->pagination()?>