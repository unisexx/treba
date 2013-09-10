<?php
class polldetail extends ORM {
	
	var $table = 'polldetails';
	
	var $has_one = array('poll');
	
	var $has_many = array('pollresult');
	
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
	
}
?>