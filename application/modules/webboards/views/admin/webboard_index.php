<h1>เว็บบอร์ด</h1>
<?php include "_menu.php";?>
<br>
<div class="search">
<form name="topic_sort" method="get">
	ค้นหาตามหมวดหมู่ : 
	<?php echo form_dropdown('webboard_category_id',get_option('id','name','webboard_categories','order by orderlist asc'),@$_POST['webboard_category_id'],'','ทั้งหมด');?>
	<input type="submit" value="ค้นหา"></form>
</div>
<?php echo $webboard_quizs->pagination()?>
<table class="list" id="weblinks-list">
	<tr>
		<th>หัวข้อ</th>
		<th>เข้าชม</th>
		<th>ตอบ</th>
		<th>โดย</th>
		<th>หมวดหมู่</th>
		<th width="95">
			<?php if(permission('webboards', 'create')):?>
			<a class="btn" href="webboards/admin/webboard_quizs/form">ตั้งกระทู้ใหม่</a>
			<?php endif;?>
		</th>
	</tr>
	
	<?php foreach ($webboard_quizs as $webboard_quiz):?>
	<tr <?php echo cycle()?>>
		<td><?php echo $webboard_quiz->title ?></td>
		<td><?php echo $webboard_quiz->counter ?></td>
		<td><?php echo $webboard_quiz->webboard_answer->result_count() ?></td>
		<td><?php echo $webboard_quiz->user->display ?></td>
		<td><?php echo $webboard_quiz->webboard_category->name ?></td>
		<td>
			<?php if(permission('webboards', 'update')):?>
			<a class="btn" href="webboards/admin/webboard_quizs/form/<?php echo $webboard_quiz->id?>" >แก้ไข</a> 
			<?php endif;?>
			<?php if(permission('webboards', 'delete')):?>
			<a class="btn" href="webboards/admin/webboard_quizs/delete/<?php echo $webboard_quiz->id?>" onclick="return confirm('<?php echo lang('confirm_delete');?>')">ลบ</a>
			<?php endif;?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<?php echo $webboard_quizs->pagination()?>