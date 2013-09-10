<link href="media/js/jquery_news_ticker/styles/ticker-style.css" rel="stylesheet" type="text/css" />
<script src="media/js/jquery_news_ticker/includes/jquery.ticker.js" type="text/javascript"></script>
<script type="text/javascript">
$(function () {
    $('#js-news').ticker();
});
</script>

<div class="row">
    <div class="span9">
        <ul id="js-news" class="js-hidden"">
            <?php foreach($tickers as $ticker):?>
                <li class="news-item"><a href="tickers/view/<?=$ticker->id?>"><?=$ticker->title?></a></li>
            <?php endforeach;?>
        </ul>
    </div>
</div>