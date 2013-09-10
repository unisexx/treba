<h1 style="margin:0 0 15px;">LINE Sticker Shop</h1>
<form id="frmMain" method="post" action="lines/admin/lines/save/<?=$line->id?>" enctype="multipart/form-data">
    <table class="form">
        
        <tr>
            <th>ประเภท :</th>
            <td>
                <select name="category">
                    <option value="global" <?php echo ($line->category == 'global')?'selected=selected':'';?>>ทั่วโลก</option>
                    <option value="japan" <?php echo ($line->category == 'japan')?'selected=selected':'';?>>ญี่ปุ่น</option>
                    <option value="korea" <?php echo ($line->category == 'korea')?'selected=selected':'';?>>เกาหลี</option>
                    <option value="spain" <?php echo ($line->category == 'spain')?'selected=selected':'';?>>สเปน</option>
                </select>
            </td>
        </tr>
        <tr>
            <th>รหัสสติ๊กเกอร์ :</th>
            <td>
                <input type="text" name="sticker_code" value="<?php echo $line->sticker_code?>"/>
            </td>
        </tr>
        <tr>
            <th>หัวข้อ :</th>
            <td>
                <input class="full" type="text" name="title" value="<?php echo $line->title?>"/>
            </td>
        </tr>
        <tr>
            <th>โคเวอร์ :</th>
            <td>
                <input class="full" type="text" name="cover" value="<?php echo $line->cover?>"/>
            </td>
        </tr>
        <tr>
            <th>พรีวิว :</th>
            <td>
                <input class="full" type="text" name="preview" value="<?php echo $line->preview?>"/>
            </td>
        </tr>
        <tr>
            <th>QR :</th>
            <td>
                <input class="full" type="text" name="qr" value="<?php echo $line->qr?>"/>
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
