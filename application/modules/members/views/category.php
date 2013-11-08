<style>
.tbmember{width:100%;border:1px solid green;border-collapse:collapse;margin-bottom:15px;}
.tbmember th{background:#78a40f;color:#ffffff;padding: 5px;}
.tbmember td{border:1px solid green;}
.tbdetail td{word-break:break-all;}
</style>
<div class="breadcrumbs"><span class="text_breadcrumbs"><?php echo lang_decode($category->name);?></span></div>
<div id="content">
	<?php foreach($members as $key=>$row):?>
		<table class="tbmember">
			<tr>
				<th>ลำดับ</th>
				<th>ชื่อบริษัท</th>
				<th><?php echo $row->code?></th>
			</tr>
			<tr>
				<td>
				    <div style="text-align: center; font-weight: bold;vertical-align: top;">
				        <?php echo $key+1?>
				    </div>
				</td>
				<td style="text-align: center;">
					<div style="font-weight: bold;"><?php echo lang_decode($row->company)?></div>
					<?php if($row->image != ""):?>
                        <?php // echo thumb("uploads/member/".$row->image,200,false,1);?>
                        <img src="uploads/member/<?php echo $row->image?>" width="200">
                    <?php else:?>
                        <?php // echo thumb("themes/treba/images/company_logo.jpg",200,false,1);?>
                        <img src="themes/treba/images/company_logo.jpg" width="200">
                    <?php endif;?>
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
							<td><?php echo lang_decode($row->category->name)?></td>
						</tr>
						<tr>
							<th>ประวัติ</th>
							<td><?php echo lang_decode($row->record)?></td>
						</tr>
					</table>
				</td>
			</tr>
		</table>
	<?php endforeach;?>
	
	<?php echo $members->pagination()?>
</div>