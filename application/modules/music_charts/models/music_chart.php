<?php
class Music_chart extends ORM {

	var $table = 'music_charts';
	
	var $has_one = array('music_chart_category');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>