<?php
class Member extends ORM {

    var $table = 'members';
	
	var $has_one = array('user','category');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>