<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li><a href="vdos">ซีรีย์เกาหลีซับไทยออนไลน์</a> <span class="divider">/</span></li>
    <li><a href="vdos/view/<?=$vdo->category->slug?>"><?=$vdo->category->name?></a> <span class="divider">/</span></li>
    <li class="active"><?=$vdo->title?></li>
</ul>
<h1><?=$vdo->category->name?> - <span class="muted"><?=$vdo->title?></span></h1>
<?=addThis()?>
<div class="watch_online">
	<div align="center">
	    <?=get_facebook_thumbnail($vdo->category->detail)?>
		<?=get_vdo($vdo->vdo_script)?>
		<br>
        <!-- <div class="right">
            <a href="http://www.kpoplover.com/tickers/view/8" target="_blank"><div class="btn btn-mini">วิธีแก้ปัญหาดู dailymotion แล้วกระตุก หยุด หรือค้าง</div></a>
    		<div id="dead_link" class="btn btn-mini">วิดีโอดูไม่ได้ แจ้งไฟล์เสียคลิกที่นี่จ้า</div> 
		</div> -->
		<a href="http://www.kpoplover.com/tickers/view/8" target="_blank"><div class="alert alert-success">วิธีแก้ปัญหาดู dailymotion แล้วกระตุก หยุด หรือค้าง</div></a>
		<div class="alert alert-success"><strong>สำหรับคนที่ใช้เน็ตทรู และดูซีรีย์จากเว็บ Dailymotion ไม่ได้</strong><p>ให้เข้าไปทำตามลิ้งค์นี้ครับ <a href="http://goo.gl/4CXjCZ" target="_blank">คลิก</a> โดยทำตามขั้นตอนในรูป<br>ตรงข้อสาม ใส่ช่อง address ใส่ว่า proxy.trueinternet.co.th และ Port ใส่ 8080 แล้วติ๊กถูกตรง Bypass Proxy</p></div>
		<div class="alert alert-success">วิดีโอตอนไหนถูกลบไปแล้วให้พิมพ์คอมเม้นที่ด้านล่างทิ้งไว้ได้เลยครับ<br>ถ้าทางเราหาไฟล์มาอัพเดทให้ใหม่แล้วจะแจ้งตอบกลับไปที่คอมเม้นของท่านครับ ^^</div>
		<br clear="all">
	</div>
</div>
<?=fanpage_button();?>
<h2>ดูซีรีย์เรื่อง <?=$vdo->category->name?> ออนไลน์</h2>
        <table class="table table-striped table-bordered table-condensed ep-list">
          <thead>
            <tr>
              <th>ตอนที่</th>
              <th>วิว</th>
              <th>วันที่</th>
            </tr>
          </thead>
          <tbody>
              <?php
                $current_id = $vdo->id;
                $epsode = $vdo->where("category_id = ".$vdo->category->id)->order_by('orderlist','asc')->get();
                foreach($epsode as $ep):
              ?>
                <tr>
                  <td>
                      <span class="label label-info"><a href="vdos/series_online/ดูซีรีย์เกาหลี-<?=clean_url($vdo->category->name)?>-<?=$ep->title?>-ซับไทย-ออนไลน์-<?=$ep->id?>"><?=$ep->title?></a></span>
                      <?php if($current_id == $ep->id):?>
                          <span class="label label-success"> กำลังชม </span>
                      <?php endif;?>
                  </td>
                  <td><?=$ep->counter;?></td>
                  <td><?=$ep->created?></td>
                </tr>
              <?php endforeach;?>
          </tbody>
        </table>
<?php echo modules::run('vdos/related_series'); ?>
<?=facebook_comment();?>
<input id="vdo_id" type="hidden" value="<?=$current_id?>">
<input id="url" type="hidden" value="http://www.kpoplover.com<?=$_SERVER['PATH_INFO']?>">
<input id="type" type="hidden" value="series">
