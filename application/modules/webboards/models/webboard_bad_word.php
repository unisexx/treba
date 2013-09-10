<?php
class Webboard_bad_word extends ORM {

	var $table = 'webboard_bad_words';
	
	var $has_one = array("user");

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>