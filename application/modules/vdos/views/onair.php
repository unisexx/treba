<div class="well sidebar-nav">
	<h3>ซีรีย์ที่กำลังฉาย</h3>
	<div class="custom">
		<ol class="disc">
		    <?php foreach($categories as $key=>$category):?>
		    	<li><a href="vdos/view/<?=$category->slug?>"><?=$category->name?></a></li>
		    <?php endforeach;?>
		</ol>
	</div>
</div>