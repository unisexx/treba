<ul class="breadcrumb">
  <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
  <li class="active">ติดต่อเรา</li>
</ul>
<div class="contacts">
	<div class="header-bar">
		<h1>ติดต่อเรา</h1>
	</div>
	
	<div class="alert">
                แจ้งปัญหาการใช้งาน แสดงความคิดเห็น แนะนำติชม หรือเสนอไอเดียใหม่ๆ เพื่อเป็นข้อมูลในการพัฒนาเว็บไซต์ในอนาคตต่อไป...
	</div>

	<div style="margin:30px 0 0 0;">
		<form id="contact-frm" class="form-horizontal" method="post" action="contacts/save">
              <!-- <div class="control-group">
                <label class="control-label" for="inputEmail">ชื่อ-นามสกุล :</label>
                <div class="controls">
                  <input type="text" id="inputEmail" name="name">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputEmail">โทรศัพท์ :</label>
                <div class="controls">
                  <input type="text" id="inputEmail" name="telephone">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputEmail">หัวข้อ :</label>
                <div class="controls">
                  <input type="text" id="inputEmail" name="title">
                </div>
              </div> -->
              <div class="control-group">
                <label class="control-label" for="inputDetail">รายละเอียด :</label>
                <div class="controls">
                  <textarea id="inputDetail" name="detail" rows="5" class="input-xlarge"></textarea>
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputEmail">อีเมล์ :</label>
                <div class="controls">
                  <input type="text" class="input-xlarge" id="inputEmail" name="email">
                </div>
              </div>
              <div class="control-group">
                <label class="control-label" for="inputCaptcha">รหัสลับ :</label>
                <div class="controls">
                  <img src="users/captcha" /><Br>
                  <input type="text" class="input-small" name="captcha" id="inputCaptcha" placeholder="กรอกรหัสลับ">
                </div>
            </div>
              <div class="control-group">
                <div class="controls">
                  <button type="submit" class="btn btn-primary">ส่งข้อความ</button>
                </div>
              </div>
		</form>
	</div>
</div>