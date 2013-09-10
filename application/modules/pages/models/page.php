<?php
class Page extends ORM {

    var $table = 'pages';
    
    var $has_one = array('user');

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>