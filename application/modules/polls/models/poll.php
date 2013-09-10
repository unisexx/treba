<?php
class poll extends ORM {
	
	var $table = 'polls';
	
	var $has_one = array('user');
	
	var $has_many = array('polldetail','pollresult');
	
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
	
}
?>