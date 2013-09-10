<div class="social-links">
  <div class="container">
    <div class="row">
      <div class="span12">
        <p class="big"><span>ติดตาม kpoplover บน</span> <a href="https://www.facebook.com/pages/kpoplover/379223069327" target="_blank"><i class="icon-facebook"></i>Facebook</a> <a href="https://twitter.com/kpoplover_th" target="_blank"><i class="icon-twitter"></i>Twitter</a> <a href="https://plus.google.com/110490518219866462892/about"><i class="icon-google-plus"></i>Google Plus</a> <!-- <a href="#"><i class="icon-linkedin"></i>LinkedIn</a> -->
        </p>
      </div>
    </div>    
  </div>
</div>

<footer>
  <div class="container">
    <div class="row">

      <div class="widgets">
        <div class="span6">
          <div class="fwidget">

            <div class="col-l">
              <h6>Kpoplover</h6>
              <ul>
                <li><a href="kpop_news">ข่าวบันเทิงเกาหลี</a></li>
                <li><a href="music_videos">มิวสิควีดีโอเกาหลี</a></li>
                <li><a href="music_charts">ชาร์ตเพลงเกาหลี</a></li>
                <li><a href="concerts">คอนเสิร์ตเกาหลี</a></li>
                <li><a href="vdos">ซีรีย์เกาหลีซับไทยออนไลน์</a></li>
              </ul>
            </div>

            <div class="col-r">
              <h6>เว็บบอร์ด</h6>
              <ul>
                <li><a href="webboards/category/ประกาศวิธีการใช้เว็บบอร์ด">ประกาศ / วิธีการใช้เว็บบอร์ด</a></li>
                <li><a href="webboards/category/แนะนำตัว">แนะนำตัว</a></li>
                <li><a href="webboards/category/ห้องนั่งเล่น">ห้องนั่งเล่น</a></li>
                <li><a href="webboards/category/music-room">เพลงเกาหลี</a></li>
                <li><a href="webboards/category/k-pop-mv">มิวสิควีดีโอเกาหลี</a></li>
                <li><a href="webboards/category/concert">คอนเสิร์ตเกาหลี</a></li>
                <li><a href="webboards/category/lyrics">เนื้อเพลงเกาหลี</a></li>
                <li><a href="webboards/category/series-zone">ซีรีย์เกาหลี</a></li>
                <li><a href="webboards/category/variety-corner">รายการวาไรตี้เกาหลี</a></li>
                <li><a href="webboards/category/gallery">แกลเลอรีภาพศิลปิน</a></li>
              </ul>
            </div>

          </div>
        </div>

        <div class="span6">
          <div class="fwidget">
            <h6>ซีรีย์เกาหลีซับไทยอัพเดทล่าสุด</h6>
            <ul>
              <?php echo modules::run('vdos/inc_footer'); ?>
            </ul>
          </div>
        </div>

        <!-- <div class="span4">
          <div class="fwidget">
            <h6>Recent Posts</h6>
            <ul>
              <li><a href="#">Sed eu leo orci, condimentum gravida metus</a></li>
              <li><a href="#">Etiam at nulla ipsum, in rhoncus purus</a></li>
              <li><a href="#">Fusce vel magna faucibus felis dapibus facilisis</a></li>
              <li><a href="#">Vivamus scelerisque dui in massa</a></li>
              <li><a href="#">Pellentesque eget adipiscing dui semper</a></li>
            </ul>
          </div>
        </div>
      </div> -->

      <div class="span12">
          <div class="copy">
            <section class="copyright">
              <a href="" class="first">Kpoplover</a>
              <span>- Update The Latest KPOP News Music MV Series Variety & Concert at here.</span><br>
              <a href="" class="first"><span>Kpoplover</a> - รวบรวมข่าวสาร ความเคลื่อนไหว บันเทิง เกาหลี kpop เพลง หนัง ดารา แฟชั่น ละคร ซีรี่ย์ นักร้อง <br>ชาร์ตเพลง ศิลปิน มิวสิควีดีโอ วาไรตี้ จากประเทศเกาหลี อัพเดทใหม่ล่าสุด</span>
              <br><a href="" class="first">kpoplover</a> does not host nor upload any files. We only contain links to other sites such as MediaFire.com, 4shared.com, etc.
              <br><a href="" class="first">kpoplover</a> is not responsible for the copyright or legality of the content of other linked sites.
            </section>
          </div>
      </div>
    </div>
  <div class="clearfix"></div>
  </div>
