<script type="text/javascript" src="media/js/jquery.validate.min.js"></script>
<script language="javascript">
$(function(){
	$("#frmnewsletter").validate({
	rules: 
	{
		email: 
		{ 
			required: true,
			email: true,
			remote: "newsletters/check_email"
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
	
	$('.inputbox').focus(function(){
		$(this).val("");
	});
});
</script>
<form id="frmnewsletter" name="news_form" method="post" action="newsletters/newsletter_mail_submit">
	<input class="inputbox" type="text" name="email" id="email" value="กรอกอีเมล์เพื่อรับข่าวสาร">															
	<input type="submit" class="bt_send" >
</form>