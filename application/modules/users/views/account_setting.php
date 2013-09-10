<div>
    <h3>แก้ไขข้อมูลส่วนตัว</h3>
    <hr>
    <form class="form-horizontal" method="post" action="users/account_setting_save">
      <div class="control-group">
        <label class="control-label" for="inputImg">รูปโปรไฟล์ :</label>
        <div class="controls">
          <?=thumb(avatar(user_login()->id),120,120,1,"class='img-polaroid' style='margin:0 0 10px 0;'");?>
          <br>
          <input type="text" name="image" id="inputImg" class="input-xxlarge" placeholder="ลิ้งรูปภาพ"  value="<?=$user->image?>">
        </div>
      </div>
      <div class="control-group">
        <label class="control-label" for="inputImg">ลายเซ็น (เว็บบอร์ด) :</label>
        <div class="controls">
            <?php echo uppic_mce();?>
          <textarea name="detail" cols="20" class="editor[pm]"><?php echo $user->signature?></textarea>
        </div>
      </div>
      <div class="control-group">
        <div class="controls">
          <input type="hidden" name="created" value="<?=$user->created?>" >
          <button type="submit" class="btn btn-primary">บันทึก</button>
        </div>
      </div>
    </form>
</div>
