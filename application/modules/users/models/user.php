<?php
class User extends ORM
{
	public $table = "users";
	
	public $has_one = array("level","user_type","chatonline");
	
	public $has_many = array("category","msg","coverpage","weblink","webboard_relate_del","webboard_quiz","webboard_answer","pm","vdo","page");
	
	public function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>