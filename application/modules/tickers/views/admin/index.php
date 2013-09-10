<h1>Ticker</h1>

<?php echo $tickers->pagination()?>
<form id="order" action="tickers/admin/tickers/save_orderlist" method="post">
<table class="list">
	<tr>
		<th width="70">แสดง</th>
		<th>ลำดับที่</th>
		<th>หัวข้อ</th>
		<th>อ่าน</th>
		<th width="90">
			<a class="btn" href="tickers/admin/tickers/form">เพิ่มรายการ</a>
		</th>
	</tr>
	<?php foreach($tickers as $ticker): ?>
	<tr <?php echo cycle()?>>
		<td><input type="checkbox" name="status" value="<?php echo $ticker->id ?>" <?php echo ($ticker->status=="approve")?'checked="checked"':'' ?> /></td>
		<td>
			<input type="text" name="orderlist[]" size="3" value="<?php echo $ticker->orderlist?>">
			<input type="hidden" name="orderid[]" value="<?php echo $ticker->id ?>">
		</td>
		<td><?php echo lang_decode($ticker->title)?></td>
		<td><?=$ticker->counter?></td>
		<td>
			<a class="btn" href="tickers/admin/tickers/form/<?php echo $ticker->id?>" >แก้ไข</a> 
			<a class="btn" href="tickers/admin/tickers/delete/<?php echo $ticker->id?>" onclick="return confirm('<?php echo lang('notice_confirm_delete');?>')">ลบ</a>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<input type="submit" value="บันทึก">	
</form>
<?php echo $tickers->pagination()?>