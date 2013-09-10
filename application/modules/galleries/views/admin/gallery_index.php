<script type="text/javascript">
	$(document).ready(function(){
		$("ul.menu li a:contains(ภาพกิจกรรม)").parent().addClass("active");
	});
</script>
<h1><a href="galleries/admin/categories">ภาพถ่ายกิจกรรม</a> » <?php echo lang_decode($categories->name,'')?></h1>
<?php echo $galleries->pagination()?>
<form id="order" action="galleries/admin/galleries/save_orderlist" method="post">
<table class="list">
	<tr>
		<th>ลำดับ</th>
		<th>ภาพ</th>
		<th>ชื่อภาพ</th>
		<th>โดย</th>
		<th width="90">
			<?php if(permission('galleries', 'create')):?>
			<a class="btn" href="galleries/admin/galleries/<?php echo $categories->id?>/form">เพิ่มรายการ</a>
			<?php endif;?>
		</th>
	</tr>
	
	<?php foreach($galleries as $gallery): ?>
	<tr id="gallery-list" <?php echo cycle()?>>
		<td><input type="text" name="orderlist[]" size="1" value="<?php echo $gallery->orderlist?>"><input type="hidden" name="orderid[]" value="<?php echo $gallery->id ?>"></td>
		<td><a rel="lightbox[gallery]" href="<?php echo $gallery->image?>"><?php echo thumb($gallery->image,120,70,0)?></a></td>
		<td><?php echo $gallery->title?></td>
		<td><?php echo $gallery->user->display?></td>
		<td>
			<?php if(permission('galleries', 'update')):?>
			<a class="btn" href="galleries/admin/galleries/<?php echo $galleries->category->id?>/form/<?php echo $gallery->id?>" >แก้ไข</a>
			<?php endif;?>
			<?php if(permission('galleries', 'delete')):?>
			<a class="btn" href="galleries/admin/galleries/delete/<?php echo $galleries->category->id?>/<?php echo $gallery->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach; ?>
</table><br>
<input type="submit" value="บันทึก">
</form>
<?php echo $galleries->pagination()?>
