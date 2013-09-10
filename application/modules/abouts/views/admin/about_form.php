<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
	tiny('detail');
	
	$(document).ready(function(){
		var formId = $("#form-id").val() - 1;
		$("#horri_menu ul li:eq("+formId+")").addClass("active");
	});
</script>
<h1>เกี่ยวกับเรา</h1>
<?php include "_menu.php";?>

<table class="list">
	<tr>
		<th>รายละเอียด
	</tr>
</table>
<br>
<form method="post" action="abouts/admin/abouts/save/<?php echo $this->uri->segment(5)?>" id="frm">
<table class="form tab">
	<tr>
	<tr><td></td></tr>
	<tr>
		<td>
		<div><textarea name="detail" class="full tinymce"><?php echo $about->detail?></textarea></div>
		</td>
	</tr>
	<tr>
		<td>
			<input id="form-id" type="hidden" name="id" value="<?php echo $this->uri->segment(5)?>">
			<?php if(permission('abouts', 'update')):?>
			<?php echo form_submit('',lang('btn_submit'))?>
			<?php endif;?>
		</td>
	</tr>
</table>
</form>