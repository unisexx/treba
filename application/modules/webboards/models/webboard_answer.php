<?php
class Webboard_answer extends ORM {

	var $table = 'webboard_answers';
	
	var $has_one = array('user','webboard_quiz','webboard_category','webboard_relate_del');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>