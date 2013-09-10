<?php
class Permission extends ORM
{
	public $table = "permissions";
	
	public $has_one = array("user_type");
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}

}
?>