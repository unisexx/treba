<?php

class User_type extends ORM
{
	
	public $table = 'user_types';
	
	public $has_many = array('user','permission');
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
	
}

?>