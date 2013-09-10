<?php
class Msg extends ORM
{
	public $table = 'msgs';
	public $has_one = array('user');
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>