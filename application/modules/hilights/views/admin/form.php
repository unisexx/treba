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
<h1>ไฮไลท์</h1>
<form action="hilights/admin/hilights/save/<?php echo $hilight->id ?>" method="post" enctype="multipart/form-data" >
<table class="form">
    <tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
    <tr>
        <th></th>
        <td>
            <?php if($hilight->image != ""):?><?php echo thumb("uploads/hilight/".$hilight->image,500,false,1);?><?php endif;?>
        </td>
    </tr>
	<tr><th>รูปภาพ :</th><td><input type="file" name="image" /></td></tr>
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input rel="th" type="text" name="title[th]" value="<?php echo lang_decode($hilight->title,'th')?>" class="full" />
			<input rel="en" type="text" name="title[en]" value="<?php echo lang_decode($hilight->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr><th>ลิ้งไปเว็บไซต์ :</th><td><input class="full" type="text" name="url" value="<?php echo $hilight->url?>"/></td></tr>
	<tr><th></th><td><?php echo form_referer() ?><input type="submit" value="บันทึก" /><input type="button" name="back" value="ย้อนกลับ" onclick="window.location = 'hilights/admin/hilights'" /></td></tr>
</table>
</form>