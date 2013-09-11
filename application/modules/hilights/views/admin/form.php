<h1>ไฮไลท์</h1>
<form action="hilights/admin/hilights/save/<?php echo $hilight->id ?>" method="post" enctype="multipart/form-data" >
<table class="form">
    <tr>
        <th></th>
        <td>
            <?php if($hilight->image != ""):?><?php echo thumb("uploads/hilight/".$hilight->image,500,false,1);?><?php endif;?>
        </td>
    </tr>
	<tr><th>รูปภาพ :</th><td><input type="file" name="image" /></td></tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title" rel="th" value="<?php echo $hilight->title?>" class="full" />
		</td>
	</tr>
	<tr><th>ลิ้งไปเว็บไซต์ :</th><td><input class="full" type="text" name="url" value="<?php echo $hilight->url?>"/></td></tr>
	<tr><th></th><td><?php echo form_referer() ?><input type="submit" value="บันทึก" /><input type="button" name="back" value="ย้อนกลับ" onclick="window.location = 'hilights/admin/hilights'" /></td></tr>
</table>
</form>