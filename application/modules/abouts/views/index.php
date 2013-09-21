<style>
.tbmember{width:100%;border:1px solid green;border-collapse:collapse;}
.tbmember th{background:#78a40f;color:#ffffff;padding: 5px;}
.tbmember td{border:1px solid green; padding:5px;}
</style>
<div class="breadcrumbs"><span class="text_breadcrumbs">ดาวน์โหลดเอกสาร</span></div>
<div id="content">
    <table class="tbmember">
        <tr>
            <th>เกี่ยวกับสมาคม</th>
        </tr>
        <?php foreach($abouts as $row):?>
        <tr>
            <td>- <a href="abouts/view/<?php echo $row->id?>"><?php echo lang_decode($row->title)?></a></td>
        </tr>
        <?php endforeach;?>
    </table>
</div>