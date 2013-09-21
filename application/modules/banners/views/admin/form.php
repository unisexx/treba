<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
tiny('detail');
</script>
<h1 style="margin:0 0 15px;">แบนเนอร์</h1>
<form id="frmMain" method="post" action="banners/admin/banners/save/<?php echo $banner->id?>" enctype="multipart/form-data">
    <table class="form">
        <tr>
            <th>รายละเอียด :</th>
            <td>
                <div rel="th"><textarea name="detail" class="full tinymce"><?php echo $banner->detail?></textarea></div>
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
