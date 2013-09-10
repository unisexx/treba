<script type="text/javascript" src="themes/zulex/js/jquery.validate.min.js"></script>
<script language="javascript">
$(function(){
	$("#frm").validate({
	rules: 
	{
		username: 
		{ 
			required: true
		},
		email: 
		{ 
			required: true,
			email: true
			//remote: "users/check_email"
		},
		password: 
		{
			required: true,
			minlength: 4
		}
	},
	messages:
	{
		username: 
		{ 
			required: "กรุณากรอกชื่อล็อกอิน"
		},
		email: 
		{ 
			required: "กรุณากรอกอีเมล์",
			email: "กรุณากรอกอีเมล์ให้ถูกต้อง"
			//remote: "อีเมล์นี้ไม่สามารถใช้งานได้"
		},
		password: 
		{
			required: "กรุณากรอกรหัสผ่าน",
			minlength: "กรุณากรอกรหัสผ่านอย่างน้อย 4 ตัวอักษร"
		}
	}
	});
});
</script>

<h1>Users</h1>
<form method="post" action="users/admin/users/save/<?php echo $user->id?>" id="frm">
<table class="form tab">
	<tr>
		<th>รูปประจำตัว</th>
		<td><?=thumb(avatar($user->id),120,120,1)?></td>
	</tr>
	<tr>
		<th>อีเมล์ :</th>
		<td><?php echo form_input('email',$user->email,'size="30" id="email"')?></td>
	</tr>
	<tr>
		<th>ชื่อในการล้อกอิน :</th>
		<td><?php echo form_input('username',$user->username,'size="30" id="username"')?></td>
	</tr>
	<tr>
		<th>รหัสผ่านใหม่ :</th>
		<td><?php echo form_input('password',$user->password,'size="30" id="password"')?></td>
	</tr>
    <tr>
		<th></th>
		<td><?php echo form_submit('',lang('btn_submit'))?></td>
	</tr>
</table>
</form>