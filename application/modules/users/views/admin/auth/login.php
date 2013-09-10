<div id="frm_login">
	<h1>Login</h1>
	<form method="post" action="users/admin/auth/check_login">
	<table class="form">
		<tr>
			<th>Username</th>
			<td><?php echo form_input('username','','style="width:200px;"')?></td>
		</tr>
		<tr>
			<th>Password</th>
			<td><?php echo form_password('password','','style="width:200px;"')?></td>
		</tr>
		<tr>
			<th></th>
			<td><?php echo form_submit('','Login')?></td>
		</tr>
	</table>
	</form>
</div>