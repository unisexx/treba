<?php foreach($categories as $category):?>
	<select name="" style="width:80%"  onChange="window.open(this.options[this.selectedIndex].value,'_blank')">
		<option value=""><?php echo $category->name;?></option>
		<?php foreach($category->weblink as $weblink):?>
			<option value="<?php echo $weblink->url?>"><?php echo $weblink->title?></option>
		<?php endforeach;?>
	</select>
	<br><br>
<?php endforeach;?>