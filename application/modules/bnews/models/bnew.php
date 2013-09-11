<?php
class Bnew extends ORM {

    var $table = 'bnews';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>