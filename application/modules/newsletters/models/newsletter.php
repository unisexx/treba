<?php
class Newsletter extends ORM {

    var $table = 'newsletters';

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>