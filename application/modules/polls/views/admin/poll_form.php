<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" >
	$(function(){
		$(".addans").click(function(){			
			$('<tr><th>คำตอบ :</th><td><input type="text" name="name[]" class="text small" /></td></tr>').insertBefore($('.form tr:last'));
			return false;
		})
	})
	
</script>
<h1>แบบสำรวจความคิดเห็น</h1>
<form method="post" action="polls/admin/polls/save/<?php echo $poll->id?>" enctype="multipart/form-data">
		<table class="form">
			<tr>
				<th>หัวข้อ :</th>
				<td><input type="text" name="title" value="<?php echo $poll->title?>" class="text small" /></td>
				<td><a href="#" class="btn addans" >เพิ่มคำตอบ</a></td>
			</tr>
			<?php foreach($poll->polldetail as $item): ?>
			<tr><th>คำตอบ :</th><td><input type="text" name="name[]" value="<?php echo $item->name ?>" class="text small" /></td><td><a class="btn" href="polls/admin/polls/delete_ans/<?php echo $item->id?>" class="btn" onclick="return confirm('<?php echo lang('notice_confirm_delete')?>')">ลบ</a><input type="hidden" name="detail_id[]" value="<?php echo $item->id ?>" /></td></tr>
			<?php endforeach; ?>
			<tr><th>คำตอบ :</th><td><input type="text" name="name[]" value="" /></td><td></td></tr>
			<tr><th</th><td><input type="submit" value="บันทึก" /><input type="button" value="ย้อนกลับ" onclick="window.location = 'polls/admin/polls'" /></td><td></td></tr>
		</table>
		
		
	</table>
</form>
