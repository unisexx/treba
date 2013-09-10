<ul class="breadcrumb">
    <li><a href="home">Home</a> <span class="divider">/</span></li>
    <li><a href="pages">Help</a> <span class="divider">/</span></li>
    <li class="active"><a href="pages/view/<?=$page->id?>"><?=$page->title?></a></li>
</ul>
<h1><?=$page->title?></h1>
<?=addThis()?>
    <div class="newcontent">
        <?=$page->detail?>
    </div>
<?=disqus_comment();?>