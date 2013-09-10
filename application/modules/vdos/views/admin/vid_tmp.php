<h1><a href="vdos/admin/categories">วิดิทัศน์</a> » Vid tmp</h1>
<div class="search">
	<form method="post">
		<table class="form">
			<tr><th>title</th><td><input type="text" name="search" value="<?php echo (isset($_POST['search']))?$_POST['search']:'' ?>" /></td><td><input type="submit" value="ค้นหา" /></td></tr>
		</table>
	</form>
</div>
<?php echo $tmps->pagination()?>
<table class="list">
    <tr>
    	<th>title</th>
        <th>vdo script</th>
        <!-- <th>url</th> -->
        <th width="90"></th>
    </tr>
    
    <?php foreach($tmps as $row): ?>
    <tr id="gallery-list" <?=cycle()?>>
    	<td><?=$row->title?></td>
        <td><textarea rows="10" cols="50"><?=$row->vdo_script?></textarea></td>
        <!-- <td><?=$row->url?></td> -->
        <td>
            <a class="btn" href="vdos/admin/vdos/tmp_delete/<?=$row->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</form>
<?php echo $tmps->pagination()?>