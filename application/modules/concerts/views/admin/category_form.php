<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
tiny('detail');
</script>
<h1 style="margin:0 0 15px;">อัลบั้ม</h1>
<form id="frmMain" method="post" action="vdos/admin/categories/save/<?php echo $category->id?>" enctype="multipart/form-data">
	<table class="form">
		
		<tr>
			<th>ชื่อเรื่อง :</th>
			<td>
				<input type="text" name="name" value="<?php echo $category->name?>" style="width:500px;"/>
			</td>
		</tr>
		<tr>
            <th>รายละเอียด :</th>
            <td>
                <div><textarea name="detail" class="full tinymce"><?php echo $category->detail?></textarea></div>
            </td>
        </tr>
        <tr>
            <th>ภาพปก :</th>
            <td><input type="text" name="image" value="<?php echo $category->image?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'galleries')" /></td>
        </tr>
        <tr>
            <th>สถานะ :</th>
            <td>
                <?php echo form_dropdown("end",array('not'=>'ยังไม่จบ','end'=>'จบเรื่องแล้ว'),$category->end)?>
            </td>
        </tr>
		<tr>	
			<th></th>
			<td>
			<input type="hidden" name="parents" value="<?php echo $parent->id ?>"  />
			<input type="hidden" name="module" value="<?php echo $parent->module ?>"  />
			<input type="submit" value="บันทึก" class="submit small" />
			</td>
		</tr>
	</table>
</form>
