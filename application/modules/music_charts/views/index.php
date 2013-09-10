<ul class="breadcrumb">
    <li><a href="home">หน้าแรก</a> <span class="divider">/</span></li>
    <li class="active">K-pop Chart</li>
</ul>

<h1>k-pop chart</h1>
<table class="table">
    <tr>
        <th>สัปดาห์ที่</th>
    </tr>
    <?php foreach($chart_categories as $chart_category):?>
        <tr>
            <td><a href="music_charts/week/<?=$chart_category->slug?>"><?=$chart_category->title?></a></td>
        </tr>
    <?php endforeach;?>
</table>
<?=$chart_categories->pagination()?>