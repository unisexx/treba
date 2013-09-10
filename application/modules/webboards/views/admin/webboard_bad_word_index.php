<h1>เว็บบอร์ด</h1>
<?php include "_menu.php";?>
<br>
<form id="order" action="webboards/admin/webboard_bad_words/save/1" method="post">
<table class="list">
	<tr>
		<th>คำหยาบ</th>
	</tr>
	<tr>
		<td  style="border-bottom:1px solid #FFF;">
			<textarea name="badword" style="width:250px; height:150px;"><?php echo $webboard_bad_words->badword?></textarea> * ขึ้นบรรทัดใหม่เพื่อแยกระหว่างคำ
		</td>
	</tr>
</table>
<br>
<?php if(permission('webboards', 'update')):?>
<input type="submit" value="บันทึก">
<?php endif;?>
</form>
<hr>
<form id="order" action="webboards/admin/webboard_bad_words/save/2" method="post">
<table class="list">
	<tr>
		<th>ลิ้งค์</th>
	</tr>
	<tr>
		<td  style="border-bottom:1px solid #FFF;">
			<textarea name="badword" style="width:250px; height:150px;"><?php echo $webboard_bad_links->badword?></textarea> * ขึ้นบรรทัดใหม่เพื่อแยกระหว่างลิ้งค์
		</td>
	</tr>
</table>
<br>
<?php if(permission('webboards', 'update')):?>
<input type="submit" value="บันทึก">
<?php endif;?>
</form>