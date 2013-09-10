<style>
	.perm{margin-right:10px;}
</style>
<script type="text/javascript">
	$(document).ready(function(){
		$("table.list tr:not(:first)").each(function(){
			var btn = "<span style='float:right;'><input class='check' type='button' value='เลือกทั้งหมด'><input class='uncheck' type='button' value='ไม่เลือกทั้งหมด'></span>";
			$(this).find("td:eq(1)").append(btn);
		});
		
		$(".check").live("click",function(){
			$(this).closest("td").find("input[type=checkbox]").attr('checked',true);
		});
		
		$(".uncheck").live("click",function(){
			$(this).closest("td").find("input[type=checkbox]").removeAttr('checked',true);
		})
	});
</script>
<h1>สิทธิ์การใช้งาน</h1>
<form action="permissions/admin/permissions/save" method="post" id="form" class="commentform" enctype="multipart/form-data">
<table class="list">	
<tr>
	<td>สิทธิ์การใช้งาน</td>
	<td><?php echo form_input('name', $user_type->name, 'size="50"'); ?></td>
</tr>
<?php foreach($module as $key => $item): ?>

	<tr>
		<td><?php echo $item['label']; ?></td>
		<td>
			<?php foreach($item['permission'] as $perm): ?>
			<span class="perm"><input id="<?php echo 'checkbox['.$key.']['.$perm.']'; ?>" type="checkbox" name="<?php echo 'checkbox['.$key.']['.$perm.']'; ?>" value="1" <?php echo (@$rs_perm[$key][$perm]) ? 'checked' : ''; ?> ><label for="<?php echo 'checkbox['.$key.']['.$perm.']'; ?>"><?php echo @$crud[$perm]; ?></label></span>
			<?php endforeach; ?>
		</td>
	</tr>
<?php endforeach; ?>
</table>
<br>
<input type="hidden" name="id" value="<?php echo $user_type->id?>">
<div id="boxadd">
  <input  type="submit" value="บันทึก" class="btn_save"/>
  <?php echo form_back() ?>
</div>

</form>