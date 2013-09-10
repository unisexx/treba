<?php
class Line extends ORM {

    var $table = 'lines';

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>