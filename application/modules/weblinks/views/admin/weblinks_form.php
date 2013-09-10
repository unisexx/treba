<h1>เว็บลิ้งค์</h1>
<form action="weblinks/admin/weblinks/save/<?php echo $weblinks->id ?>" method="post" enctype="multipart/form-data" id="weblink-form">
<table class="form">
	
	<tr>
		<th>ชื่อเว็บ :</th>
		<td>
			<input type="text" name="title" rel="th" value="<?php echo $weblinks->title?>" class="full" />
		</td>
	</tr>
	<tr>
		<th>URL :</th>
		<td><input type="text" name="url" value="<?php echo $weblinks->url?>"><i> *ตัวอย่าง : http://www.google.com/</i></td>
	</tr>
	<tr>
		<th>หมวด :</th>
		<td><?php echo form_dropdown('category_id',$weblinks->category->get_option(),$weblinks->category_id,'');?></td></tr>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก"><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>