<div class="block">
<h1>ชื่อกระดานข่าว</h1>
<form method="post" action="webboards/admin/webboard_categories/save/<?php echo $category->id?>" enctype="multipart/form-data">
	<table class="form">
		<tr>
			<th>ชื่อ :</th>
			<td><input type="text" name="name" value="<?php echo $category->name?>" /></td>
		</tr>
		<tr>
			<th>รายละเอียด :</th>
			<td><input type="text" name="description" value="<?php echo $category->description?>" class="full" /></td>
		</tr>
		<tr>	
			<th></th>
			<td>
			<input type="submit" value="บันทึก" class="submit small" />
			</td>
		</tr>
	</table>
</form>
</div>