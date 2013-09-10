<div class="well sidebar-nav">
	<h3>ซีรีย์อัพเดทล่าสุด</h3>
	<div class="custom">
		<ol class="disc">
		    <?php foreach($vdos as $key=>$vdo):?>
		    	<li><a href="vdos/series_online/ดูซีรีย์เกาหลี-<?=clean_url($vdo->category->name)?>-<?=$vdo->title?>-ซับไทย-ออนไลน์-<?=$vdo->id?>"><?=$vdo->category->name?> - <?=$vdo->title?></a> 
                <?=(datediff(datetime2date($vdo->created)) == 0)?'<img src="themes/front/images/new11.gif" style="border:0px;" border="0">':'';?></li>
		    <?php endforeach;?>
		</ol>
	</div>
</div>