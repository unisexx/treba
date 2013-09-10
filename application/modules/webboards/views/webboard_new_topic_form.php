<!-- <script type="text/javascript">
	$(function(){
		$('.addvote').click(function(){
			$('<tr><th></th><td>ตัวเลือก : <input type="text" name="name[]" class="text small" /></td></tr>').insertBefore($('.textarea'));
			return false;
		});
	});
</script> -->

<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li><a href="webboards">เว็บบอร์ด</a> <span class="divider">/</span></li>
    <li><a href="webboards/category/<?=$categories->slug?>"><?=$categories->name?></a> <span class="divider">/</span></li>
    <li class="active">ตั้งกระทู้ใหม่</li>
</ul>

<h1>เว็บบอร์ด</h1>

<form id="frm-post" action="webboards/save/<?php echo $categories->id?>/<?php echo $webboard_quizs->id?>" method="post">
	<table class="form">
		<tr>
			<th>หัวข้อ :</th>
			<td><?php echo form_input('title',$webboard_quizs->title,'style="width:400px;"')?>
			<!-- <?php if($topic_type == 'vote'):?>
			<input class="btn addvote" type="button" value="+ เพิ่มตัวเลือกโหวต"></td>
			<?php endif;?> -->
		</tr>
		<!-- <?php if($topic_type == 'vote'):?>
		
		<?php foreach($webboard_quizs->webboard_polldetail as $item): ?>
		<tr><th></th><td>ตัวเลือก : <input type="text" name="name[]" value="<?php echo $item->name ?>" class="text small" /> <a class="btn" href="webboards/delete_poll_choice/<?php echo $item->id?>" class="btn" onclick="return confirm('ต้องการลบตัวเลือกนี้?')">ลบ</a><input type="hidden" name="detail_id[]" value="<?php echo $item->id ?>" /></td></tr>
		<?php endforeach; ?>

		<tr><th></th><td>ตัวเลือก : <input type="text" name="name[]" class="text small" /></td></tr>
		<?php endif;?> -->
		<tr>
			<th></th>
			<td>
				<?php echo uppic_mce();?>
			</td>
		</tr>
		<tr class="textarea">
			<th class="top">เนื้อหา :</th>
			<td>
				<textarea name="detail" cols="20" class="editor[pm]"><?php echo $webboard_quizs->detail?></textarea>
				<?php echo form_hidden('webboard_category_id',$categories->id)?>
				<?php echo form_hidden('type',$topic_type)?>
			</td>
		</tr>
		<?php if(empty($webboard_quizs->id)): ?>
		    <tr><th>ชื่อ :</th><td><input type="text" name="author" class="textbox" <?php echo (is_login()) ? 'value="'.user_login()->username.'" readonly' : null ?> > 
	    <?php else:?>
	        <tr><th>ชื่อ :</th><td><input type="text" name="author" class="textbox" value="<?=$webboard_quizs->author?>" readonly></td></tr>
        <?php endif; ?>
		</td></tr>
		<tr><th></th><td><img src="users/captcha" /> </td></tr>
		<tr><th>Captcha :</th><td><input type="text" name="captcha" class="input-small"> </td></tr>
		<tr><th></th><td><input id="board-submit" type="submit" value="บันทึก"></td></tr>
	</table>
</form>