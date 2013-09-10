<?php
class pollresult extends ORM {
	
	var $table = 'pollresults';
	
	var $has_one = array('poll','polldetail');
	
    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
	
}
?>