<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript" src="media/js/jquery.validate.min.js"></script>
<script type="text/javascript">
tiny('detail');
$(function(){
	$("#frmMain").validate({
		rules: 
		{
			"title": 
			{ 
				required: true
			}
		},
		messages:
		{
			"title": 
			{ 
				required: "กรุณากรอกหัวข้อค่ะ"
			}
		}
	});
	$("ul.menu li a:contains(วิชาการและสถิติ)").parent().addClass("active");
	
	$(".delFile").click(function(){
		var answer = confirm ("คุณต้องการลบข้อมูลนี้หรือไม่?");
			if(answer){
				var id = $(this).next("input[type=hidden]").val();
				$.post('stats/admin/stats/delFile',{
					'id':id
				});
				$(this).parent("span").fadeOut();
			}
		return false;
	});
})

function add_file(k)
{
	//เพิ่มไฟล์
	data="<br><input class='fileName' type='text' name='file_name[]' value=''> <input type='text' name='file[]' value=''/><input type='button' name='browse' value='เลือกไฟล์' onclick=browser($(this).prev(),'stat') />";
	$('.attach_file').append(data);
}
</script>
<h1>วิชาการและสถิติ</h1>
<form id="frmMain" action="stats/admin/stats/save/<?php echo $stat->id ?>" method="post" enctype="multipart/form-data" >
	
<table class="form">
	<tr>
		<th>หัวข้อ :</th>
		<td>
			<input type="text" name="title" rel="th" value="<?php echo $stat->title?>" class="full" />
		</td>
	</tr>
	<tr><th>&nbsp;</th><td><input class="addFile" type="button" value="เพิ่มไฟล์แนบ" onclick="add_file()"></td></tr>
	<?php if($stat->id):?>
	<tr>
		<th>&nbsp;</th>
		<td>
			<?php foreach(@$attachs as $attach):?>
				<span class="clDownload">
					<a href="stats/research_download/<?php echo @$attach->id?>"><?=$attach->file_name?></a>
					<a href="#" class="delFile">x</a>
					<input type="hidden" value="<?=@$attach->id?>">
				</span>
			<?php endforeach;?>
		</td>
	</tr>
	<?php endif;?>
	<tr>
		<th>ไฟล์แนบ :</th>
		<td class="attach_file">
			<input class="fileName" type="text" name="file_name[]" value=" ชื่อไฟล์"> 
			<input type="text" name="file[]" value=""/><input type="button" name="browse" value="เลือกไฟล์" onclick="browser($(this).prev(),'stat')" /></td>
	</tr>
	<tr><th>เริ่ม :</th><td><input type="text" name="start_date" value="<?php echo DB2Date(($stat->start_date)?$stat->start_date:date("Y-m-d"))?>" class="datepicker" /></td></tr>
		<tr><th>สิ้นสุด :</th><td><input type="text" name="end_date" value="<?php echo DB2Date($stat->end_date)?>" class="datepicker" /></td></tr>
		<tr>	
	<tr><th></th><td><input type="submit" value="บันทึก" /><?php echo form_back() ?></td></tr>
</table>
<?php echo form_referer() ?>
</form>