<h1>สมัครสมาชิก</h1>
<br>

<div class="row">
	<div class="span9">
		<form id="regisform" class="form-horizontal" method="post" action="users/signup">
			<div class="control-group">
				<label class="control-label" for="inputUsername">Username</label>
				<div class="controls">
				  <input type="text" name="username" id="inputUsername" placeholder="Username">
				</div>
			</div>
			<div class="control-group">
				<label class="control-label" for="inputEmail">Email</label>
				<div class="controls">
				  <input type="text" name="email" id="inputEmail" placeholder="Email">
				</div>
			</div>
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
				  <button type="submit" class="btn btn-primary">สมัครสมาชิก</button>
				</div>
			</div>
		</form>
	</div>
</div>