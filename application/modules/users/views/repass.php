<h1>ลืมรหัสผ่าน</h1>
<br>

<div class="row">
    <div class="span9">
        <form id="repass" class="form-horizontal" method="post" action="users/repass_save">
            <div class="control-group">
                <label class="control-label" for="inputPass">Password</label>
                <div class="controls">
                  <input type="password" name="password" id="inputPass" placeholder="Password">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="re-inputPass">Re Password</label>
                <div class="controls">
                  <input type="password" name="_password" id="re-inputPass" placeholder="Re Password">
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
                  <input type="hidden" name="auth_key" value="<?=$user->auth_key?>">
                  <button type="submit" class="btn btn-primary">ยืนยัน</button>
                </div>
            </div>
        </form>
    </div>
</div>