<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
$(function(){
    $("#frmMain").validate({
        rules: 
        {
            "title": 
            { 
                required: true
            }
        },
        messages:
        {
            "title": 
            { 
                required: "กรุณากรอกหัวข้อค่ะ"
            }
        }
    });
})
</script>
<h1>Banner</h1>
<form id="frmMain" action="banners/admin/banners/save/<?php echo $banner->id ?>" method="post" enctype="multipart/form-data" >
    
<table class="form">
    <tr>
        <th>หัวข้อ :</th>
        <td>
            <input type="text" name="title" value="<?php echo $banner->title?>" class="full" />
        </td>
    </tr>
    <tr>
        <th>รูปแบนเนอร์ :</th>
        <td><input class="full" type="text" name="image" value="<?php echo $banner->image?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'image')" /></td>
    </tr>
    <tr>
        <th>แฟรชแบนเนอร์ :</th>
        <td><input class="full" type="text" name="media" value="<?php echo $banner->media?>"/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'media')" /></td>
    </tr>
    <tr>
        <th>url :</th>
        <td><input type="text" name="url" value="<?=$banner->url?>" class="full"></td>
    </tr>
    <tr>
        <th>width :</th>
        <td><input type="text" name="width" value="<?=$banner->width?>"> px</td>
    </tr>
    <tr>
        <th>heigth :</th>
        <td><input type="text" name="height" value="<?=$banner->height?>"> px</td>
    </tr>
    <tr>
        <th>ตำแหน่ง</th>
        <td><?=form_dropdown('position',array('top'=>'top','sidebar'=>'sidebar','footer'=>'footer','footer468x60'=>'footer 468 x 60','footer125x125'=>'footer 125 x 125','footertext'=>'footer text'),$banner->position)?></td>
    </tr>
    <tr><th>เริ่ม :</th><td><input type="text" name="start_date" value="<?php echo DB2Date(($banner->start_date)?$banner->start_date:date("Y-m-d"))?>" class="datepicker" /></td></tr>
    <tr><th>สิ้นสุด :</th><td><input type="text" name="end_date" value="<?php echo DB2Date($banner->end_date)?>" class="datepicker" /></td></tr>
    <tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>