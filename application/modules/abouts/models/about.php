<?php
class About extends ORM
{
	public $table = 'abouts';
	
	public $has_one = array('user');
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
	
}
?>