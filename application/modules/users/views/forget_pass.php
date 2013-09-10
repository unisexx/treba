<h1>ลืมรหัสผ่าน</h1>
<br>

<div class="row">
    <div class="span9">
        <form id="forget" class="form-horizontal" method="post" action="users/forget_pass_save">
            <div class="control-group">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                  <input type="text" name="email" id="inputEmail" placeholder="Email">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputCaptcha">Captcha</label>
                <div class="controls">
                  <img src="users/captcha" /><Br>
                  <input type="text" name="captcha" id="inputCaptcha" placeholder="Captcha">
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </div>
        </form>
    </div>
</div>