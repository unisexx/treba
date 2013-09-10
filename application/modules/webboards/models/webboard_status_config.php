<?php
class Webboard_status_config extends ORM {

	var $table = 'webboard_status_configs';
	
	var $has_one = array("user");

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>