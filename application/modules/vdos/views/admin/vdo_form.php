<!-- Load TinyMCE -->
<script type="text/javascript" src="media/tiny_mce/tiny_mce.js"></script>
<script type="text/javascript" src="media/tiny_mce/config.js"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("ul.menu li a:contains(วิดิทัศน์)").parent().addClass("active");
	
	$("#add_img").click(function(){
		var form = $("tr:eq(0),tr:eq(1)").clone();
		form.find("input:text").val("");
		form.find("img").attr("src","themes/tpso1/images/nonpreview.jpg");
		$(".form tr:last").before(form);
		tiny('description');
	});
	
	var formId = '<?php echo $vdos->id?>';
	if(formId){
		$("#add_img").hide();
	}
	
	$("#getlink").click(function(){
	    <?php if($vdos->id == ""):?>
		    addForm();
		    autoFillepisode();
	    <?php endif;?>
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

function scrollToBottom(){
    $("html, body").animate({ scrollTop: $(document).height() }, "slow");
    return false;
}

function addForm(){
    var form = $("tr:eq(0),tr:eq(1)").clone();
    form.find("input:text").val("");
    form.find("img").attr("src","themes/tpso1/images/nonpreview.jpg");
    $(".form tr:last").before(form);
    tiny('description');
}

function autoFillepisode(){
    var episode = $(".inputTitle:last").closest("tr").prev("tr").prev("tr").find(".inputTitle").val();
    if(typeof episode === 'undefined'){
        episode = "EP00";
    }
    var toRemove = 'EP';
    var number = episode.replace(toRemove,'');
    var nextEP = parseInt(number) + 1;
    var newEP = "EP"+nextEP;
        if(newEP.length == 3){
            $(".inputTitle:last").val("EP0"+nextEP);
        }else{
            $(".inputTitle:last").val("EP"+nextEP);
        }
}
</script>

<h1><a href="vdos/admin/categories">วิดิทัศน์</a> » <a href="vdos/admin/vdos/index/<?php echo $categories->id ?>"><?php echo lang_decode($categories->name,'')?></a></h1>
<input id="add_img" type="button" value="เพิ่มรายการ" style="float: left;"> 
<div style="width:305px; position: fixed; top: 300px; right: 30px;">
	<textarea name="geturlPaser" style="width:300px; height:100px;"><?=$vdos->url?></textarea><br>
	<input id="getlink" type="button" value=" Get Link!!! "> <span class="loadicon" style="display:none;"><img src="media/images/ajax-loader.gif"></span><br>
	<div id="result"></div>
</div>
<br clear="all">
<hr>
<form action="vdos/admin/vdos/save" method="post" enctype="multipart/form-data" id="gallery_form">
<table class="form">
	<tr>
		<th>ชื่อ:</th>
		<td><input class="inputTitle" type="text" name="title[]" value="<?php echo $vdos->title?>"></td>
	</tr>
	<tr>
		<th style="vertical-align: top;">วีดีโอสคริป :</th>
		<td>
			<? //echo $vdos->vdo_script."<br>";?>
			<textarea class="inputTextArea" name="vdo_script[]" style="width:500px; height: 100px"><?php echo $vdos->vdo_script?></textarea>
			<input type="hidden" name="id[]" value="<?php echo $vdos->id?>">
		</td>
	</tr>
	<tr>
		<th></th>
		<td>
			<input type="hidden" name="category_id" value="<?php echo $categories->id?>">
			<?php echo form_referer() ?>
			<input type="submit" value="บันทึก">
		</td>
	</tr>
</table>
</form>