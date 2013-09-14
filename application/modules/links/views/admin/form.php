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

<h1>ลิ้งค์</h1>
<form id="frmMain" action="links/admin/links/save/<?php echo $link->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
	<tr>
	   <tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
		<th>ฃื่อลิ้งค์ :</th>
		<td>
		    <input rel="th" type="text" name="title[th]" value="<?php echo lang_decode($link->title,'th')?>" class="full" />
		    <input rel="en" type="text" name="title[en]" value="<?php echo lang_decode($link->title,'en')?>" class="full" />
		</td>
	</tr>
	<tr>
        <th>url :</th>
        <td><input type="text" name="url" value="<?php echo $link->url?>" class="full" /></td>
    </tr>
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>