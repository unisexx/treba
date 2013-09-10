<h1>Profile</h1>
<form method="post" action="users/admin/profiles/save/<?php echo $user->id?>" id="frm">
<table class="form">
	<tr>
		<th>Email :</th>
		<td><?php echo form_input('email',$user->email,'size="30"')?></td>
	</tr>
	<tr>
		<th>Username :</th>
		<td><?php echo form_input('username',$user->username,'size="30"')?></td>
	</tr>
	<tr>
		<th>Password :</th>
		<td><?php echo form_password('password','','size="30"')?></td>
	</tr>
	<tr>
		<th>Confirm Password :</th>
		<td><?php echo form_password('password_2','','size="30"')?></td>
	</tr>
	<tr>
		<th></th>
		<td><?php echo form_submit('',lang('btn_submit'))?></td>
	</tr>
</table>
</form>