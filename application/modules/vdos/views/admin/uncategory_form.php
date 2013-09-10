<script type="text/javascript">
$(document).ready(function(){
    $("#getlink").click(function(){
        $(".loadicon").show();
        $.post('vdos/admin/vdos/findUrlFromExternalPage',{
            'url': $("textarea[name=geturlPaser]").val()
        },function(data){
            $(".inputTextArea:last").val(data);
            $(".loadicon").hide();
        });
        scrollToBottom();
    });
});
</script>
<h1><a href="vdos/admin/vdos/uncategory">วิดิทัศน์</a> » <?=$vdo->title?></h1>
<div style="width:305px; position: fixed; top: 192px; right: 30px;">
    <textarea name="geturlPaser" style="width:300px; height:100px;"><?=$vdo->url?></textarea><br>
    <input id="getlink" type="button" value=" Get Link!!! "> <span class="loadicon" style="display:none;"><img src="media/images/ajax-loader.gif"></span><br>
    <div id="result"></div>
</div>
<form action="vdos/admin/vdos/uncategory_save" method="post" enctype="multipart/form-data" id="gallery_form">
<table class="form">
	<tr>
		<th>ชื่อ:</th>
		<td><input class="inputTitle" type="text" name="title" value="<?php echo $vdo->title?>"></td>
	</tr>
	<tr>
		<th style="vertical-align: top;">วีดีโอสคริป :</th>
		<td>
			<textarea class="inputTextArea" name="vdo_script" style="width:500px; height: 200px"><?php echo $vdo->vdo_script?></textarea>
			<input type="hidden" name="id" value="<?php echo $vdo->id?>">
		</td>
	</tr>
	<tr>
		<th>หมวดหมู่</th>
		<td>
		<?php //echo form_dropdown('category_id',get_option('id','name','categories where end <> "end"'))?>
			<select name="category_id">
				<?php foreach($categories as $category):?>
					<option value="<?=$category->id?>"><?=$category->name?> [<?=$category->vdo->result_count();?>]</option>
				<?php endforeach;?>
			</select>
		</td>
	</tr>
	<tr>
		<th></th>
		<td>
			<input type="submit" value="บันทึก">
		</td>
	</tr>
</table>
</form>