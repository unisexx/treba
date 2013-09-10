<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/tinymce.js"></script>
<h1>จดหมายข่าว</h1>
<form action="newsletters/admin/newsletters/save/<?php echo $newsletters->id?>" method="post" enctype="multipart/form-data">
<table class="form">
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input rel="th" type="text" name="title" class="full" value="<?php echo $newsletters->title?>">
		</td>
	</tr>
	<tr>
		<th>ไฟล์แนบ :</th>
		<td>
			<!--<input class="full" type="text" name="attachment" value="<?php echo $newsletters->attachment?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'newsletter_attachment')" />-->
			<input class="full" type="file" name="attachment" size="82" />
		</td>
	</tr>
	<tr>
		<th></th>
		<td>
			<?php echo uppic_mce();?>
		</td>
	</tr>
	<tr>
		<th>เนื้อหา :</th>
		<td>
			<textarea name="detail" class="full editor[webboard]"><?php echo $newsletters->detail?></textarea>
		</td>
	</tr>
	<tr>
		<th></th>
		<td><input type="checkbox" name="sendmail" value="1"> ส่งจดหมาย</td>
	</tr>
	<tr><th></th><td class="sbtn"><input type="submit" value="บันทึก"></td></tr>
</table>
</form>

<script type="text/javascript">
$(document).ready(function(){
	$('input[type=submit]').live("click",function(){
		$('.notice').hide();
		$("<span class='notice'><img src='themes/gcdnew/images/loadingAnimation.gif' style='margin:0 0 0 5px;' /> <span style='color:#0080c1; vertical-align:text-top;'>โปรดรอ ระบบกำลังทำการส่งข้อมูล</span></span>").appendTo(".sbtn");
	});
});	
</script>