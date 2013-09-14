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

<h1>ดาวน์โหลดเอกสาร</h1>
<form id="frmMain" action="downloads/admin/downloads/save/<?php echo $download->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
    <tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
	<tr>
		<th></th>
		<td>
			<?php if($download->image != ""):?><?php echo thumb("uploads/download/".$download->image,120,false,1);?><?php endif;?>
		</td>
	</tr>
	<tr><th>ไฟล์แนบ :</th><td><input type="file" name="file" /></td></tr>
	<tr>
		<th>ชื่อไฟล์เอกสาร :</th>
		<td>
			<input rel="th" type="text" name="title[th]" value="<?php echo lang_decode($download->title,'th')?>" class="full" />
			<input rel="en" type="text" name="title[en]" value="<?php echo lang_decode($download->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>