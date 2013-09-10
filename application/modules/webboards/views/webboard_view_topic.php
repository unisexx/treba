<!-- <script language="javascript">
$(function(){
	$("input[name='pollBtn2']").click(function(){
		var p = $(this).parent().parent();
		if(p.find("input[name=poll]:checked").attr('checked')){
			$.get("webboards/vote",{id:p.find("input[name=id]").val(),id_ans:p.find("input[name=poll]:checked").val()},function(data){
				p.parent().find('.poll-result').html(data).show();
				p.hide();
				$(".counter").text(parseInt($(".counter").text()) + 1);							
				});
			}
		return false;
	});
	
	$("input[name='viewBtn2']").click(function(){
		var p = $(this).parent().parent();
			$.get("webboards/view/" + p.find("input[name=id]").val(),function(data){
				p.parent().find('.poll-result').html(data).show();
				p.hide();
				});
		return false;
	});
	
});
</script> -->
<?=get_facebook_thumbnail($webboard_quizs->detail)?>
<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li><a href="webboards">เว็บบอร์ด</a> <span class="divider">/</span></li>
    <li><a href="webboards/category/<?=$webboard_quizs->webboard_category->slug?>"><?=$webboard_quizs->webboard_category->name?></a> <span class="divider">/</span></li>
    <li class="active"><?=$webboard_quizs->title?></li>
</ul>

<h1><?=$webboard_quizs->title?></h1>
		
<div id="newpost-btn"><a href="webboards/reply/<?php echo $webboard_quizs->id?>/-1"><img src="media/images/webboard/btn_post.png" height="29" width="107"></a></div>

<?php echo $webboard_answers->pagination()?>

<table class="table table-bordered viewtopicTB">
<tbody>
	<tr>
		<th width="25%" class="view_reply">ดู : <?php echo $webboard_quizs->counter+1?> | ตอบ : <?php echo $webboard_quizs->webboard_answer->result_count()?></th>
		<th>กระทู้ : <?php echo $webboard_quizs->title?> (อ่าน <?php echo $webboard_quizs->counter?> ครั้ง)</th>
	</tr>
	<tr>
		<td class="f12 personal">
			<?=thumb(avatar($webboard_quizs->user_id),120,120,1,'style="padding:2px; border:1px solid #ccc;"')?>
			<br>
			<ul class="unstyled">
			    <?php if($webboard_quizs->user->id): ?>
				<li><b><?php echo $webboard_quizs->user->username?></b></li>
				<li><img src="uploads/webboards/<?php echo webboard_group($webboard_answer->where('user_id',$webboard_quizs->user_id)->get()->result_count(),'image')?>" title="กลุ่ม : <?php echo webboard_group($webboard_quizs->user->webboard_answer->result_count(),'name')?>"></li>
				<li>กลุ่ม : <?php echo $webboard_quizs->user->level->level?></li>
				<li>เข้าร่วม : <?php echo mysql_to_th($webboard_quizs->user->created)?></li>
				<li>กระทู้ : <?php echo $webboard_quiz->where('user_id',$webboard_quizs->user_id)->get()->result_count()?></li>
				<li>โพสต์ : <?php echo $webboard_answer->where('user_id',$webboard_quizs->user_id)->get()->result_count()?></li>
				<?php else: ?>
				    <li><b><?php echo $webboard_quizs->author?></b></li>
				    <li>กลุ่ม : บุคคลทั่วไป</li>
				<?php endif; ?>
				<?php if (is_login('Administrator')):?>
				<!-- <li>IP : <?php echo $webboard_quizs->ip?></li> -->
				<?php endif;?>
				<!--
				<li><a href="pms/index/<?php echo $webboard_quizs->user_id?>"><img src="themes/default/images/pmto.gif" title="ส่งข้อความส่วนตัว" alt="ส่งข้อความส่วนตัว"> ส่งข้อความส่วนตัว</a></li>
				<li><a href="users/profile/<?php echo $webboard_quizs->user_id?>"><img src="themes/default/images/userinfo.gif" title="โปรไฟล์" alt="โปรไฟล์"> โปรไฟล์</a></li>
				-->
			</ul>
		</td>
		<td valign="top" class="f12">
		<div class="linetopic"><a href="webboards/view_topic/<?php echo $webboard_quizs->slug?>/<?=$webboard_quizs->id?>" class="topicpost"><?php echo $webboard_quizs->title?></a>
		
		<?php if($webboard_quizs->group_id != 0):?>
		<img src="media/images/webboard/ico_lock.png" alt="กระทู้เฉพาะกลุ่ม" title="<?php echo lang_decode($webboard_quiz->group->name,'th')?>" height="24" width="24">
		<?php else:?>
			<?php if($webboard_quizs->webboard_answer->result_count() > 15):?>
				<img src="media/images/webboard/ico_hit.png" alt="กระทู้น่าสนใจ" title="กระทู้น่าสนใจ">
			<?php else:?>
				<?php if($webboard_quizs->type == "normal"):?>
				<img src="media/images/webboard/ico_regular.png" alt="กระทู้ปกติ" title="กระทู้ปกติ" height="24" width="24">
				<?php elseif($webboard_quizs->type == "vote"):?>
				<img src="media/images/webboard/ico_pollboard.png" alt="โพล" title="โพล" height="24" width="24">
				<?php endif;?>
			<?php endif;?>
		<?php endif;?>

