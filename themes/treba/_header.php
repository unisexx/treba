<div class="logo"></div>
            <div class="clr"></div>
              <div id="menuleft">
                <ul>
                    <li><a href="abouts"><img src="<?php echo lang('menuleft_aboutus');?>" width="190" height="29" border="0"></a></li>
                    <li><a href="downloads"><img src="<?php echo lang('menuleft_register');?>" width="190" height="29" border="0"></a></li>
                    <li><a href="downloads/download/1"><img src="<?php echo lang('menuleft_member');?>" width="190" height="29" border="0"></a></li>
                </ul>
              </div>
              <div class="contact"><a href="#"><img src="<?php echo lang('btn_contact2');?>" width="219" height="99" border="0"></a></div>
</div>
           
            <div class="flag">
                <ul>
                    <li><a href="home/lang/th" title="ภาษาไทย"><img src="themes/treba/images/flag_thai.png" width="26" height="20" border="0"></a></li>
                    <li><a href="home/lang/en" title="English"><img src="themes/treba/images/flag_eng.png" width="26" height="20" border="0"></a></li>
                    <li><a href="https://www.facebook.com/pages/สมาคมนายหน้าอสังหาริมทรัพย์/185279518166176?fref=ts" title="Facebook" target="_blank"><img src="themes/treba/images/icon_FB.png" width="20" height="20" border="0"></a></li>
                </ul>
            </div>
            

        
        <div id="col2">
            <div id="menu_gray">
                <ul>
                    <li><a href="contacts"><img src="<?php echo lang('btn_contact');?>" width="92" height="17" border="0"></a></li>
                    <li><a href="sitemaps"><img src="<?php echo lang('btn_sitemap');?>" width="92" height="17" border="0"></a></li>
                </ul>
            </div>
             <div id="topmenu">
            <ul>
                <li class="<?php echo lang('topmenu1');?>"><a href="home">&nbsp;</a></li>
                <li class="<?php echo lang('topmenu2');?>"><a href="bnews">&nbsp;</a></li>
                <li class="<?php echo lang('topmenu3');?>"><a href="#">&nbsp;</a>
                    <?php echo modules::run('abouts/inc_header'); ?>
                </li>
                <li class="<?php echo lang('topmenu4');?>"><a href="#">&nbsp;</a>
                    <?php echo modules::run('members/inc_header'); ?>
                </li>
                <li class="<?php echo lang('topmenu5');?>"><a href="downloads">&nbsp;</a></li>
            </ul>
        </div>
        
        <?php echo modules::run('hilights/inc_home'); ?>
        </div>
        <div class="clr"></div>