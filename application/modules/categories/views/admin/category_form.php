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
<h1 style="margin:0 0 15px;">หมวดหมู่</h1>
<form method="post" action="categories/admin/categories/save/<?php echo $category->id?>" enctype="multipart/form-data">
	<table class="form">
	    <tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
		<tr>
			<th>ชื่อหมวดหมู่ :</th>
			<td>
				<input rel="th" type="text" name="name[th]" value="<?php echo lang_decode($category->name,'th')?>" />
				<input rel="en" type="text" name="name[en]" value="<?php echo lang_decode($category->name,'en')?>" />
			</td>
		</tr>
		<tr>	
			<th></th>
			<td>
			<input type="hidden" name="parents" value="<?php echo $parent->id ?>"  />
			<input type="hidden" name="module" value="<?php echo $parent->module ?>"  />
			<input type="submit" value="บันทึก" class="submit small" />
			<input type="button" value="ย้อนกลับ" class="submit small" onclick="window.location = 'categories/admin/categories/<?php echo $parent->module?>'" />
			</td>
		</tr>
	</table>
</form>
