<script type="text/javascript">
	$(document).ready(function(){
		$("ul.menu li a:contains(Uncategory)").parent().addClass("active");
	});
</script>
<h1><a href="vdos/admin/categories">วิดิทัศน์</a> » ยังไม่จัดหมวดหมู่</h1>
<?php echo $vdos->pagination()?>
<form id="order" action="vdos/admin/vdos/save_orderlist" method="post">
<table class="list">
	<tr>
		<th>ลำดับ</th>
		<th>ชื่อ</th>
		<th>url</th>
		<th width="90"><a class="btn" href="http://www.kpoplover.com/kh_se.php" target="_blank">โหลดสคริปท์</a></th>
	</tr>
	
	<?php foreach($vdos as $vdo): ?>
	<tr id="gallery-list" <?php echo cycle()?>>
		<td><input type="text" name="orderlist[]" size="1" value="<?=($vdo->orderlist == 0)?$vdo->id:$vdo->orderlist;?>"><input type="hidden" name="orderid[]" value="<?php echo $vdo->id ?>"></td>
		<td><?php echo $vdo->title?></td>
		<td><a rel="nofollow" href="<?=$vdo->url?>" target="_blank"><?php echo $vdo->url?></a></td>
		<td>
			<?php if(permission('vdos', 'update')):?>
			<a class="btn" href="vdos/admin/vdos/uncategory_form/<?php echo $vdo->id?>" >แก้ไข</a> 
			<?php endif;?>
			<?php if(permission('vdos', 'delete')):?>
			<a class="btn" href="vdos/admin/vdos/uncategory_delete/<?php echo $vdo->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach; ?>
</table><br>
<input type="submit" value="บันทึก">
</form>
<?php echo $vdos->pagination()?>