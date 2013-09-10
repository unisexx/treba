<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </a>
          <a class="brand" href="http://www.kpoplover.com" title="อัพเดทข่าวเกาหลี เพลงเกาหลี ซีรีย์เกาหลีใหม่ล่าสุด - Kpoplover">Kpoplover Online</a>
          <div class="nav-collapse collapse">
            <ul class="nav">
              <li class="active"><a href="">Home</a></li>
              <li><a href="kpop_news">News</a></li>
              <li><a href="music_videos">MV</a></li>
              <li><a href="music_charts">Chart</a></li>
              <li><a href="concerts">Concert</a></li>
              <li><a href="vdos">Series</a></li>
              <li><a href="webboards">Webboard</a></li>
            </ul>
            <ul class="nav pull-right">
            <?php if(is_login()):?>
            	<li><?=thumb(avatar(user_login()->id),20,20,1,"style='margin-top:10px;'")?></li>
                <li><a rel="tooltip" data-placement="bottom" href="users/account_setting" data-original-title="แก้ไขข้อมูล"><?php echo user_login()->username ?></a></li>
                <li><a href="users/logout" rel="tooltip" data-placement="bottom" data-original-title="ออกจากระบบ">logout</a></li>
            <?php else:?>
                <li><a href="users/register"> สมัครสมาชิก</a></li>
                <li><a data-toggle="modal" href='#signin'>ล็อกอิน</a></li>
                <li><img src="themes/front/images/facebook-login-button.png" alt="ล็อกอินผ่านทางเฟสบุค" onclick="Login()" style="margin-top: 8px;"></li>
            <?php endif;?>
            </ul>
          </div>
        </div>
      </div>
	<div class="rainbowDash"></div>
</div>

<header>
<div class="container header-blk">
	<div class="row">
	    <div class="alert alert-block span12" style="background-color:#fff;border:2px dotted red; padding-top:0px;padding-bottom:0px;">
            <a href="https://www.facebook.com/pages/LINE-Thailand-Fanclub/619024168129948" target="_blank" style="color:#000; text-shadow: 0 0 0.2em #8F7"><h3 style="text-align: center; background: yellow;">LINE Thailand Fanclub แจกสติ๊กเกอร์ไลน์ฟรีจ้า!!!</h3></a>
        </div>
        <div class="span2">
            <a href="http://www.kpoplover.com" title="อัพเดทข่าวเกาหลี เพลงเกาหลี ซีรีย์เกาหลีใหม่ล่าสุด - Kpoplover">Kpoplover Online</a>
        </div>
        <div class="span10">
            <div class="pull-left">
                <?php echo modules::run('banners/inc_top');?>
            </div>
            <div class="social-blk">
                
                <!-- <?php if(is_login()):?>
                <div class="btn-group">
				  <a class="btn btn-small dropdown-toggle" data-toggle="dropdown" href="#">
				    <?=thumb(avatar(user_login()->id),20,20,1,"")?> <?php echo user_login()->username ?>
				    <span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu">
				    <li><a href="users/account_setting">แก้ไขข้อมูล</a></li>
                	<li><a href="users/logout">ออกจากระบบ</a></li>
				  </ul>
				</div>
				<?php else:?>
				    <a data-toggle="modal" href='#signin'>ล็อกอิน</a> | <a href="users/register"> สมัครสมาชิก</a>
				<div class="btn-group">
				  <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
					Member
				    <span class="caret"></span>
				  </a>
				  <ul class="dropdown-menu">
				    <li><a data-toggle="modal" href='#signin'>ล็อกอิน</a></li>
	                <li><a href="users/register"> สมัครสมาชิก</a></li>
				  </ul>
				</div>
	            <?php endif;?> -->
            </div>
            <div class="span4 pull-right" style="width:292px; margin-top: 5px;">
                <gcse:searchbox-only></gcse:searchbox-only>
            </div>
        </div>
    </div>
</div>
</header>

<div class="container">
<div class="navbar">
  <div class="navbar-inner">
  	<div class="container">
    <ul class="nav">
      <li><a href="">หน้าแรก</a></li>
      <li class="divider-vertical"></li>
      <li><a href="kpop_news">ข่าว</a></li>
      <li class="divider-vertical"></li>
      <li><a href="music_videos">มิวสิควีดีโอ</a></li>
      <li class="divider-vertical"></li>
      <li><a href="music_charts">ชาร์ตเพลง</a></li>
      <li class="divider-vertical"></li>
      <li><a href="concerts">คอนเสิร์ต</a></li>
      <li class="divider-vertical"></li>
      <li><a href="vdos">ซีรีย์</a></li>
      <li class="divider-vertical"></li>
      <li><a href="webboards">เว็บบอร์ด</a></li>
    </ul>
    </div>
  </div>
</div>
</div>