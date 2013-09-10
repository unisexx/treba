<?php
class Webboard_polldetail extends ORM {
	
	var $table = 'webboard_polldetails';
	
	var $has_one = array('webboard_quiz');
	
	var $has_many = array('webboard_pollresult');
	
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
	
}
?>