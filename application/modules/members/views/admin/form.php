<h1>เกี่ยวกับสมาชิก</h1>
<form id="frmMain" action="members/admin/members/save/<?php echo $member->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
	<tr>
		<th></th>
		<td>
			<?php if($member->image != ""):?><?php echo thumb("uploads/member/".$member->image,120,false,1);?><?php endif;?>
		</td>
	</tr>
	<tr><th>รูปภาพ :</th><td><input type="file" name="image" /></td></tr>
	<tr><th>ประเภท :</th><td><?php echo form_dropdown('category_id',$member->category->get_option(),$member->category_id,'');?></td></tr>
	<tr>
		<th>ชื่อบริษัท :</th>
		<td>
			<input type="text" name="company" rel="th" value="<?php echo $member->company?>" class="full" />
		</td>
	</tr>
	<tr>
        <th>ชื่อผู้ประกอบการ :</th>
        <td>
            <input type="text" name="name" rel="th" value="<?php echo $member->name?>" class="full" />
        </td>
    </tr>
    <tr>
        <th>ที่ตั้งสำนักงาน :</th>
        <td>
            <textarea name="address" class="full"><?php echo $member->address?></textarea>
        </td>
    </tr><tr>
        <th>โทรศัพท์ :</th>
        <td>
            <input type="text" name="tel" rel="th" value="<?php echo $member->tel?>" class="full" />
        </td>
    </tr><tr>
        <th>โทรสาร :</th>
        <td>
            <input type="text" name="fax" rel="th" value="<?php echo $member->fax?>" class="full" />
        </td>
    </tr><tr>
        <th>มือถือ:</th>
        <td>
            <input type="text" name="mobile" rel="th" value="<?php echo $member->mobile?>" class="full" />
        </td>
    </tr><tr>
        <th>เว็บไซต์ :</th>
        <td>
            <input type="text" name="website" rel="th" value="<?php echo $member->website?>" class="full" />
        </td>
    </tr><tr>
        <th>อีเมล์:</th>
        <td>
            <input type="text" name="email" rel="th" value="<?php echo $member->email?>" class="full" />
        </td>
    </tr><tr>
        <th>ประวัติ:</th>
        <td>
            <input type="text" name="record" rel="th" value="<?php echo $member->record?>" class="full" />
        </td>
    </tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>