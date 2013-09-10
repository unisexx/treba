<?php
class Vdo extends ORM {

	var $table = 'vdos';
	
	var $has_one = array('user','category');
    
    var $has_many = array("dead_link");

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>