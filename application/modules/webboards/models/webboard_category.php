<?php
class Webboard_category extends ORM {

	var $table = 'webboard_categories';
	
	var $has_many = array("webboard_quiz","webboard_answer");

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>