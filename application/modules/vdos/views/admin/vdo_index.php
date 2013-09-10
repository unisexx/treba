<script type="text/javascript">
	$(document).ready(function(){
		$("ul.menu li a:contains(วิดิทัศน์)").parent().addClass("active");
	});
</script>
<h1><a href="vdos/admin/categories">วิดิทัศน์</a> » <?php echo lang_decode($categories->name,'')?></h1>
<?php echo $vdos->pagination()?>
<form id="order" action="vdos/admin/vdos/save_orderlist" method="post">
<table class="list">
	<tr>
		<th>ลำดับ</th>
		<th>ชื่อ</th>
		<th>url</th>
		<th width="90">
			<?php if(permission('vdos', 'create')):?>
			<a class="btn" href="vdos/admin/vdos/form/<?php echo $categories->id?>">เพิ่มรายการ</a>
			<?php endif;?>
			</th>
	</tr>
	
	<?php foreach($vdos as $vdo): ?>
	<tr id="gallery-list" <?php echo cycle()?>>
		<td><input type="text" name="orderlist[]" size="1" value="<?=($vdo->orderlist == 0)?$vdo->id:$vdo->orderlist;?>"><input type="hidden" name="orderid[]" value="<?php echo $vdo->id ?>"></td>
		<td><?php echo $vdo->title?></td>
		<td><a href="http://www.kodhit.com<?php echo $vdo->url?>" target="_blank"><?php echo $vdo->url?></a></td>
		<td>
			<?php if(permission('vdos', 'update')):?>
			<a class="btn" href="vdos/admin/vdos/form/<?php echo $vdos->category->id?>/<?php echo $vdo->id?>">แก้ไข</a> 
			<?php endif;?>
			<?php if(permission('vdos', 'delete')):?>
			<a class="btn" href="vdos/admin/vdos/delete/<?php echo $vdos->category->id?>/<?php echo $vdo->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach; ?>
</table><br>
<input type="submit" value="บันทึก">
</form>
<?php echo $vdos->pagination()?>
