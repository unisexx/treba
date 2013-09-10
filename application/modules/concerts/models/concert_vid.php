<?php
class Concert_vid extends ORM {

	var $table = 'concert_vids';
	
	var $has_one = array('concert_category');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>