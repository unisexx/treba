<style>
#chat-msg-box{overflow-y:scroll;height:505px;background:#fbfbfb;border:1px solid #ccc;overflow-x:hidden;}
#chat-user-online-box{height:487px;background:#eee;display:block;padding:10px;overflow:auto;overflow-x:hidden;}
#chat-user-online-box ul{padding:0;margin:0;}
#chat-user-online-box h2{color:#ff972f;}
#chat-user-online li{padding:5px 0;border-top:1px dotted #ddd; list-style:none;}
#chat-user-online li.online-user-total{font-size:12px;color:#999;text-align:left;}
#chat-user-online li .online-user-image{float:left;width:32px;}
#chat-user-online li .online-user-image img{width:100%;}
#chat-user-online li .online-user-name{float:right;width:80%;padding-top:8px;font-size:13px;color:#888;}
#chat-msg-line{padding:0 10px; margin:0;}
#chat-msg-line li{margin:0;padding:10px;border-top:1px dotted #ddd; list-style:none;}
#chat-tool{padding:10px 0 0 0;background:#f3f3f3;margin-top:10px;border:1px dotted #ddd;}
#chat-tool-info {padding:5px;background:#dfdfdf;border:1px solid #ddd;text-align:center;}
#chat-tool-emoticon{padding:5px 0 5px 10px;background:#fff;border:1px solid #ddd;width:575px;}
#chat-tool-emoticon a{margin:0 15px 0 0;}
#chat-tool-frm-login,#chat-tool-frm-msg{display:none;}
#frm-chat-line{margin:0;padding:0;}
#send-button{height: 30px;}
.chat-line-image{float:left; margin:0 10px 0 0;}
.chat-line-content p{margin:0;padding:0;}
.chat-line-content-display{color:#0080c0;height:19px;display:inline-block;}
.chat-line-content-date{font-size:11px;color:#999;}
</style>
<script type="text/javascript" src="media/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="media/js/utilities.js"></script>
<script>
	
	ChatUpdate();
	setInterval("ChatUpdate()",5000); 
	
	$(function(){
		
		var loginValidate = $("#frm-chat-login").validate({
			rules: 
			{
				author: { required: true, remote: "chat/check_author_exit" },
				captcha: { required: true, remote: "users/check_captcha" }
			},
			messages:
			{
				author: { required: "กรุณากรอกชื่อค่ะ", remote: "ชื่อนี้ไม่สามารถใช้งานได้" },
				captcha: { required: "กรุณากรอกตัวอักษรตัวที่เห็นในภาพค่ะ", remote: "กรุณากรอกตัวอักษรให้ตรงกับภาพค่ะ" }
			},
			 submitHandler: function(form){$.post('chat/login',$(form).serialize(),ChatUpdate)}
		});

		
		// Post message
		$('#frm-chat-line').submit(function(){
			if ($('#input-msg').val()) {  
				$.post('chat/post', $(this).serialize(),ChatUpdate);
				$('#input-msg').val('');
			}
			return false;
		});
		
		// Chat logout
		$('#chat-btn-logout').click(function(){
			$.get('chat/logout', ChatUpdate);
			return false;
		});
		
	}); 
	
	function ChatUpdate()
	{
		// Check user status
		$.get('chat/status',function(status){
			if(status == true){
				$('#chat-tool-frm-msg').show();
				$('#chat-tool-frm-login').hide();
			}else{
				$('#chat-tool-frm-login').show();
				$('#chat-tool-frm-msg').hide();
			}	
		});
		
		// Check user online
		$.get('chat/online',function(online){
			$('#chat-user-online').html(online);
		});
		
		// Update message
		$.get('chat/update/' + $('#chat-msg-line li:last').attr('rel'),function(data){
			if(data){		
				$('#chat-msg-line').html(data);
				$('#chat-msg-box').animate({scrollTop: $('#chat-msg-line').height()}, 2000);					
			}
		});
	} 
	
	function ChatInsertEmoticon(bbcode)
	{
		$('#input-msg').insertAtCaret(bbcode);
		return false;
	}
</script>


<h1>Online Chat</h1>
	
<div class="row">
	<div class="span6">
		<div id="chat-msg-box">
			<ul id="chat-msg-line"></ul>
		</div>
	</div>
	<div class="span3">
		<div id="chat-user-online-box"><h3>User Online</h3><ul id="chat-user-online"></ul></div>
	</div>
	
	<br clear="all">
	<div id="chat-tool" class="span9">
		<div id="chat-tool-frm-login">
			<form method="post" action="chat/login" id="frm-chat-login" class="form form-horizontal">
				<?php if(is_login()):?>
				<div class="input-append">
                  <input type="hidden" name="user_id" value="<?php echo user_login()->id?>" />
                  <input class="span2" id="appendedInputButton" size="16" type="text" value="<?php echo user_login()->display?>" disabled="true"><button class="btn btn-success" type="submit">Connect!</button>
                </div>
				<?php else:?>
				<div class="control-group">
				    <label class="control-label" for="inputEmail">ชื่อ :</label>
				    <div class="controls">
				      <input type="text" id="inputEmail" name="author" maxlength="20" placeholder="กรอกชื่อเข้าใช้งาน">
				    </div>
				</div>
				<div class="control-group">
				    <label class="control-label" for="captcha">รหัสยืนยัน :</label>
				    <div class="controls">
                        <img src="users/captcha" /><br>
                        <input type="text" id="captcha" name="captcha" placeholder="กรอกรหัสยืนยัน">
				    </div>
				</div>
                <div class="control-group">
                    <div class="controls">
                        <button type="submit" class="btn btn-success">เข้าสนทนา</button>
                    </div>
                </div>
				<?php endif?>
			</form>
		</div>
		<div id="chat-tool-frm-msg">
			<div id="chat-tool-msg">
			    <div class="row">
			        <div class="span6">
			            <form method="post" action="chat/post" id="frm-chat-line">
			                <div class="input-append" style="text-align:center;">
                            <input type="text" name="msg" id="input-msg" class="input-xxlarge" placeholder="Type message...">
                            <button id="send-button" class="btn btn-primary" type="submit"><i class="icon-chevron-right icon-white"></i></button>
                            </div>
                        </form>
                        <div id="chat-tool-emoticon">
                            <?php echo Modules::run('chat/emoticon_list')?>
                        </div>
			        </div>
			        <div class="span3">
			            <div id="chat-tool-info">
                            <input type="button" id="chat-btn-logout" class="btn btn-danger" value="ออกจากห้องสนทนา">
                        </div>
			        </div>
			    </div>
			</div>

			<div class="clear"></div>
		</div>
	</div>
</div>
		