<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
tiny('detail');
</script>

<h1>ดาวน์โหลดเอกสาร</h1>
<form id="frmMain" action="downloads/admin/downloads/save/<?php echo $download->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
	<tr>
		<th></th>
		<td>
			<?php if($download->image != ""):?><?php echo thumb("uploads/download/".$download->image,120,false,1);?><?php endif;?>
		</td>
	</tr>
	<tr><th>ไฟล์แนบ :</th><td><input type="file" name="file" /></td></tr>
	<tr>
		<th>ชื่อไฟล์เอกสาร :</th>
		<td>
			<input type="text" name="title" rel="th" value="<?php echo $download->title?>" class="full" />
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>