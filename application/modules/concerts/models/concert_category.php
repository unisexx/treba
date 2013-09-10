<?php
class Concert_category extends ORM {

    var $table = 'concert_categories';
    
    var $has_many = array("concert_vid");

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>