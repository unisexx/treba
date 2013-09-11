<?php
class Download extends ORM {

    var $table = 'downloads';
	
	var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>