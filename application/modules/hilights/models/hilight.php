<?php
class Hilight extends ORM {

    var $table = 'hilights';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>