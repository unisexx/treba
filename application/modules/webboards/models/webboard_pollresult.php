<?php
class Webboard_pollresult extends ORM {
	
	var $table = 'webboard_pollresults';
	
	var $has_one = array('webboard_quiz','webboard_polldetail');
	
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
	
}
?>