</footer>

<a id="footer-back-to-top" class="WhiteButton badge-back-to-top offscreen">
    <strong>Back to Top</strong>
    <span></span>
</a>


<div id="signin" class="modal hide fade">
    <form id="frm_login" class="form-horizontal" method="post" action="users/login">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>เข้าสู่ระบบ</h3>
    </div>
    <div class="modal-body">
        <div class="alert alert-info">
            <a class="close" data-dismiss="alert">×</a>
            <h4 class="alert-heading">ช้าก่อน!</h4>
                                    ถ้าคุณยังไม่่เป็นสมาชิก... กรุณาสมัครสมาชิกก่อนจ้า!!! <a href="users/register">คลิกที่นี่</a><br>
                                    หรือ ลืมรหัสผ่าน <a href="users/forget_pass">คลิกที่นี่</a>
        </div>
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="inputLogin">User name</label>
                <div class="controls">
                    <input type="text" class="input-xlarge" id="inputLogin" name="username">
                    <span class="muted">(a-Z0-9)</span>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label" for="inputPassword">Password</label>
                <div class="controls">
                    <input type="password" class="input-xlarge" id="inputPassword" name="password">
                    <span class="muted">(a-Z0-9)</span>
                </div>
            </div>
        </fieldset>
    </div>
    <div class="modal-footer">
        <button type="submit" id="login" class="btn btn-primary">เข้าสู่ระบบ</button>
        <a href="#" class="btn" data-dismiss="modal">ปิด</a>
    </div>
    </form>
</div>


<div id="relate" class="modal hide fade">
    <form id="frm_relate" class="form-horizontal" method="post" action="webboards/save_relate">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">×</a>
        <h3>แจ้งลบความเห็น</h3>
    </div>
    <div class="modal-body">
        <fieldset>
            <div class="control-group">
                <label class="control-label" for="inputLogin">เหตุผล</label>
                <div class="controls">
                    <textarea name="reason" rows="3"></textarea>
                    <input type="hidden" name="webboard_quiz_id" value="" >
                    <input type="hidden" name="webboard_answer_id" value="" >
                </div>
            </div>
        </fieldset>
    </div>
    <div class="modal-footer">
        <button type="submit" id="send-relate" class="btn btn-primary">ยืนยัน</button>
        <a href="#" class="btn" data-dismiss="modal">ปิด</a>
    </div>
    </form>
</div>

<div class="feedback-button">
    <a href="contacts" target="_blank">Feedback</a>
</div>

<div id="FBSlideLikeBox_left">
    <div id="FBSlideLikeBox2_left">
		<div id="FBSlideLikeBox3_left">
			<iframe src="http://www.facebook.com/plugins/likebox.php?href=http://www.facebook.com/pages/kpoplover/379223069327&amp;width=292&amp;colorscheme=light&amp;show_faces=true&amp;border_color=ffffff&amp;stream=false&amp;header=false&amp;height=400" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:400px;" allowTransparency="true"></iframe>
		</div>
	</div>
</div>

<div id="FBSlideLikeBox_left2">
    <div id="FBSlideLikeBox2_left2">
        <div id="FBSlideLikeBox3_left2">
            <iframe src="http://www.facebook.com/plugins/likebox.php?href=https://www.facebook.com/pages/LINE-Thailand-Fanclub/619024168129948&amp;width=292&amp;colorscheme=light&amp;show_faces=true&amp;border_color=ffffff&amp;stream=false&amp;header=false&amp;height=400" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:400px;" allowTransparency="true"></iframe>
        </div>
    </div>
</div>