<?php
class Link extends ORM {

    var $table = 'links';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>