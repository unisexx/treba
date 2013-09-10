<script>setInterval("ChatUpdate()",5000);</script>
<div id="chat">
	<div class="span9">
		<h2 class="header">เข้ามาคุยกันจ้า</h2>
		<?php echo modules::run('tickers/inc_home'); ?>
		<div class="row">
		    <div class="span6">
		        <div id="chat-msg-box">
		            <ul id="chat-msg-line"></ul>
		        </div>
		    </div>
		    <div class="span3">
		        <div id="chat-user-online-box"><!-- <h3>User Online</h3> --><ul id="chat-user-online"></ul></div>
		    </div>
    	</div>
    
		<div class="row">
		    <div id="chat-tool" class="span9">
		        <div id="chat-tool-frm-login">
		            <form method="post" action="chat/login" id="frm-chat-login" class="form form-inline">
		                <center>
		                <?php if(is_login()):?>
		                    <div class="input-append">
		                      <input type="hidden" name="user_id" value="<?php echo user_login()->id?>" />
		                      <input class="span2" id="appendedInputButton" size="16" type="text" value="<?php echo user_login()->username?>" disabled="true"><button class="btn btn-success" type="submit">Connect!</button>
		                    </div>
		                <?php else:?>
		                    <input type="text" id="inputEmail" name="author" maxlength="20" placeholder="กรอกชื่อเข้าใช้งาน">
		                    <input type="text" id="captcha" name="captcha" placeholder="กรอกรหัสยืนยัน">
		                    <button type="submit" class="btn btn-success">เข้าสนทนา</button>
		                    <img src="users/captcha"/>
		                <?php endif?>
		                </center>
		            </form>
		        </div>
		        <div id="chat-tool-frm-msg">
		            <div id="chat-tool-msg">
		                <div class="row">
		                    <div class="span6">
		                        <form method="post" action="chat/post" id="frm-chat-line">
		                            <div class="input-append">
		                            <input type="text" name="msg" id="input-msg" placeholder="Type message...">
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
    </div>
</div>