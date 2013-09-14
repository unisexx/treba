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
<h1 style="margin:0 0 15px;">เกี่ยวกับสมาคม</h1>
<form id="frmMain" method="post" action="abouts/admin/abouts/save/<?php echo $about->id?>" enctype="multipart/form-data">
    <table class="form">
        <tr class="trlang"><th></th><td class="lang"><a href="th" class="active flag th">ไทย</a><a href="en" class="flag en">อังกฤษ</a></td></tr>
        <tr>
            <th>ชื่อเรื่อง :</th>
            <td>
                <input rel="th" type="text" name="title[th]" value="<?php echo lang_decode($about->title,'th')?>" class="full"/>
                <input rel="en" type="text" name="title[en]" value="<?php echo lang_decode($about->title,'en')?>" class="full" />
            </td>
        </tr>
        <tr>
            <th>รายละเอียด :</th>
            <td>
                <div rel="th"><textarea name="detail[th]" class="full tinymce"><?php echo lang_decode($about->detail,'th')?></textarea></div>
                <div rel="en"><textarea name="detail[en]" class="full tinymce"><?php echo lang_decode($about->detail,'en')?></textarea></div>
            </td>
        </tr>
        <tr>    
            <th></th>
            <td>
                <?php echo form_referer() ?>
                <input type="submit" value="บันทึก" class="submit small" />
            </td>
        </tr>
    </table>
</form>
