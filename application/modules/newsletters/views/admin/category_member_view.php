<h1><a href="newsletters/admin/categories/member_index">สมาชิกในกลุ่มข่าว</a> » <?php echo lang_decode($category->name,'')?></h1>
<?php include "_menu.php";?>
<?php echo $users->pagination()?>
<table class="list">
	<tr>
		<th>ยูสเซอร์เนม</th>
		<th>ชื่อ-นามสกุล</th>
		<th>ระดับ</th>
	</tr>
	<?php foreach($users as $user): ?>
		<tr <?php echo cycle()?>>
			<td><?php echo $user->username?></td>
			<td><?php echo $user->profile->first_name.' '.$user->profile->last_name?></td>
			<td><?php echo $user->level->level?></td>
		</tr>
	<?php endforeach; ?>
</table>
<?php echo $users->pagination()?>