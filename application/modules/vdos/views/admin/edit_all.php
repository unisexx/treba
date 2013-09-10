<script type="text/javascript">
$(document).ready(function(){
	$(".getlink").click(function(){
		var $this = $(this);
		$this.next(".loadicon").show();
		$.post('vdos/admin/vdos/findUrlFromExternalPage',{
			'url': $this.closest('tr').find("textarea.url").val()
		},function(data){
		    $this.closest('tr').find(".inputTextArea").val(data);
			$this.next(".loadicon").hide();
		});
	});
	
	
	$(".mainstreamBtn").click(function(){
	    var mainstreamUrl = $(".mainstreamUrl").val();
	    $('textarea.url').each(function(index){
	        var ep = index+1;
	        var fullUrl = mainstreamUrl+'-%E0%B8%95%E0%B8%AD%E0%B8%99%E0%B8%97%E0%B8%B5%E0%B9%88-'+ep;
	        $(this).val(fullUrl);
	    });
	    autoStreamLink();
	});
});

function autoStreamLink(){
    $(".getlink").each(function(){
        var $this = $(this);
        $this.next(".loadicon").show();
        $.post('vdos/admin/vdos/findUrlFromExternalPage',{
            'url': $this.closest('tr').find("textarea.url").val()
        },function(data){
            $this.closest('tr').find(".inputTextArea").val(data);
            $this.next(".loadicon").hide();
        });
    });
}
</script>
<h1>Edit All</h1>
<div class="search">
    <form method="get">
        <table class="form">
            <tr>
                <th>เรื่อง </th>
                <td>
                    <?php echo form_dropdown('category_id',get_option('id','name','categories where module = "vdos" and parents <> 0 order by name asc'),@$_GET['category_id'])?></td><td><input type="submit" value="ค้นหา" />
                </td>
            </tr>
        </table>
    </form>
</div>

<div class="right">
<input style="width: 800px;" type="text" class="mainstreamUrl" value=""> <input class="mainstreamBtn" type="button" value="Mainstream!!!">
</div>

<form action="vdos/admin/vdos/edit_all_save" method="post">
<table class="list">
	<tr>
		<th>ชื่อ</th>
		<th>วิดีโอสคริปท์</th>
		<th>url</th>
	</tr>
	<?php foreach($categories->vdo->order_by('orderlist','asc')->get() as $vdo):?>
		<tr>
			<td><input type="text" name="title[]" value="<?php echo $vdo->title?>"></td>
			<td>
			    <input type="hidden" name="id[]" value="<?php echo $vdo->id?>">
				<textarea class="inputTextArea" name="vdo_script[]" rows="10" cols="50"><?php echo $vdo->vdo_script?></textarea>
			</td>
			<td>
				<textarea rows="10" cols="50" class="url" name="url[]"><?=$vdo->url?></textarea><br>
				<input class="getlink" type="button" value=" Get Link!!! "> <span class="loadicon" style="display:none;"><img src="media/images/ajax-loader.gif"></span>
			</td>
		</tr>
	<?php endforeach;?>
	<tr>
	    <td></td>
	    <td>
	        <?php echo form_referer() ?>
            <input type="submit" value="บันทึก">
	    </td>
	    <td></td>
	</tr>
</table>
</form>