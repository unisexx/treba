<?php
class Webboard_quiz extends ORM {

	var $table = 'webboard_quizs';
	
	var $has_one = array('user','webboard_category');
	
	var $has_many = array('webboard_answer','webboard_relate_del','webboard_polldetail','webboard_pollresult');

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>