<h1>ไฮไลท์</h1>
<form action="hilights/admin/hilights/save/<?php echo $hilight->id ?>" method="post" enctype="multipart/form-data" >
<table class="form">
	<tr><th></th><td><img class="img" style="width:656px; height:253px;" src="<?php echo (is_file('uploads/hilight/'.$hilight->image))? 'uploads/hilight/'.$hilight->image : 'media/images/dummy/656x253.gif' ?>"  />real 659x219</td></tr>
	<tr><th>รูปภาพ :</th><td><input type="file" name="image" /></td></tr>
	
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title" rel="th" value="<?php echo $hilight->title?>" class="full" />
		</td>
	</tr>
	<tr><th>ลิ้งไปเว็บไซต์ :</th><td><input class="full" type="text" name="url" value="<?php echo $hilight->url?>"/></td></tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><input type="button" name="back" value="ย้อนกลับ" onclick="window.location = 'hilights/admin/hilights'" /></td></tr>
</table>
</form>