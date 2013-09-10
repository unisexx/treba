<?php

class Level extends ORM
{
	
	public $table = 'levels';
	
	public $has_many = array('user');
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
	
}

?>