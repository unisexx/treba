<?php
class Gallery extends ORM {

	var $table = 'galleries';
	
	var $has_one = array('user','category');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>