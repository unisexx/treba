<?php
class Stat extends ORM {

    var $table = 'stats';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>