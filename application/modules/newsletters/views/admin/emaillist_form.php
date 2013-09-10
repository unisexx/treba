<script type="text/javascript" src="media/js/jquery.validate.min.js"></script>
<script language="javascript">
$(function(){
	$("#mail").validate({
	rules: 
	{
		email: 
		{ 
			required: false,
			email: true,
			remote: "newsletters/admin/newsletters_email_lists/check_email"
		}
	},
	messages:
	{
		email: 
		{ 
			required: "กรุณากรอกอีเมล์ค่ะ",
			email: "กรุณากรอกอีเมล์ให้ถูกต้องค่ะ",
			remote: "อีเมล์นี้ไม่สามารถใช้งานได้"
		}
	}
	});
	
	$('#getmail').live("click",function(){
		$(".loadicon").show();
		$.post('newsletters/admin/newsletters_email_lists/find_email_from_url',{
			'url':$('input[name=url]').val()
		},function(data){
			$('#email').val(data);
			$(".loadicon").hide();
			$('input[name=url]').val("");
		});
	});
	
});
</script>

<h1 style="margin:0 0 15px;">อีเมล์ลงทะเบียนรับข่าวสาร</h1>

<form id='mail' method="post" action="newsletters/admin/newsletters_email_lists/save/<?php echo @$email->id?>" enctype="multipart/form-data">
	<table class="form">
		<tr>
			<th>email-finder :</th>
			<td>
				<form method="post">
				  Please enter full URL of the page to parse (including http://):<br />
				  <input type="text" name="url" size="65" value=""/>
				  <input id="getmail" type="button" value="Parse Emails" /> <span class="loadicon" style="display:none;"><img src="media/images/ajax-loader.gif"></span>
				</form>
			</td>
		</tr>
		<tr>
			<th>อีเมล์ :</th>
			<td>
				<input id="email" type="text" name="email" rel="th" value="<?php echo $email->email ?>" />
			</td>
		</tr>
		<tr>
    		<th>ทีละหลายๆเมล์</th>
            <td>
                <textarea name="email_list" style="width:400px; height:150px;"></textarea> * ขึ้นบรรทัดใหม่เพื่อแยกระหว่างอีเมลล์
            </td>
        </tr>
		<!-- <tr>
			<th>เลือกกลุ่มข่าวสาร :</th>
			<td>
				<?php $grouplist = explode(",", $email->newsletter); ?>

				<?php foreach($categories as $row):?>
				<input id="<?php echo lang_decode($row->name)?>" type="checkbox" name="newsletters[]" value="<?php echo $row->id?>"
					<?php 
					foreach($grouplist as $key=>$value){
						if($grouplist[$key] == $row->id){
							echo"checked";
						}
					}
					?>
				>
				<label for="<?php echo lang_decode($row->name)?>" style="cursor:pointer;"><?php echo lang_decode($row->name)?></label>
				<?php endforeach;?>
			</td>
		</tr> -->
		<tr>	
			<th></th>
			<td>
			<input type="submit" value="บันทึก" class="submit small" />
			<input type="button" value="ย้อนกลับ" class="submit small" onclick="window.location = 'newsletters/admin/newsletters_email_lists'" />
			</td>
		</tr>
	</table>
</form>