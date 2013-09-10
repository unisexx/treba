<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
tiny('detail');
</script>
<h1 style="margin:0 0 15px;">Kpop News</h1>
<form id="frmMain" method="post" action="kpop_news/admin/kpop_news/save/<?=$new->id?>" enctype="multipart/form-data">
	<table class="form">
		
		<tr>
			<th>หัวข้อ :</th>
			<td>
				<input type="text" name="title" value="<?php echo $new->title?>" style="width:500px;"/>
			</td>
		</tr>
		<tr>
            <th>รายละเอียด :</th>
            <td>
                <div><textarea name="detail" class="full tinymce"><?php echo $new->detail?></textarea></div>
            </td>
        </tr>
		<tr>	
			<th></th>
			<td>
			<input type="submit" value="บันทึก" class="submit small" />
			</td>
		</tr>
	</table>
</form>
