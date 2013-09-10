<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#add_img").click(function(){
		var form = $("tr:eq(0),tr:eq(1)").clone();
		form.find("input:text").val("");
		$(".form tr:last").before(form);
	});
	
	$("ul.menu li a:contains(ภาพกิจกรรม)").parent().addClass("active");
});	
</script>

<h1><a href="galleries/admin/categories">ภาพถ่ายกิจกรรม</a> » <a href="galleries/admin/galleries/index/<?php echo $categories->id ?>"><?php echo lang_decode($categories->name,'')?></a></h1>

<?php if(!$galleries->id):?>
<input id="add_img" type="button" value="เพิ่มรายการ" style="float: left;"><br clear="all"><hr>
<form action="galleries/admin/galleries/save" method="post" enctype="multipart/form-data" id="gallery_form">
<table class="form">
	<tr>
		<th>ไฟล์แนบ :</th>
		<td><input type="text" name="image[]" value="<?php echo $galleries->image?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'galleries')" /></td>
	</tr>
	<tr>
		<th>ชื่อภาพ :</th>
		<td><input type="text" name="title[]" value="<?php echo $galleries->title?>"></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<input type="hidden" name="category_id" value="<?php echo $categories->id?>">
			<input type="submit" value="บันทึก">
		</td>
	</tr>
</table>
</form>
<?php else:?>
<form action="galleries/admin/galleries/save" method="post" enctype="multipart/form-data" id="gallery_form">
<table class="form">
	<?php if(is_file($galleries->image)): ?>
		<tr>
			<th></th>
			<td><?php echo thumb($galleries->image,180,120,0)?>
			</td>
		</tr>
	<?php endif; ?>
	<tr>
		<th>ไฟล์แนบ :</th>
		<td><input type="text" name="image" value="<?php echo $galleries->image?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'galleries')" /></td>
	</tr>
	<tr>
		<th>ชื่อภาพ :</th>
		<td><input type="text" name="title" value="<?php echo $galleries->title?>"></td>
	</tr>
	<tr>
		<th></th>
		<td>
			<input type="hidden" name="category_id" value="<?php echo $categories->id?>">
			<input type="hidden" name="id" value="<?php echo $galleries->id?>">
			<input type="submit" value="บันทึก">
		</td>
	</tr>
</table>
</form>
<?php endif;?>
