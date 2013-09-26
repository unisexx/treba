<style>
.contact-frm{width:100%;border: 1px solid green;}
.contact-frm th{background: #78a40f;color: #ffffff;padding: 5px;}
</style>
<div class="breadcrumbs"><span class="text_breadcrumbs"><?php echo lang_decode($contact->title);?></span></div>
<div id="content">
	<?php echo lang_decode($contact->detail)?>
	
	<div style="margin:30px 0 0 0;">
		<form id="contact-frm" class="form-horizontal" method="post" action="contacts/save">
			<table class="contact-frm">
			    <tr>
                    <th>หัวข้อ :</th>
                    <td><input type="text" name="title" style="width:440px;"></td>
                </tr>
				<tr>
					<th>รายละเอียด :</th>
					<td><textarea id="inputDetail" name="detail" rows="5" cols="70" class="input-xlarge"></textarea></td>
				</tr>
				<tr>
					<th>อีเมล์  :</th>
					<td><input type="text" class="input-xlarge" id="inputEmail" name="email" style="width:440px;"></td>
				</tr>
				<!-- <tr>
					<th>รหัสลับ :</th>
					<td>
						<img src="users/captcha" /><Br>
                  		<input type="text" class="input-small" name="captcha" id="inputCaptcha" placeholder="กรอกรหัสลับ" style="width:100px;">
					</td>
				</tr> -->
				<tr>
					<th></th>
					<td><input type="submit" value="ส่งช้อความ"></td>
				</tr>
			</table>
		</form>
	</div>	
</div>