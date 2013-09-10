<script type="text/javascript">
	$(function(){
		$("input:radio").click(function(){
			var value = 1;
			var id = $(this).val();
			$.post("polls/admin/polls/approve/" + id,{active:value}); 
		});
	})
</script>
	<h1>แบบสำรวจความคิดเห็น</h1>
	<div class="search">
		<form method="post">
			<table class="form">
				<tr><th>หัวข้อ</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><td><input type="submit" value="ค้นหา" /></td></tr>
			</table>
		</form>
	</div>
	<?php echo $polls->pagination()?>
	<table width="100%" class="list">
		<tr>
			<th width="70">แสดง</th>
			<th>หัวข้อ</td>
			<th>โดย	</th>
			<th class="t-center" width="90">
				<?php if(permission('polls', 'create')):?>
				<a class="btn"  href="polls/admin/polls/form" class="tiny">เพิ่มรายการ</a>
				<?php endif;?>
			</th>
		</tr>
		<?php foreach($polls as $poll):?>
		<tr <?php echo cycle()?>>
			<td><input type="radio" name="active" value="<?php echo $poll->id ?>" <?php echo ($poll->active==1)?"checked='checked'":''?> /></td>
			<td><?php echo $poll->title?></td>
			<td><?php echo $poll->user->display?></td>
			<td>
				<?php if(permission('polls', 'update')):?>
				<a class="btn" href="polls/admin/polls/form/<?php echo $poll->id?>" class="btn">แก้ไข</a>
				<?php endif;?>
				<?php if(permission('polls', 'delete')):?>
				<a class="btn" href="polls/admin/polls/delete/<?php echo $poll->id?>" class="btn" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')">ลบ</a>
				<?php endif;?>
			</td>
		</tr>
		<?php endforeach?>
	</table>
	<?php echo $polls->pagination()?>
