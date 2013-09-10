<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
tiny('detail');
</script>
<h1 style="margin:0 0 15px;">เกี่ยวกับสมาคม</h1>
<form id="frmMain" method="post" action="abouts/admin/abouts/save/<?php echo $about->id?>" enctype="multipart/form-data">
    <table class="form">
        
        <tr>
            <th>ชื่อเรื่อง :</th>
            <td>
                <input type="text" name="title" value="<?php echo $about->title?>" style="width:500px;"/>
            </td>
        </tr>
        <tr>
            <th>รายละเอียด :</th>
            <td>
                <div><textarea name="detail" class="full tinymce"><?php echo $about->detail?></textarea></div>
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
