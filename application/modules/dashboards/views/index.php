<div id="dashboard">
<h1>ภาพรวมของผู้เข้าชม</h1>
<div class="search">
	<form method="get">
		แสดงรายการย้อนหลัง 30 วันนับถอยหลังจาก <input class="datepicker" type="text" name="date" value="<?php echo @$_GET['date'] ?>" /> <input type="submit" value="ตกลง" />
	</form>
</div>
<img src="http://chart.apis.google.com/chart?
chs=1000x200
&amp;chg=22,30&amp;chd=t:<?
$i=0;
$max=0;
$min=100000;
foreach($visits as $v){
	if($i>0)echo ",";
	if($v['ga:visits']>$max)$max=$v['ga:visits'];
	if($v['ga:visits']<$min)$min=$v['ga:visits'];
	echo $v['ga:visits'];
	$i++;
}
$max=$max+5;
$min=$min-5;
?>
&amp;chl=<?
$i=0;
foreach($visits as $v){
	if($i>0)echo "|";
	$tmp=null;
	$tmp[]=substr($v['ga:date'], -2);
	$tmp[]=substr($v['ga:date'], -4,2);
	//echo $v['ga:date'];
	echo "$tmp[0]/$tmp[1]";
	$i++;
}
?>
&amp;chxr=1,<?= $min ?>,<?= $max ?>
&amp;chds=<?= $min ?>,<?= $max ?>
&amp;chm=o,0066FF,0,-1.0,6|N,0066FF,0,-1.0,11
&amp;chxt=x,y
&amp;cht=lc
" />
<div class="clear"></div>

<div style="width:50%; float:left">
<div style="padding:0 5px; 0 0">
<h1>การใช้งานไซต์</h1>
<table class="form">
<tr><th>visits</th><td><?= $summery['ga:visits'] ?></td></tr>
<tr><th>unique visitors</th><td><?= $summery['ga:visitors'] ?></td></tr>
<tr><th>pageviews</th><td><?= $summery['ga:pageviews'] ?></td></tr>
<tr><th>time on site</th><td><?= floor(($summery['ga:timeOnSite']/$summery['ga:visits'])/60) . ":" . ($summery['ga:timeOnSite']/$summery['ga:visits']) % 60 ?></td></tr>
<tr><th>new visits</th><td><?= ceil(($summery['ga:newVisits']/$summery['ga:visits'])*100) ?> %</td></tr>
<tr><th>bounce rate</th><td><?= ceil(($summery['ga:bounces']/$summery['ga:entrances'])*100)?> %</td></tr>
</table>
</div>
</div>
<div style="width:50%; float:left">
<div style="padding:0 0 0 5px;">
<h1>สถิติผู้เข้าชมทั้งหมด</h1>
<table class="form">
<tr><th>visits</th><td><?= $allTimeSummery['ga:visits'] ?></td></tr>
<tr><th>pageviews</th><td><?= $allTimeSummery['ga:pageviews'] ?></td></tr>
</table>
</div>
</div>
<div class="clear"></div>

<div style="width:50%; float:left">
<div style="padding:0 5px; 0 0">
<h1>ประเทศที่เข้าชมสูงสุด 10 อันดับ</h1>
<table class="form">
<? foreach($topCountries as $country){ ?>
<tr><th><?= $country['ga:country'] ?></th><td><?= $country['ga:visits'] ?></td></tr>
<? } ?>
</table>
</div>
</div>
<div style="width:50%; float:left">
<div style="padding:0 0 0 5px;">
<h1>คำค้นยอดนิยม</h1>
<table class="form">
<? foreach($topKeywords as $keyword){ ?>
<tr><th><?= $keyword['ga:keyword'] ?></th><td><?= $keyword['ga:visits'] ?></td></tr>
<? } ?>
</table>
</div>
</div>
<div class="clear"></div>

<div style="width:50%; float:left">
<div style="padding:0 5px; 0 0">
<h1>ภาพรวมของแหล่งที่มาของการเข้าชม</h1>
<table class="form">
<? foreach($topReferrer as $ref){ ?>
<tr><th><div><?= $ref['ga:source'] ?></div></th><td><?= $ref['ga:visits'] ?></td></tr>
<? } ?>
</table>
</div>
</div>
<div style="width:50%; float:left">
<div style="padding:0 0 0 5px;">
<h1>เนื้อหายอดนิยม</h1>
<table class="form">
<? foreach($topPages as $page){ ?>
<tr><th><div><?= $page['ga:pagePath'] ?></div></th><td><?= $page['ga:visits'] ?></td></tr>
<? } ?>
</table>
</div>
</div>
<div class="clear"></div>



<div style="width:50%; float:left">
<div style="padding:0 5px; 0 0">

<h1>OS ยอดนิยม</h1>
<img src="http://chart.apis.google.com/chart?
chs=370x160
&amp;chd=t:<?
$i=0;
foreach($topOs as $os){
	if($i>0)echo ",";
	echo $os['ga:visits'];
	$i++;
}
?>
&amp;chl=<?
$i=0;
foreach($topOs as $os){
	if($i>0)echo "|";
	echo $os['ga:operatingSystem'];
	$i++;
}
?>
&amp;cht=p3
" />
</div>
</div>


<div style="width:50%; float:left">
<div style="padding:0 0 0 5px;">





<h1>Browser ยอดนิยม</h1>
<img src="http://chart.apis.google.com/chart?
chs=370x160
&amp;chd=t:<?
$i=0;
foreach($topBrowsers as $browser){
	if($i>0)echo ",";
	echo $browser['ga:visits'];
	$i++;
}
?>
&amp;chl=<?
$i=0;
foreach($topBrowsers as $browser){
	if($i>0)echo "|";
	echo $browser['ga:browser'];
	$i++;
}
?>
&amp;cht=p3
" />

</div>
</div>
<div class="clear"></div>

</div>