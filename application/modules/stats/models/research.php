<?php
class Research extends ORM {

    var $table = 'researches';
	
	var $has_one = array('user','category');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>