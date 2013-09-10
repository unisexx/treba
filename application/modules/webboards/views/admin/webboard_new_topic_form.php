<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
	tiny('detail');
</script>
<h1>เว็บบอร์ด</h1>
<div class="tab">
    <ul>
        <li class="active">จัดการเว็บบอร์ด >> ตั้งกระทู้ใหม่</li>
    </ul>
	<br class="clear">
    <div>
        <div style="display:block;">
		
			<form action="webboards/admin/webboard_quizs/save/<?php echo $webboard_quizs->id?>" method="post" enctype="multipart/form-data">
				<table class="form">
					<tr>
						<th>หมวดหมู่ :</th>
						<td><?php echo form_dropdown('webboard_category_id',get_option('id','name','webboard_categories','order by orderlist asc'),$webboard_quizs->webboard_category_id,'');?></td></tr>
					</tr>
					<tr>
						<th>หัวข้อ :</th>
						<td><?php echo form_input('title',$webboard_quizs->title,'class=full')?></td>
					</tr>
					<tr>
						<th>เนื้อหา :</th>
						<td>
							<textarea name="detail" class="full"><?php echo $webboard_quizs->detail?></textarea>
						</td>
					</tr>
					<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
				</table>
			</form>
			
		</div>
    </div>
</div>