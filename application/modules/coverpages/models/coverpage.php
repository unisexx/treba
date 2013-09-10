<?php
class Coverpage extends ORM {

    var $table = 'coverpages';
	
	public $has_one = array("user");

	function __construct($id = NULL)
	{
		parent::__construct($id);
	}
}
?>