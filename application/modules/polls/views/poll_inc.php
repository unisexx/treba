 <script language="javascript">
$(function(){
	$("input[name='pollBtn2']").click(function(){
		var p = $(this).parent().parent();
		if(p.find("input[name=poll]:checked").attr('checked')){
			$.get("polls/vote",{id:p.find("input[name=id]").val(),id_ans:p.find("input[name=poll]:checked").val()},function(data){
				p.parent().find('.poll-result').html(data).show();
				p.hide();							
				});
		}
		else
		{
			alert('กรุณาเลือกคำตอบก่อนส่งความคิดเห็นค่ะ');
		}
		return false;
	});
	
	$(".link_vote").click(function(){
		var p = $(this).parent().parent();
			$.get("polls/view/" + p.find("input[name=id]").val(),function(data){
				p.parent().find('.poll-result').html(data).show();
				p.hide();
				});
		return false;
	});
});
</script>

<!-- <a class="moreleft" href="polls">more</a> -->
<div id="poll">
	<b><?php echo $poll->title ?></b>
	<div class="chkbox">
		<?php foreach($poll->polldetail as $item): ?>
		<p><input type="radio" value="<?php echo $item->id ?>" name="poll"><label><?php echo $item->name ?></label></p>
		<?php endforeach ?>
		<p>
			<input type="submit" value="ส่งความคิดเห็น" class="btn_pollcomment bt_vote" name="pollBtn2"> <!-- <input value="ดูผลสำรวจ" type="button" class="btn_pollview link_vote" name="viewBtn2">
			 --><a href="#" class="link_vote">ดูผลโหวต</a>
		</p>
		<input type="hidden" name="id" value="<?php echo $poll->id ?>" />
	</div>
	<div class="poll-result" style="display:none;"></div>
</div>

