<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li><a href="webboards">เว็บบอร์ด</a> <span class="divider">/</span></li>
    <li><a href="webboards/category/<?=$webboard_quiz->webboard_category->slug?>"><?=$webboard_quiz->webboard_category->name?></a> <span class="divider">/</span></li>
    <li><a href="webboards/view_topic/<?=$webboard_quiz->slug?>/<?=$webboard_quiz->id?>"><?=$webboard_quiz->title?></a> <span class="divider">/</span></li>
    <li class="active">แสดงความเห็น / ตอบกระทู้</li>
</ul>

<h1>เว็บบอร์ด</h1>

<form id="frm-post" action="webboards/save_reply/<?php echo $webboard_quiz->id?>/<?php echo $webboard_answer->id?>/<?php echo $type?>" method="post" enctype="multipart/form-data">
	<table class="form">
		<tr>
			<th>RE :</th>
			<td><?php echo $webboard_quiz->title?></td>
		</tr>
		<tr>
			<th></th>
			<td>
				<?php echo uppic_mce();?>
			</td>
		</tr>
		<tr>
			<th class="top"></th>
			<td>
				<textarea name="detail" class="full editor[pm]">
					<?php if ($quote_id == 0):?>
					<div><b><?php echo $webboard_quiz->user->display?> พิมพ์ว่า:</b></div>
					<div style="border:1px solid #000; width:90%; background:#eee; padding:5px;"><?php echo $webboard_quiz->detail?></div><br><br>
					<?php elseif ($quote_id > 0 && $type == "quote"):?>
					<div><b><?php echo $webboard_answer->user->display?> พิมพ์ว่า:</b></div>
					<div style="border:1px solid #000; width:90%; background:#eee; padding:5px;"><?php echo $webboard_answer->detail;?></div><br><br>
					<?php elseif ($quote_id > 0 && $type == "edit"):?>
					<?php echo $webboard_answer->detail;?>
					<?php endif;?>
				</textarea>
			</td>
		</tr>
		<?php if(empty($webboard_answer->id)): ?>
        <tr><th>ชื่อ :</th><td><input type="text" name="author" class="textbox" <?php echo (is_login()) ? 'value="'.user_login()->username.'" readonly' : null ?> ></td></tr>
        <?php else:?>
            <tr><th>ชื่อ :</th><td><input type="text" name="author" class="textbox" value="<?=$webboard_answer->user->username?>" readonly></td></tr>
        <?php endif; ?>
		<tr>
			<td><?php echo form_hidden('webboard_category_id',$webboard_quiz->webboard_category_id)?></td>
		</tr>
		<tr><th></th><td><img src="users/captcha" /> </td></tr>
		<tr><th>Captcha :</th><td><input type="text" name="captcha" class="input-small"> </td></tr>
		<tr><th></th><td><input id="board-submit" type="submit" value="บันทึก"></td></tr>
	</table>
</form>