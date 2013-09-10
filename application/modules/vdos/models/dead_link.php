<?php
class Dead_link extends ORM {

    var $table = 'dead_links';
    
    var $has_one = array('vdo');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>