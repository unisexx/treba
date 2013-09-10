<?php
class Newsletters_email_list extends ORM {

    var $table = 'newsletters_email_lists';

    function __construct($id = NULL)
    {
        parent::__construct($id);
    }
}
?>