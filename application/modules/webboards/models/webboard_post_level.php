<?php
class Webboard_post_level extends ORM {

	var $table = 'webboard_post_levels';
	
	var $has_one = array("user");

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>