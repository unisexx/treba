<h1>เกี่ยวกับสมาชิก</h1>
<form id="frmMain" action="weblinks/admin/weblinks/save/<?php echo $weblink->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
	<tr>
		<th></th>
		<td>
			<?php if($weblink->image != ""):?><?php echo thumb("uploads/weblink/".$weblink->image,120,false,1);?><?php endif;?>
		</td>
	</tr>
	<tr><th>รูปภาพ :</th><td><input type="file" name="image" /></td></tr>
	<tr><th>ประเภท :</th><td><?php echo form_dropdown('category_id',$weblink->category->get_option(),$weblink->category_id,'');?></td></tr>
	<!-- <tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title" rel="th" value="<?php echo $weblink->title?>" class="full" />
		</td>
	</tr> -->
	<tr>
        <th>url :</th>
        <td>
            <input type="text" name="url" rel="th" value="<?php echo $weblink->url?>" class="full" />
        </td>
    </tr>
    </tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>