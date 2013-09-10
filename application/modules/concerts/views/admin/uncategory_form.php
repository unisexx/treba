<h1><a href="vdos/admin/vdos/uncategory">วิดิทัศน์</a> » <?=$vdo->title?></h1>
<form action="vdos/admin/vdos/uncategory_save" method="post" enctype="multipart/form-data" id="gallery_form">
<table class="form">
	<tr>
		<th>ชื่อ:</th>
		<td><input class="inputTitle" type="text" name="title" value="<?php echo $vdo->title?>"></td>
	</tr>
	<tr>
		<th style="vertical-align: top;">วีดีโอสคริป :</th>
		<td>
			<textarea class="inputTextArea" name="vdo_script" style="width:500px; height: 200px"><?php echo $vdo->vdo_script?></textarea>
			<input type="hidden" name="id" value="<?php echo $vdo->id?>">
		</td>
	</tr>
	<tr>
		<th>หมวดหมู่</th>
		<td>
		<?php echo form_dropdown('category_id',get_option('id','name','categories where end <> "end"'))?>
		</td>
	</tr>
	<tr>
		<th></th>
		<td>
			<input type="submit" value="บันทึก">
		</td>
	</tr>
</table>
</form>