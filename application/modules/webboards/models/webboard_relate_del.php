<?php

class Webboard_relate_del extends ORM {

	var $table = 'webboard_relate_dels';
	
	var $has_one = array('user','webboard_quiz','webboard_answer');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}

?>