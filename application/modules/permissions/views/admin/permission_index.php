<h1>สิทธิ์การใช้งาน</h1>
<table class="list">
	<tr>
		<th>ลำดับ</th>
		<th>สิทธิ์การใช้งาน</th>
		<th width="100">
			<?php if(permission('permissions', 'create')):?>
				<?php echo anchor('permissions/admin/permissions/form',lang('btn_add'),'class="btn"')?>
			<?php endif;?>
		</th>
	</tr>
	<?php foreach($user_types as $key=>$user_type):?>
	<tr <?php echo cycle()?>>
		<td><?php echo $key+1?></td>
		<td><?php echo $user_type->name?></td>
		<td>
			<?php if(permission('permissions', 'update')):?>
			<?php echo anchor('permissions/admin/permissions/form/'.$user_type->id,lang('btn_edit'),'class="btn"')?>
			<?php endif;?>
			<?php if(permission('permissions', 'delete')):?>
			<?php echo anchor('permissions/admin/permissions/delete/'.$user_type->id,lang('btn_delete'),'class="btn" onclick="return confirm(\''.lang('confirm_delete').'\')"')?>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach?>
</table>
<?php echo $user_types->pagination()?>
