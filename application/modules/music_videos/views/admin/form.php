<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
//tiny('detail');
</script>
<h1 style="margin:0 0 15px;">Music Video</h1>
<form id="frmMain" method="post" action="music_videos/admin/music_videos/save/<?=$mv->id?>" enctype="multipart/form-data">
	<table class="form">
		
		<tr>
			<th>หัวข้อ :</th>
			<td>
				<input type="text" name="title" value="<?php echo $mv->title?>" style="width:500px;"/>
			</td>
		</tr>
		<tr>
            <th>รายละเอียด :</th>
            <td>
                <div><textarea name="detail" class="full tinymce" style="height: 500px;"><?php echo $mv->detail?></textarea></div>
            </td>
        </tr>
            <th>vdo script :</th>
            <td>
                <div><textarea name="video_script" class="full"><?php echo $mv->video_script?></textarea></div>
            </td>
		<tr>	
			<th></th>
			<td>
			<input type="hidden" name="id" value="<?php echo $mv->id ?>"  />
			<input type="submit" value="บันทึก" class="submit small" />
			</td>
		</tr>
	</table>
</form>
