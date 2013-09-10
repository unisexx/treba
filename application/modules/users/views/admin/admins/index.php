<h1>Administrator</h1>
<table class="list">
	<tr>
		<th>ยูสเซอร์เนม</th>
		<th>ชื่อ - นามสกุล</th>
		<th>อีเมล์</th>
		<th>กลุ่มผู้ใช้งาน</th>
		<th width="100">
			<?php if(permission('administrators', 'create')):?>
				<?php echo anchor('users/admin/administrators/form',lang('btn_add'),'class="btn"')?>
			<?php endif;?>
		</th>
	</tr>
	<?php foreach($users->order_by('id','desc')->get_page() as $user):?>
	<tr <?php echo cycle()?>>
		<td><?php echo $user->username?></td>
		<td><?php echo $user->display?></td>
		<td><?php echo $user->email?></td>
		<td><?php echo $user->user_type->name?></td>
		<td>
			<?php if(permission('administrators', 'update')):?>
				<?php echo anchor('users/admin/administrators/form/'.$user->id,lang('btn_edit'),'class="btn"')?>
			<?php endif;?>
			<?php if(permission('administrators', 'delete')):?>
				<?php echo anchor('users/admin/administrators/delete/'.$user->id,lang('btn_delete'),'class="btn" onclick="return confirm(\''.lang('confirm_delete').'\')"')?>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach?>
</table>
<?php echo $users->pagination()?>
