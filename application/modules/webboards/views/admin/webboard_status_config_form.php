<div class="block">
<h1>เว็บบอร์ด</h1>
<?php include "_menu.php";?>
<br>
<form method="post" action="webboards/admin/webboard_status_configs/save/1" enctype="multipart/form-data">
	<table class="form">
		<tr>
			<th>สถานะกระดานข่าว :</th>
			<td>
				<?php echo form_dropdown('board_status', array('0'=>'ปิด', '1'=>'เปิด'),$webboard_status_configs->board_status, 'class="text select"'); ?>
			</td>
		</tr>
		<tr>
			<th style="vertical-align:top;">เหตุผลในการปิด :</th>
			<td><textarea name="detail"><?php echo $webboard_status_configs->detail?></textarea></td>
		</tr>
		<!--<tr>
			<th style="vertical-align:top;">กลุ่มต่อไปนี้สามารถเข้าได้ :</th>
			<td>
				<?php foreach($groups as $key => $row):?>
				<div>
				<input id="<?php echo $row->id?>" type="checkbox" name="group_id[]" value="<?php echo $row->id?>"
					<?php foreach($webboard_status_configs->group_id as $group_id):?>
							<?php 
								if($group_id == $row->id){
									echo"checked='checked'";
								}
							?>
					<?php endforeach;?>
				>
				<label for="<?php echo $row->id?>"><?php echo lang_decode($row->name)?></label>
				</div>
				<?php endforeach;?>
			</td>
		</tr>-->
		<!-- <tr>
			<th>ยกเลิกการใช้งานเมื่อสมาชิกทั่วไปไม่ได้เข้าสู่ระบบ :</th>
			<td><input type="text" name="memlock" value="<?php echo $webboard_status_configs->memlock?>"> วัน</td>
		</tr> -->
		<tr>	
			<th></th>
			<td>
			<input type="submit" value="บันทึก" class="submit small" />
			</td>
		</tr>
	</table>
</form>
</div>