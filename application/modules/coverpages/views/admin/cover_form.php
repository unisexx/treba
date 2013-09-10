<link rel="stylesheet" href="media/js/farbtastic/farbtastic.css" type="text/css" />
<script type="text/javascript" src="media/js/farbtastic/farbtastic.js"></script>
<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript" src="media/js/jquery.validate.min.js"></script>
<script type="text/javascript">
tiny('detail');
$(function(){
	$("#frmMain").validate({
		rules: 
		{
			"title": 
			{ 
				required: true
			}
		},
		messages:
		{
			"title": 
			{ 
				required: "กรุณากรอกหัวข้อค่ะ"
			}
		}
	});
	
	$('#picker').farbtastic('#color');
	
	$("#picker").hide();
	
	$('#color').focus(function(){
		$('#picker').slideUp(function(){
			$(this).slideDown();
		});
	});
	
	// $('#color').blur(function(){
		// $('#picker').slideDown(function(){
			// $(this).slideUp();
		// });
	// });
});
</script>
<h1>หน้าแรก</h1>
<form id="frmMain" action="coverpages/admin/coverpages/save/<?php echo $coverpage->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
	<tr>
		<th>รูปภาพ :</th>
		<td><input type="text" name="image" value="<?php echo $coverpage->image?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'coverpage')" /></td>
	</tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title" rel="th" value="<?php echo $coverpage->title?>" class="full" />
		</td>
	</tr>
	<!-- <tr>
		<th>รายละเอียด :</th>
		<td>
			<div rel="th"><textarea name="detail" class="full tinymce"><?php echo $coverpage->detail?></textarea></div>
			
		</td>
	</tr> -->
	<tr>
		<th>สีพื้นหลัง</th>
		<td>
			<div id="picker"></div>
			<input type="text" id="color" name="background" value="<?php echo ($coverpage->background == "")?"#123456":$coverpage->background;?>" /><!--  <input class="tgcolor" type="button" value="เลือกสีพื้นหลัง"> -->
		</td>
	</tr>
	<tr><th>เริ่ม :</th><td><input type="text" name="start_date" value="<?php echo DB2Date(($coverpage->start_date)?$coverpage->start_date:date("Y-m-d"))?>" class="datepicker" /></td></tr>
	<tr><th>สิ้นสุด :</th><td><input type="text" name="end_date" value="<?php echo DB2Date($coverpage->end_date)?>" class="datepicker" /></td></tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>