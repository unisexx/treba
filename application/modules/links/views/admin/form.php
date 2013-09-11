<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
tiny('detail');
</script>

<h1>ลิ้งค์</h1>
<form id="frmMain" action="links/admin/links/save/<?php echo $link->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
	<tr>
		<th>ฃื่อลิ้งค์ :</th>
		<td><input type="text" name="title" rel="th" value="<?php echo $link->title?>" class="full" /></td>
	</tr>
	<tr>
        <th>url :</th>
        <td><input type="text" name="url" rel="th" value="<?php echo $link->url?>" class="full" /></td>
    </tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>