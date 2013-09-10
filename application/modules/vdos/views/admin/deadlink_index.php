<style>
    table{table-layout:fixed;}
    table td{word-wrap:break-word;}
</style>
<script type="text/javascript">
$(document).ready(function(){
    $('#selectAllDomainList').click (function () {
         var checkedStatus = this.checked;
        $('table tbody tr').find('td:first :checkbox').each(function () {
            $(this).attr('checked', checkedStatus);
         });
    });
});
</script>
<h1><a href="vdos/admin/categories">วิดิทัศน์</a> » แจ้งลิ้งค์เสีย</h1>
<div class="search">
    <form method="post">
        <table class="form">
            <tr><th>url</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><td><input type="submit" value="ค้นหา" /></td></tr>
        </table>
    </form>
</div>
<?php echo $deadlinks->pagination()?>
<form method="post" action="vdos/admin/vdos/dead_link_group_delete">
<table class="list">
    <tr>
        <th></th>
    	<th>type</th>
        <th>url</th>
        <th>source</th>
        <th>ip</th>
        <th width="90">
            <a class="btn" href="vdos/admin/vdos/edit_all" target="_blank">แก้ไขทั้งหมด</a>
        </th>
    </tr>
    <tbody>
    <?php foreach($deadlinks as $row): ?>
    <tr id="gallery-list" <?=cycle()?>>
        <td><input type="checkbox" name="chkdel[]" value="<?php echo $row->id?>"></td>
    	<td><?=$row->type?></td>
        <td><a href="<?=$row->url?>" target="_blank"><?=$row->url?></a></td>
        <td><a href="<?=$row->vdo->url?>" target="_blank"><?=$row->vdo->url?></td>
        <td><?=$row->ip?></td>
        <td>
            <?php if($row->type == 'series'):?>
                <a class="btn" href="vdos/admin/vdos/form/<?=$row->vdo->category_id?>/<?=$row->vdo_id?>">แก้ไข</a>
            <?php else:?>
                <a class="btn" href="music_videos/admin/music_videos/form/<?=$row->vdo_id?>">แก้ไข</a>
            <?php endif;?>
            <a class="btn" href="vdos/admin/vdos/dead_link_delete/<?=$row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
        </td>
    </tr>
    <?php endforeach; ?>
    </tbody>
</table>
<input type="checkbox" name="selectAll" id="selectAllDomainList" /> <label for="selectAllDomainList">เลือกทั้งหมด</label>
<input type="submit" value="ลบที่เลือก" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">
</form>
<?php echo $deadlinks->pagination()?>