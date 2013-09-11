<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
tiny('detail');
</script>

<h1>ข่าวสารและกิจกรรม</h1>
<form id="frmMain" action="bnews/admin/bnews/save/<?php echo $bnew->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
	<tr>
		<th></th>
		<td>
			<?php if($bnew->image != ""):?><?php echo thumb("uploads/bnew/".$bnew->image,120,false,1);?><?php endif;?>
		</td>
	</tr>
	<tr><th>รูปภาพ :</th><td><input type="file" name="image" /></td></tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title" rel="th" value="<?php echo $bnew->title?>" class="full" />
		</td>
	</tr>
	<tr>
        <th>รายละเอียด :</th>
        <td>
            <textarea name="detail" class="full tinymce"><?php echo $bnew->detail?></textarea>
        </td>
    </tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>