<div id="newsevent"><img src="themes/treba/images/title_newsevent.jpg" width="151" height="20" /><a href="bnews"><div class="btn_readAll"></div></a><div class="line2"></div>
            
    <div id="contentNewsEvent" style="padding-top:6px;">
          <ul>
            <?php foreach($bnews as $row):?>
            <li>
                <a href="bnews/view/<?php echo $row->id?>"><img src="uploads/bnew/<?php echo $row->image?>" width="122" height="95" border="0"></a>
                <div class="bnew-detail">
                    <span class="text_topic"><a href="bnews/view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></span><br>
                    <span class="textNews"><?php echo strip_tags(lang_decode($row->detail))?></span>
                </div>
                <span class="dataNew">( <?php echo mysql_to_th($row->created,"F")?> )</span>
            </li>
            <?php endforeach;?>
         </ul>
          
          <div class="btn_more1"><a href="#">&nbsp;</a></div>
      <div class="line1"></div>
      </div>
</div>