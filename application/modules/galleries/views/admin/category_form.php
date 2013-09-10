<script type="text/javascript" src="media/js/jquery.validate.min.js"></script>
<script type="text/javascript">
	$(function(){
			$("#frmMain").validate({
				rules: 
				{
					"name": 
					{ 
							required: true
					}
				},
				messages:
				{
					"name": 
					{ 
							required: "กรุณากรอกหัวข้อค่ะ"
					}
				}
			});		
	})
</script>
<h1 style="margin:0 0 15px;">อัลบั้ม</h1>
<form id="frmMain" method="post" action="galleries/admin/categories/save/<?php echo $category->id?>" enctype="multipart/form-data">
	<table class="form">
		<tr>
			<th>ชื่ออัลบั้ม :</th>
			<td>
				<input type="text" name="name" rel="th" value="<?php echo $category->name?>" />
				
			</td>
		</tr>
		<tr>
		<th>แสดงอัลบัม :</th>
			<td>
				<input type="checkbox" name="index_show" value="yes" <?php echo ($category->index_show == "yes")?"checked":"";?>> หน้าแรก
				<input type="checkbox" name="tumbon_show" value="yes" <?php echo ($category->tumbon_show == "yes")?"checked":"";?>> ตำบลต้นแบบ
				<input type="checkbox" name="pormor_show" value="yes" <?php echo ($category->pormor_show == "yes")?"checked":"";?>> เครือข่าย พม.
				<input type="checkbox" name="stat_show" value="yes" <?php echo ($category->stat_show == "yes")?"checked":"";?>> วิชาการและสถิติ
			</td>
		</tr>
		<tr>	
			<th></th>
			<td>
			<input type="hidden" name="parents" value="<?php echo $parent->id ?>"  />
			<input type="hidden" name="module" value="<?php echo $parent->module ?>"  />
			<tr><th>เริ่ม :</th><td><input type="text" name="start_date" value="<?php echo DB2Date(($parent->start_date)?$parent->start_date:date("Y-m-d"))?>" class="datepicker" /></td></tr>
	<tr><th>สิ้นสุด :</th><td><input type="text" name="end_date" value="<?php echo DB2Date($parent->end_date)?>" class="datepicker" /></td>
			<tr><td><input type="submit" value="บันทึก" class="submit small" /></td></tr>
		</tr>
	</table>
</form>
