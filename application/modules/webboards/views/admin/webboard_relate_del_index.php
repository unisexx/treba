<h1>เว็บบอร์ด</h1>
<?php include "_menu.php";?>
<?php echo $webboard_relate_dels->pagination()?>
<table class="list">
	<tr>
		<th>เนื้อหา</th>
		<th>หมายเหตุ</th>
		<th>แจ้งโดย</th>
		<th></th>
	</tr>
	
	<?php foreach($webboard_relate_dels as $row):?>
	<tr <?php echo cycle()?>>
		<td>
			<?php if($row->webboard_answer_id == 0):?>
					<a href="webboards/view_topic/<?php echo $row->webboard_quiz->slug?>/<?php echo $row->webboard_quiz->id?>" target="_blank"><?php echo $row->webboard_quiz->title?></a>
			<?php else:?>
					<?php echo $row->webboard_answer->detail?>
			<?php endif;?>
		</td>
		<td><?php echo $row->reason?></td>
		<td><?php echo $row->user->display?></td>
		<td>
			<a class="btn" href="webboards/admin/webboard_relate_dels/delete/<?php echo $row->id?>" onclick="return confirm('<?php echo lang('confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach;?>
	
</table>
<?php echo $webboard_relate_dels->pagination()?>