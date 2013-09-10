<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<!-- <script type="text/javascript" src="media/tiny_mce/tinymce.js"></script> -->
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
})
</script>
<h1>Ticker</h1>
<form id="frmMain" action="tickers/admin/tickers/save/<?php echo $ticker->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title" value="<?php echo $ticker->title?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>url :</th>
		<td><input type="text" name="url" value="<?=$ticker->url?>" class="full"></td>
	</tr>
	<tr>
		<th>รายละเอียด :</th>
		<td>
			<?php echo uppic_mce();?>
			<textarea name="detail" class="editor[pm]"><?php echo $ticker->detail?></textarea>
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>