<script type="text/javascript">
$(function(){
    $("[rel=en]").hide();
    $(".lang a").click(function(){
        $("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
        $(this).addClass('active').siblings().removeClass('active');
        return false;
    })
})
</script>
<h1>เกี่ยวกับสมาชิก</h1>
<form id="frmMain" action="members/admin/members/save/<?php echo $member->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
    <tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
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
			<input rel="th" type="text" name="company[th]" value="<?php echo lang_decode($member->company,'th')?>" class="full" /> 
			<input rel="en" type="text" name="company[en]" value="<?php echo lang_decode($member->company,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
        <th>ชื่อผู้ประกอบการ :</th>
        <td>
            <input rel="th" type="text" name="name[th]" value="<?php echo lang_decode($member->name,'th')?>" class="full" />
            <input rel="en" type="text" name="name[en]" value="<?php echo lang_decode($member->name,'en')?>" class="full" />
        </td>
    </tr>
    <tr>
        <th>ที่ตั้งสำนักงาน :</th>
        <td>
            <div rel="th"><textarea name="address[th]" class="full"><?php echo lang_decode($member->address,'th')?></textarea></div>
            <div rel="en"><textarea name="address[en]" class="full"><?php echo lang_decode($member->address,'en')?></textarea></div>
        </td>
    </tr><tr>
        <th>โทรศัพท์ :</th>
        <td>
            <input rel="th" type="text" name="tel" value="<?php echo lang_decode($member->tel,'th')?>" class="full" />
        </td>
    </tr><tr>
        <th>โทรสาร :</th>
        <td>
            <input rel="th" type="text" name="fax" value="<?php echo $member->fax?>" class="full" />
        </td>
    </tr><tr>
        <th>มือถือ:</th>
        <td>
            <input rel="th" type="text" name="mobile" value="<?php echo $member->mobile?>" class="full" />
        </td>
    </tr><tr>
        <th>เว็บไซต์ :</th>
        <td>
            <input rel="th" type="text" name="website" value="<?php echo $member->website?>" class="full" />
        </td>
    </tr><tr>
        <th>อีเมล์:</th>
        <td>
            <input rel="th" type="text" name="email" value="<?php echo $member->email?>" class="full" />
        </td>
    </tr><tr>
        <th>ประวัติ:</th>
        <td>
            <input rel="th" type="text" name="record[th]" value="<?php echo lang_decode($member->record,'th')?>" class="full" />
            <input rel="en" type="text" name="record[en]" value="<?php echo lang_decode($member->record,'en')?>" class="full" />
        </td>
    </tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>