<br><img class="ico_time" src="media/images/webboard/ico_time.png" height="12" width="12"> <span class="f10"><?php echo mysql_to_th($webboard_quizs->created,'S',TRUE)?> <?php if($webboard_quizs->group_id != 0):?>(<?php echo lang_decode($webboard_quizs->group->name,'th')?>)<?php endif;?></span>
		<div class="boxrequestdel"><img src="media/images/webboard/ico_deletepost.gif" height="11" width="11"> <a id="relate-quiz" data-toggle="modal" href='#relate' class="link_prev">แจ้งลบความคิดเห็นนี้</a><input class="quiz-id" type="hidden" name="quiz-id" value="<?=$webboard_quizs->id?>"><!--  | <img src="media/images/webboard/ico_refpost.gif" height="11" width="11"> <a href="webboards/reply/<?php echo $webboard_quizs->id?>/0" class="link_prev">อ้างถึงข้อความนี้</a> --></div></div>
			<?php if(is_login('Administrator')):?>
				<div class="right"><a href="webboards/newtopic/<?php echo $webboard_quizs->webboard_category_id?>/<?php echo $webboard_quizs->type?>/<?php echo $webboard_quizs->id?>">แก้ไข</a> | <a href="webboards/delete_topic/<?php echo $webboard_quizs->id?>" onclick="return confirm('ต้องการลบกระทู้นี้?')">ลบ</a></div>
			<?php endif;?>
			<?php if($this->session->userdata('id') == $webboard_quizs->user_id):?>
				<div class="right">
				<a href="webboards/newtopic/<?php echo $webboard_quizs->webboard_category_id?>/<?php echo $webboard_quizs->type?>/<?php echo $webboard_quizs->id?>">แก้ไข</a>
				</div>
			<?php endif;?>
			<div class="post">
			
			<!-- <?php if($webboard_quizs->type == "vote"):?>
				<div id="poll" style="border-bottom:1px solid #000; padding:15px;">
				<h3 class="B f14">แบบสำรวจ : <?php echo $webboard_quizs->title ?></h3><br>
					<div id="listpoll" style=" width:100%;">
						<?php foreach($webboard_quizs->webboard_polldetail as $item): ?>
						<p><input id="<?php echo $item->id ?>" type="radio" value="<?php echo $item->id ?>" name="poll"><label for="<?php echo $item->id ?>" style="cursor:pointer;"> <?php echo $item->name ?></label></p>
						<?php endforeach ?>
						
						<?php if(!is_login()):?>
						<a style="color:#006699;" href="">กรุณาล็อกอินเพื่อทำการโหวต</a>
						<?php else:?>
							<?php if(!is_login('Administrator')):?>
								<?php if($webboard_quizs->group_id != 0):?>
									<?php if(user()->group_id != $webboard_quizs->group_id):?>
										<div style="color:#006699;">กลุ่มของคุณไม่ได้รับอนุญาต</div>
									<?php else:?>
										<p><input type="submit" value="ส่งความคิดเห็น" class="btn_pollcomment" name="pollBtn2"><input type="button" value="ดูผลสำรวจ" class="btn_pollview" name="viewBtn2"></p>
									<?endif;?>
								<?php else:?>
									<p><input type="submit" value="ส่งความคิดเห็น" class="btn_pollcomment" name="pollBtn2"><input type="button" value="ดูผลสำรวจ" class="btn_pollview" name="viewBtn2"></p>
								<?endif;?>
							<?php else:?>
								<p><input type="submit" value="ส่งความคิดเห็น" class="btn_pollcomment" name="pollBtn2"><input type="button" value="ดูผลสำรวจ" class="btn_pollview" name="viewBtn2"></p>
							<?endif;?>
						<?php endif;?>
						
						<input type="hidden" name="id" value="<?php echo $webboard_quizs->id ?>" />
					</div>
					<div class="poll-result" style="display:none; width:100%;"></div>
					<div id="total_vote">จำนวนโหวตทั้งหมด : <span class="counter"><?php echo $webboard_quizs->webboard_pollresult->result_count()?></span> ครั้ง</div>
				</div>
			<?php endif;?> -->
			
			<br>
			<div class="post-blk"><?php echo censor(link_filter($webboard_quizs->detail))?></div>
			
			<div class="fbjlike-blk"><div id="fbjlike"></div></div>
			<?=fanpage_button();?>
			<?php if($webboard_quizs->user->signature != ""):?>
			<div>
				<img class="sigline" src="media/images/webboard/sigline.gif">
				<?php echo $webboard_quizs->user->signature?>
			</div>
			<?php endif;?>
		</div>
		</td>
	</tr>
	
	<?php foreach($webboard_answers as $webboard_ans): ?>
	<tr>
		<td class="f12 personal">
			<?=thumb(avatar($webboard_ans->user_id),120,120,1,'style="padding:2px; border:1px solid #ccc;"')?><br>
			<ul class="unstyled">
			    <?php if($webboard_ans->user->id): ?>
				<li><b><?php echo $webboard_ans->user->username ?></b></li>
				<li><img src="uploads/webboards/<?php echo webboard_group($webboard_answer->where('user_id',$webboard_ans->user_id)->get()->result_count(),'image')?>" title="กลุ่ม : <?php echo webboard_group($webboard_ans->user->webboard_answer->result_count(),'name')?>"></li>
				<li>กลุ่ม : <?php echo $webboard_ans->user->level->level?></li>
				<li>เข้าร่วม : <?php echo mysql_to_th($webboard_ans->user->created)?></li>
				<li>กระทู้ : <?php echo $webboard_quiz->where('user_id',$webboard_ans->user_id)->get()->result_count()?></li>
				<li>โพสต์ : <?php echo $webboard_answer->where('user_id',$webboard_ans->user_id)->get()->result_count()?></li>
				<?php else: ?>
				    <li><b><?php echo $webboard_ans->author ?></b></li>
				    <li>กลุ่ม : บุคคลทั่วไป</li>
				<?php endif; ?>
				<?php if (is_login('Administrator')):?>
				<li>IP : <?php echo $webboard_ans->ip?></li>
				<?php endif;?>
				<!--
				<li><a href="pms/index/<?php echo $webboard_ans->user->id?>"><img src="themes/default/images/pmto.gif" title="ส่งข้อความส่วนตัว" alt="ส่งข้อความส่วนตัว"> ส่งข้อความส่วนตัว</a></li>
				<li><a href="users/profile/<?php echo $webboard_ans->user->id?>"><img src="themes/default/images/userinfo.gif" title="โปรไฟล์" alt="โปรไฟล์"> โปรไฟล์</a></li>
				-->
			</ul>
		<td class="f12" valign="top"><div class="linetopic"><a href="webboards/view_topic/<?php echo $webboard_quizs->slug?>/<?=$webboard_quizs->id?>" class="topicpost"><?php echo $webboard_quizs->title?></a>

		<?php if($webboard_quizs->group_id != 0):?>
		<img src="media/images/webboard/ico_lock.png" alt="กระทู้เฉพาะกลุ่ม" title="<?php echo lang_decode($webboard_quiz->group->name,'th')?>" height="24" width="24">
		<?php else:?>
			<?php if($webboard_quizs->webboard_answer->result_count() > 15):?>
				<img src="media/images/webboard/ico_hit.png" alt="กระทู้น่าสนใจ" title="กระทู้น่าสนใจ">
			<?php else:?>
				<?php if($webboard_quizs->type == "normal"):?>
				<img src="media/images/webboard/ico_regular.png" alt="กระทู้ปกติ" title="กระทู้ปกติ" height="24" width="24">
				<?php elseif($webboard_quizs->type == "vote"):?>
				<img src="media/images/webboard/ico_pollboard.png" alt="โพล" title="โพล" height="24" width="24">
				<?php endif;?>
			<?php endif;?>
		<?php endif;?>
		
  <br><img class="ico_time" src="media/images/webboard/ico_time.png" height="12" width="12"> <span class="f10"><?php echo mysql_to_th($webboard_ans->created,'S',TRUE)?> <?php if($webboard_quizs->group_id != 0):?>(<?php echo lang_decode($webboard_quizs->group->name,'th')?>)<?php endif;?></span>
  <div class="boxrequestdel"><img src="media/images/webboard/ico_deletepost.gif" height="11" width="11"> <a class="relate-ans" data-toggle="modal" href='#relate' class="link_prev">แจ้งลบความคิดเห็นนี้</a><input type="hidden" class="ans-id" value="<?php echo $webboard_ans->id?>"> | <img src="media/images/webboard/ico_refpost.gif" height="11" width="11"> <a href="webboards/reply/<?php echo $webboard_quizs->id?>/<?php echo $webboard_ans->id?>/quote" class="link_prev">อ้างถึงข้อความนี้</a></div>
  </div>
	<div class="post">
		<?php if(is_login('Administrator')):?>
				<div class="right"><a href="webboards/reply/<?php echo $webboard_quizs->id?>/<?php echo $webboard_ans->id?>/edit">แก้ไข</a> | <a href="webboards/delete_answer/<?php echo $webboard_ans->id?>" onclick="return confirm('ต้องการลบความเห็นนี้?')">ลบ</a></div>
		<?php endif;?>
      	<div class="post-blk"><?php echo censor(link_filter($webboard_ans->detail))?></div>
		
		<?php if($webboard_ans->user->signature != ""):?>
		<div>
			<img class="sigline" src="media/images/webboard/sigline.gif">
			<?php echo $webboard_ans->user->signature?>
		</div>
		<?php endif;?>
		
	</div>
  </td>
  </tr>
  <?php endforeach; ?>
  
  
  <!-- กล่องตอบด่วน -->
  <?php if(is_login()):?>
    <tr class="well">
        <td class="f12 personal">
            <?=thumb(avatar(user_login()->id),120,120,1,'style="padding:2px; border:1px solid #ccc;"')?>
            <br>
            <ul class="unstyled">
                <?php if(user_login()->id): ?>
                <li><b><?php echo user_login()->username?></b></li>
                <li><img src="uploads/webboards/<?php echo webboard_group($webboard_answer->where('user_id',user_login()->id)->get()->result_count(),'image')?>" title="กลุ่ม : <?php echo webboard_group(user_login()->webboard_answer->result_count(),'name')?>"></li>
                <li>กลุ่ม : <?php echo user_login()->level->level?></li>
                <li>เข้าร่วม : <?php echo mysql_to_th(user_login()->created)?></li>
                <li>กระทู้ : <?php echo $webboard_quiz->where('user_id',user_login()->id)->get()->result_count()?></li>
                <li>โพสต์ : <?php echo $webboard_answer->where('user_id',user_login()->id)->get()->result_count()?></li>
                <?php else: ?>
                    <li><b><?php echo $webboard_quizs->author?></b></li>
                    <li>กลุ่ม : บุคคลทั่วไป</li>
                <?php endif; ?>
                <?php if (is_login('Administrator')):?>
                <!-- <li>IP : <?php echo $webboard_quizs->ip?></li> -->
                <?php endif;?>
                <!--
                <li><a href="pms/index/<?php echo $webboard_quizs->user_id?>"><img src="themes/default/images/pmto.gif" title="ส่งข้อความส่วนตัว" alt="ส่งข้อความส่วนตัว"> ส่งข้อความส่วนตัว</a></li>
                <li><a href="users/profile/<?php echo $webboard_quizs->user_id?>"><img src="themes/default/images/userinfo.gif" title="โปรไฟล์" alt="โปรไฟล์"> โปรไฟล์</a></li>
                -->
            </ul>
        </td>
        <td>
            <form id="frm-post" action="webboards/save_reply/<?php echo $webboard_quizs->id?>" method="post" enctype="multipart/form-data">
            <div><b>ตอบกระทู้ด่วน</b></div>
            <div>RE : <?php echo $webboard_quizs->title?></div>
            <div><?php echo uppic_mce();?></div>
            <div><textarea name="detail" class="full editor[pm]"></textarea></div>
            <div><img src="users/captcha" /><br><input type="text" name="captcha" class="input-small" placeholder="เลขรหัสลับ"></div>
            <div><?php echo form_hidden('webboard_category_id',$webboard_quizs->webboard_category_id)?><input id="board-submit" type="submit" value="บันทึก"></div>
            </form>
        </td>
    </tr>
    <?php endif;?>
</tbody></table>

<div id="explain">
	<img src="media/images/webboard/2.png" alt="กระทู้ปกติ" title="กระทู้ปกติ" height="24" width="24" />กระทู้ปกติ
    <img src="media/images/webboard/3.png" alt="กระทู้น่าสนใจ" title="กระทู้น่าสนใจ" height="24" width="24"/>กระทู้น่าสนใจ
    <img src="media/images/webboard/4.png" alt="กระทู้ปักหมุด" title="กระทู้ปักหมุด" height="24" width="24">กระทู้ปักหมุด
    <img src="media/images/webboard/5.png" alt="โพลล์" title="โพลล์" height="24" width="24"  />โพล
	<!--<img src="themes/default/images/webboard/6.png" alt="กระทู้เฉพาะกลุ่ม" title="กระทู้เฉพาะกลุ่ม" height="24" width="24" />กระทู้เฉพาะกลุ่ม-->
</div>

<?php echo $webboard_answers->pagination()?>