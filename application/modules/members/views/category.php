<style>
.tbmember{width:100%;border:1px solid green;border-collapse:collapse;}
.tbmember th{background:#78a40f;color:#ffffff;padding: 5px;}
.tbmember td{border:1px solid green;}

</style>
<div class="breadcrumbs"><span class="text_breadcrumbs"><?php echo lang_decode($category->name);?></span></div>
<div id="content">
	<?php foreach($category->member->order_by('id','desc')->get() as $key=>$row):?>
		<table class="tbmember">
			<tr>
				<th>ลำดับ</th>
				<th>ชื่อบริษัท</th>
				<th>REBA 4002-049-001</th>
			</tr>
			<tr>
				<td><?php echo $key+1?></td>
				<td>
					<div><?php echo lang_decode($row->company)?></div>
					<image src="uploads/member/<?php echo $row->image?>" width="200" height="200">
				</td>
				<td>
					<table class="tbdetail">
						<tr>
							<th>ชื่อผู้ประกอบการ</th>
							<td><?php echo lang_decode($row->name)?></td>
						</tr>
						<tr>
							<th>ที่ตั้งสำนักงาน</th>
							<td><?php echo lang_decode($row->address)?></td>
						</tr>
						<tr>
							<th>โทรศัพท์</th>
							<td><?php echo lang_decode($row->tel)?></td>
						</tr>
						<tr>
							<th>โทรสาร</th>
							<td><?php echo lang_decode($row->fax)?></td>
						</tr>
						<tr>
							<th>มือถือ</th>
							<td><?php echo lang_decode($row->mobile)?></td>
						</tr>
						<tr>
							<th>เว็บไซต์</th>
							<td><?php echo lang_decode($row->website)?></td>
						</tr>
						<tr>
							<th>อีเมล์</th>
							<td><?php echo lang_decode($row->email)?></td>
						</tr>
						<tr>
							<th>ประเภท</th>
							<td><?php echo lang_decode($row->record)?></td>
						</tr>
						<tr>
							<th>ประวัติ</th>
							<td><?php echo lang_decode($row->company)?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	<?php endforeach;?>
</div>