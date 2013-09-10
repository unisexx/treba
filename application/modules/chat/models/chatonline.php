<?php
class Chatonline extends ORM
{
	public $table = 'chatonlines';
	public $has_one = array('user');
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>