<div class="ticker span9">
    <span><i class="icon-bullhorn"></i></span>
    <ul class="newTicker unstyled">
        <?php foreach($tickers as $ticker):?>
            <?php if($ticker->url):?>
            <li><a href="<?php echo $ticker->url?>" target="_blank"><?=$ticker->title?></a></li>
            <?php else:?>
            <li><a href="tickers/view/<?=$ticker->id?>"><?=$ticker->title?></a></li>
            <?php endif;?>
        <?php endforeach;?>
    </ul>
</div>