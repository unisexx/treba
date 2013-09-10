<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/tinymce.js"></script>
<h1 style="margin:0 0 15px;">Pages</h1>
<form id="frmMain" method="post" action="pages/admin/pages/save/<?=$page->id?>" enctype="multipart/form-data">
    <table class="form">
        
        <tr>
            <th>หัวข้อ :</th>
            <td>
                <input type="text" name="title" value="<?php echo $page->title?>" style="width:500px;"/>
            </td>
        </tr>
        <tr>
            <th>รายละเอียด :</th>
            <td>
                <?php echo uppic_mce();?>
                <textarea name="detail" cols="20" class="editor"><?php echo $page->detail?></textarea>
            </td>
        </tr>
        <tr>    
            <th></th>
            <td>
            <input type="hidden" name="id" value="<?php echo $page->id ?>"  />
            <input type="submit" value="บันทึก" class="submit small" />
            </td>
        </tr>
    </table>
</form>
