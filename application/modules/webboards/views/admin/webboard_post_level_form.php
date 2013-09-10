<h1>เว็บบอร์ด</h1>
    <div>
        <div style="display:block;">
		
			<form action="webboards/admin/webboard_post_levels/save/<?php echo $webboard_post_level->id?>" method="post" enctype="multipart/form-data">
				<table class="form">
					<tr>
						<th>ชื่อกลุ่ม :</th>
						<td><input type="text" name="name" value="<?php echo $webboard_post_level->name ?>"></td>
					</tr>
					<tr>
						<th>ระดับโพสต์ :</th>
						<td><input type="text" name="post" value="<?php echo $webboard_post_level->post?>"></td>
					</tr>
					<tr>
						<th>รูปประจำกลุ่ม :</th>
						<td><input type="file" name="image" /></td>
					</tr>
					<tr><th></th><td><input type="submit" value="บันทึก"></td></tr>
				</table>
			</form>
		</div>
    </div>