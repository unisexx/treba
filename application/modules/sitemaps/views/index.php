<link rel="stylesheet" type="text/css" media="screen, print" href="media/css/slickmap/slickmap.css" />
<div class="breadcrumbs"><span class="text_breadcrumbs">แผนผังเว็บไซต์</span></div>
<div id="content" class="sitemap">
    
    <ul id="utilityNav">
        <li><a href="contacts">ตืดต่อเรา</a></li>
        <li><a href="sitemaps">แผนผัง</a></li>
    </ul>
        
    <ul id="primaryNav" class="col4">
        <li id="home"><a href="home">หน้าแรก</a></li>
        <li><a href="bnews">ข่าวสารและกิจกรรม</a></li>
        <li><a href="#">เกี่ยวกับสมาคม</a>
            <ul>
                <?php foreach($abouts as $row):?>
                    <li><a href="abouts/view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></li>
                <?php endforeach;?>
            </ul>
        </li>
        <li><a href="#">เกี่ยวกับสมาชืก</a>
            <ul>
                <?php foreach($categories as $row):?>
                    <li><a href="members/category/<?php echo $row->id?>"><?php echo lang_decode($row->name)?></a></li>
                <?php endforeach;?>
            </ul>
        </li>
        <li><a href="downloads">ดาวน์โหลดเอกสาร</li></a>
    </ul>
</div>