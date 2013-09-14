<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
tiny('detail[th],detail[en]');
$(function(){
    $("[rel=en]").hide();
    $(".lang a").click(function(){
        $("[rel=" + $(this).attr("href") + "]").show().siblings().hide();
        $(this).addClass('active').siblings().removeClass('active');
        return false;
    })
})
</script>

<h1>ข่าวสารและกิจกรรม</h1>
<form id="frmMain" action="bnews/admin/bnews/save/<?php echo $bnew->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
    <tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<tr>
		<th></th>
		<td>
			<?php if($bnew->image != ""):?><?php echo thumb("uploads/bnew/".$bnew->image,120,false,1);?><?php endif;?>
		</td>
	</tr>
	<tr><th>รูปภาพ :</th><td><input type="file" name="image" /></td></tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input rel="th" type="text" name="title[th]" value="<?php echo lang_decode($bnew->title,'th')?>" class="full" />
			<input rel="en" type="text" name="title[en]" value="<?php echo lang_decode($bnew->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
        <th>รายละเอียด :</th>
        <td>
            <div rel="th"><textarea name="detail[th]" class="full tinymce"><?php echo lang_decode($bnew->detail,'th')?></textarea></div>
            <div rel="en"><textarea name="detail[en]" class="full tinymce"><?php echo lang_decode($bnew->detail,'en')?></textarea></div>
        </td>
    </tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>